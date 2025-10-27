<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Albums\AlbumCheckParams;
use Spotted\Me\Albums\AlbumListParams;
use Spotted\Me\Albums\AlbumListResponse;
use Spotted\Me\Albums\AlbumRemoveParams;
use Spotted\Me\Albums\AlbumSaveParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\AlbumsContract;

use const Spotted\Core\OMIT as omit;

final class AlbumsService implements AlbumsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a list of the albums saved in the current Spotify user's 'Your Music' library.
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @return CursorURLPage<AlbumListResponse>
     *
     * @throws APIException
     */
    public function list(
        $limit = omit,
        $market = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        $params = ['limit' => $limit, 'market' => $market, 'offset' => $offset];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CursorURLPage<AlbumListResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = AlbumListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/albums',
            query: $parsed,
            options: $options,
            convert: AlbumListResponse::class,
            page: CursorURLPage::class,
        );
    }

    /**
     * @api
     *
     * Check if one or more albums is already saved in the current Spotify user's 'Your Music' library.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the albums. Maximum: 20 IDs.
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check($ids, ?RequestOptions $requestOptions = null): array
    {
        $params = ['ids' => $ids];

        return $this->checkRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function checkRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = AlbumCheckParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/albums/contains',
            query: $parsed,
            options: $options,
            convert: new ListOf('bool'),
        );
    }

    /**
     * @api
     *
     * Remove one or more albums from the current user's 'Your Music' library.
     *
     * @param list<string> $ids A JSON array of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `["4iV5W9uYEdYUVa79Axb7Rh", "1301WleyT98MSxVHPZCA6M"]`<br/>A maximum of 50 items can be specified in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._
     *
     * @throws APIException
     */
    public function remove(
        $ids = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['ids' => $ids];

        return $this->removeRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function removeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AlbumRemoveParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['ids'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: 'me/albums',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Save one or more albums to the current user's 'Your Music' library.
     *
     * @param list<string> $ids A JSON array of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `["4iV5W9uYEdYUVa79Axb7Rh", "1301WleyT98MSxVHPZCA6M"]`<br/>A maximum of 50 items can be specified in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._
     *
     * @throws APIException
     */
    public function save(
        $ids = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['ids' => $ids];

        return $this->saveRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function saveRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AlbumSaveParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['ids'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/albums',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: null,
        );
    }
}
