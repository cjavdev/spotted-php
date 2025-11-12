<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Browse\BrowseGetFeaturedPlaylistsParams;
use Spotted\Browse\BrowseGetFeaturedPlaylistsResponse;
use Spotted\Browse\BrowseGetNewReleasesParams;
use Spotted\Browse\BrowseGetNewReleasesResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

interface BrowseContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param array<mixed>|BrowseGetFeaturedPlaylistsParams $params
     *
     * @throws APIException
     */
    public function getFeaturedPlaylists(
        array|BrowseGetFeaturedPlaylistsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BrowseGetFeaturedPlaylistsResponse;

    /**
     * @api
     *
     * @param array<mixed>|BrowseGetNewReleasesParams $params
     *
     * @throws APIException
     */
    public function getNewReleases(
        array|BrowseGetNewReleasesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BrowseGetNewReleasesResponse;
}
