<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Browse;

use Spotted\Browse\Categories\CategoryGetPlaylistsParams;
use Spotted\Browse\Categories\CategoryGetPlaylistsResponse;
use Spotted\Browse\Categories\CategoryGetResponse;
use Spotted\Browse\Categories\CategoryListParams;
use Spotted\Browse\Categories\CategoryListResponse;
use Spotted\Browse\Categories\CategoryRetrieveParams;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;

interface CategoriesRawContract
{
    /**
     * @api
     *
     * @param string $categoryID the [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) for the category
     * @param array<string,mixed>|CategoryRetrieveParams $params
     *
     * @return BaseResponse<CategoryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $categoryID,
        array|CategoryRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CategoryListParams $params
     *
     * @return BaseResponse<CursorURLPage<CategoryListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|CategoryListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $categoryID the [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) for the category
     * @param array<string,mixed>|CategoryGetPlaylistsParams $params
     *
     * @return BaseResponse<CategoryGetPlaylistsResponse>
     *
     * @throws APIException
     */
    public function getPlaylists(
        string $categoryID,
        array|CategoryGetPlaylistsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
