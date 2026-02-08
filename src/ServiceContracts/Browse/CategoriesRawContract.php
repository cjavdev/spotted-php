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

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface CategoriesRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param string $categoryID the [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) for the category
     * @param array<string,mixed>|CategoryRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CategoryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $categoryID,
        array|CategoryRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|CategoryListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<CategoryListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|CategoryListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $categoryID the [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) for the category
     * @param array<string,mixed>|CategoryGetPlaylistsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CategoryGetPlaylistsResponse>
     *
     * @throws APIException
     */
    public function getPlaylists(
        string $categoryID,
        array|CategoryGetPlaylistsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
