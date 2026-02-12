<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\Me\Following\FollowingBulkGetResponse;
use Spotted\Me\Following\FollowingCheckParams\Type;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\FollowingContract;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class FollowingService implements FollowingContract
{
    /**
     * @api
     */
    public FollowingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FollowingRawService($client);
    }

    /**
     * @api
     *
     * Get the current user's followed artists.
     *
     * @param 'artist' $type the ID type: currently only `artist` is supported
     * @param string $after the last artist ID retrieved from the previous request
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        string $type = 'artist',
        ?string $after = null,
        int $limit = 20,
        RequestOptions|array|null $requestOptions = null,
    ): FollowingBulkGetResponse {
        $params = Util::removeNulls(
            ['type' => $type, 'after' => $after, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->bulkRetrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Check to see if the current user is following one or more artists or other Spotify users.
     *
     * **Note:** This endpoint is deprecated. Use [Check User's Saved Items](/documentation/web-api/reference/check-library-contains) instead.
     *
     * @param string $ids A comma-separated list of the artist or the user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) to check. For example: `ids=74ASZWbe4lXaubB36ztrGX,08td7MxkoHQkXnWAYD8d6Q`. A maximum of 50 IDs can be sent in one request.
     * @param Type|value-of<Type> $type the ID type: either `artist` or `user`
     * @param RequestOpts|null $requestOptions
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        string $ids,
        Type|string $type,
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(['ids' => $ids, 'type' => $type]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->check(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Add the current user as a follower of one or more artists or other Spotify users.
     *
     * **Note:** This endpoint is deprecated. Use [Save Items to Library](/documentation/web-api/reference/save-library-items) instead.
     *
     * @param list<string> $ids A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids).
     * For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function follow(
        array $ids,
        ?bool $published = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['ids' => $ids, 'published' => $published]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->follow(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Remove the current user as a follower of one or more artists or other Spotify users.
     *
     * **Note:** This endpoint is deprecated. Use [Remove Items from Library](/documentation/web-api/reference/remove-library-items) instead.
     *
     * @param list<string> $ids A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function unfollow(
        ?array $ids = null,
        ?bool $published = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['ids' => $ids, 'published' => $published]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unfollow(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
