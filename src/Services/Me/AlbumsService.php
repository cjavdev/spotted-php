<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Albums\AlbumListResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\AlbumsContract;

final class AlbumsService implements AlbumsContract
{
    /**
     * @api
     */
    public AlbumsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AlbumsRawService($client);
    }

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
        int $limit = 20,
        ?string $market = null,
        int $offset = 0,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        $params = ['limit' => $limit, 'market' => $market, 'offset' => $offset];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
    public function check(
        string $ids,
        ?RequestOptions $requestOptions = null
    ): array {
        $params = ['ids' => $ids];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->check(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        ?array $ids = null,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['ids' => $ids];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        ?array $ids = null,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['ids' => $ids];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->save(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
