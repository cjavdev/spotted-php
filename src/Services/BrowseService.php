<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Browse\BrowseGetFeaturedPlaylistsResponse;
use Spotted\Browse\BrowseGetNewReleasesResponse;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\BrowseContract;
use Spotted\Services\Browse\CategoriesService;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class BrowseService implements BrowseContract
{
    /**
     * @api
     */
    public BrowseRawService $raw;

    /**
     * @api
     */
    public CategoriesService $categories;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BrowseRawService($client);
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getFeaturedPlaylists(
        int $limit = 20,
        ?string $locale = null,
        int $offset = 0,
        RequestOptions|array|null $requestOptions = null,
    ): BrowseGetFeaturedPlaylistsResponse {
        $params = Util::removeNulls(
            ['limit' => $limit, 'locale' => $locale, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getFeaturedPlaylists(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get a list of new album releases featured in Spotify (shown, for example, on a Spotify player’s “Browse” tab).
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getNewReleases(
        int $limit = 20,
        int $offset = 0,
        RequestOptions|array|null $requestOptions = null,
    ): BrowseGetNewReleasesResponse {
        $params = Util::removeNulls(['limit' => $limit, 'offset' => $offset]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getNewReleases(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
