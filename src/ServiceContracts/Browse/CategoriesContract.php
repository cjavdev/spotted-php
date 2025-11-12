<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Browse;

use Spotted\Browse\Categories\CategoryGetPlaylistsParams;
use Spotted\Browse\Categories\CategoryGetPlaylistsResponse;
use Spotted\Browse\Categories\CategoryGetResponse;
use Spotted\Browse\Categories\CategoryListParams;
use Spotted\Browse\Categories\CategoryListResponse;
use Spotted\Browse\Categories\CategoryRetrieveParams;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

interface CategoriesContract
{
    /**
     * @api
     *
     * @param array<mixed>|CategoryRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $categoryID,
        array|CategoryRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): CategoryGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|CategoryListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CategoryListParams $params,
        ?RequestOptions $requestOptions = null
    ): CategoryListResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<mixed>|CategoryGetPlaylistsParams $params
     *
     * @throws APIException
     */
    public function getPlaylists(
        string $categoryID,
        array|CategoryGetPlaylistsParams $params,
        ?RequestOptions $requestOptions = null,
    ): CategoryGetPlaylistsResponse;
}
