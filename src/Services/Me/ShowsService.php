<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Shows\ShowCheckParams;
use Spotted\Me\Shows\ShowListParams;
use Spotted\Me\Shows\ShowListResponse;
use Spotted\Me\Shows\ShowRemoveParams;
use Spotted\Me\Shows\ShowSaveParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\ShowsContract;

use const Spotted\Core\OMIT as omit;

final class ShowsService implements ShowsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a list of shows saved in the current Spotify user's library. Optional parameters can be used to limit the number of shows returned.
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
    ): CursorURLPage {
        $params = ['limit' => $limit, 'offset' => $offset];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): CursorURLPage {
        [$parsed, $options] = ShowListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/shows',
            query: $parsed,
            options: $options,
            convert: ShowListResponse::class,
            page: CursorURLPage::class,
        );
    }

    /**
     * @api
     *
     * Check if one or more shows is already saved in the current Spotify user's library.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the shows. Maximum: 50 IDs.
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
        [$parsed, $options] = ShowCheckParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/shows/contains',
            query: $parsed,
            options: $options,
            convert: new ListOf('bool'),
        );
    }

    /**
     * @api
     *
     * Delete one or more shows from current Spotify user's library.
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
    ): mixed {
        $params = ['ids' => $ids, 'market' => $market];

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
        [$parsed, $options] = ShowRemoveParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = array_flip(['ids', 'market']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: 'me/shows',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Save one or more shows to current Spotify user's library.
     *
     * @param list<string> $ids A JSON array of the [Spotify IDs](https://developer.spotify.com/documentation/web-api/#spotify-uris-and-ids).
     * A maximum of 50 items can be specified in one request. *Note: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored.*
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
        [$parsed, $options] = ShowSaveParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['ids'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/shows',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: null,
        );
    }
}
