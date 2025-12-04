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

final class BrowseService implements BrowseContract
{
    /**
     * @api
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
     * @param array{
     *   limit?: int, locale?: string, offset?: int
     * }|BrowseGetFeaturedPlaylistsParams $params
     *
     * @throws APIException
     */
    public function getFeaturedPlaylists(
        array|BrowseGetFeaturedPlaylistsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BrowseGetFeaturedPlaylistsResponse {
        [$parsed, $options] = BrowseGetFeaturedPlaylistsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{limit?: int, offset?: int}|BrowseGetNewReleasesParams $params
     *
     * @throws APIException
     */
    public function getNewReleases(
        array|BrowseGetNewReleasesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BrowseGetNewReleasesResponse {
        [$parsed, $options] = BrowseGetNewReleasesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'browse/new-releases',
            query: $parsed,
            options: $options,
            convert: BrowseGetNewReleasesResponse::class,
        );
    }
}
