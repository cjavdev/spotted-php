<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Shows\ShowListResponse;
use Spotted\RequestOptions;

use const Spotted\Core\OMIT as omit;

interface ShowsContract
{
    /**
     * @api
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @return CursorURLPage<ShowListResponse>
     *
     * @throws APIException
     */
    public function list(
        $limit = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CursorURLPage<ShowListResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage;

    /**
     * @api
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the shows. Maximum: 50 IDs.
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        $ids,
        ?RequestOptions $requestOptions = null
    ): array;

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
    ): array;

    /**
     * @api
     *
     * @param list<string> $ids A JSON array of the [Spotify IDs](https://developer.spotify.com/documentation/web-api/#spotify-uris-and-ids).
     * A maximum of 50 items can be specified in one request. *Note: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored.*
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     *
     * @throws APIException
     */
    public function remove(
        $ids = omit,
        $market = omit,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $ids A JSON array of the [Spotify IDs](https://developer.spotify.com/documentation/web-api/#spotify-uris-and-ids).
     * A maximum of 50 items can be specified in one request. *Note: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored.*
     *
     * @throws APIException
     */
    public function save(
        $ids = omit,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): mixed;
}
