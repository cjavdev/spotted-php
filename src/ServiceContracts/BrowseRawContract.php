<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Browse\BrowseGetFeaturedPlaylistsParams;
use Spotted\Browse\BrowseGetFeaturedPlaylistsResponse;
use Spotted\Browse\BrowseGetNewReleasesParams;
use Spotted\Browse\BrowseGetNewReleasesResponse;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface BrowseRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|BrowseGetFeaturedPlaylistsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowseGetFeaturedPlaylistsResponse>
     *
     * @throws APIException
     */
    public function getFeaturedPlaylists(
        array|BrowseGetFeaturedPlaylistsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BrowseGetNewReleasesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowseGetNewReleasesResponse>
     *
     * @throws APIException
     */
    public function getNewReleases(
        array|BrowseGetNewReleasesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
