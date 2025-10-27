<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Browse\BrowseGetFeaturedPlaylistsParams;
use Spotted\Browse\BrowseGetFeaturedPlaylistsResponse;
use Spotted\Browse\BrowseGetNewReleasesParams;
use Spotted\Browse\BrowseGetNewReleasesResponse;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\BrowseContract;
use Spotted\Services\Browse\CategoriesService;

use const Spotted\Core\OMIT as omit;

final class BrowseService implements BrowseContract
{
    /**
     * @@api
     */
    public CategoriesService $categories;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->categories = new CategoriesService($client);
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get a list of Spotify featured playlists (shown, for example, on a Spotify player's 'Browse' tab).
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param string $locale The desired language, consisting of an [ISO 639-1](http://en.wikipedia.org/wiki/ISO_639-1) language code and an [ISO 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2), joined by an underscore. For example: `es_MX`, meaning &quot;Spanish (Mexico)&quot;. Provide this parameter if you want the category strings returned in a particular language.<br/> _**Note**: if `locale` is not supplied, or if the specified language is not available, the category strings returned will be in the Spotify default language (American English)._
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @throws APIException
     */
    public function getFeaturedPlaylists(
        $limit = omit,
        $locale = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): BrowseGetFeaturedPlaylistsResponse {
        $params = ['limit' => $limit, 'locale' => $locale, 'offset' => $offset];

        return $this->getFeaturedPlaylistsRaw($params, $requestOptions);
    }

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getFeaturedPlaylistsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BrowseGetFeaturedPlaylistsResponse {
        [$parsed, $options] = BrowseGetFeaturedPlaylistsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'browse/featured-playlists',
            query: $parsed,
            options: $options,
            convert: BrowseGetFeaturedPlaylistsResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a list of new album releases featured in Spotify (shown, for example, on a Spotify player’s “Browse” tab).
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @throws APIException
     */
    public function getNewReleases(
        $limit = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null
    ): BrowseGetNewReleasesResponse {
        $params = ['limit' => $limit, 'offset' => $offset];

        return $this->getNewReleasesRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getNewReleasesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BrowseGetNewReleasesResponse {
        [$parsed, $options] = BrowseGetNewReleasesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'browse/new-releases',
            query: $parsed,
            options: $options,
            convert: BrowseGetNewReleasesResponse::class,
        );
    }
}
