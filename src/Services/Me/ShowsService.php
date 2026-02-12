<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\CursorURLPage;
use Spotted\Me\Shows\ShowListResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\ShowsContract;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class ShowsService implements ShowsContract
{
    /**
     * @api
     */
    public ShowsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ShowsRawService($client);
    }

    /**
     * @api
     *
     * Get a list of shows saved in the current Spotify user's library. Optional parameters can be used to limit the number of shows returned.
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     * @param RequestOpts|null $requestOptions
     *
     * @return CursorURLPage<ShowListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $limit = 20,
        int $offset = 0,
        RequestOptions|array|null $requestOptions = null,
    ): CursorURLPage {
        $params = Util::removeNulls(['limit' => $limit, 'offset' => $offset]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Check if one or more shows is already saved in the current Spotify user's library.
     *
     * **Note:** This endpoint is deprecated. Use [Check User's Saved Items](/documentation/web-api/reference/check-library-contains) instead.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the shows. Maximum: 50 IDs.
     * @param RequestOpts|null $requestOptions
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        string $ids,
        RequestOptions|array|null $requestOptions = null
    ): array {
        $params = Util::removeNulls(['ids' => $ids]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->check(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Delete one or more shows from current Spotify user's library.
     *
     * **Note:** This endpoint is deprecated. Use [Remove Items from Library](/documentation/web-api/reference/remove-library-items) instead.
     *
     * @param list<string> $ids A JSON array of the [Spotify IDs](https://developer.spotify.com/documentation/web-api/#spotify-uris-and-ids).
     * A maximum of 50 items can be specified in one request. *Note: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored.*
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        ?array $ids = null,
        ?bool $published = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['ids' => $ids, 'published' => $published]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Save one or more shows to current Spotify user's library.
     *
     * **Note:** This endpoint is deprecated. Use [Save Items to Library](/documentation/web-api/reference/save-library-items) instead.
     *
     * @param list<string> $ids A JSON array of the [Spotify IDs](https://developer.spotify.com/documentation/web-api/#spotify-uris-and-ids).
     * A maximum of 50 items can be specified in one request. *Note: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored.*
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function save(
        ?array $ids = null,
        ?bool $published = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['ids' => $ids, 'published' => $published]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->save(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
