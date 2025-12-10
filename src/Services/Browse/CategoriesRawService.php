<?php

declare(strict_types=1);

namespace Spotted\Services\Browse;

use Spotted\Browse\Categories\CategoryGetPlaylistsParams;
use Spotted\Browse\Categories\CategoryGetPlaylistsResponse;
use Spotted\Browse\Categories\CategoryGetResponse;
use Spotted\Browse\Categories\CategoryListParams;
use Spotted\Browse\Categories\CategoryListResponse;
use Spotted\Browse\Categories\CategoryRetrieveParams;
use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Browse\CategoriesRawContract;

final class CategoriesRawService implements CategoriesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a single category used to tag items in Spotify (on, for example, the Spotify player’s “Browse” tab).
     *
     * @param string $categoryID the [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) for the category
     * @param array{locale?: string}|CategoryRetrieveParams $params
     *
     * @return BaseResponse<CategoryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $categoryID,
        array|CategoryRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CategoryRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['browse/categories/%1$s', $categoryID],
            query: $parsed,
            options: $options,
            convert: CategoryGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a list of categories used to tag items in Spotify (on, for example, the Spotify player’s “Browse” tab).
     *
     * @param array{
     *   limit?: int, locale?: string, offset?: int
     * }|CategoryListParams $params
     *
     * @return BaseResponse<CategoryListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CategoryListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CategoryListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'browse/categories',
            query: $parsed,
            options: $options,
            convert: CategoryListResponse::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get a list of Spotify playlists tagged with a particular category.
     *
     * @param string $categoryID the [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) for the category
     * @param array{limit?: int, offset?: int}|CategoryGetPlaylistsParams $params
     *
     * @return BaseResponse<CategoryGetPlaylistsResponse>
     *
     * @throws APIException
     */
    public function getPlaylists(
        string $categoryID,
        array|CategoryGetPlaylistsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CategoryGetPlaylistsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['browse/categories/%1$s/playlists', $categoryID],
            query: $parsed,
            options: $options,
            convert: CategoryGetPlaylistsResponse::class,
        );
    }
}
