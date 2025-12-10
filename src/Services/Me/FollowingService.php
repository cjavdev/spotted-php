<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Following\FollowingBulkGetResponse;
use Spotted\Me\Following\FollowingCheckParams\Type;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\FollowingContract;

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
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        string $type = 'artist',
        ?string $after = null,
        int $limit = 20,
        ?RequestOptions $requestOptions = null,
    ): FollowingBulkGetResponse {
        $params = ['type' => $type, 'after' => $after, 'limit' => $limit];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->bulkRetrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check to see if the current user is following one or more artists or other Spotify users.
     *
     * @param string $ids A comma-separated list of the artist or the user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) to check. For example: `ids=74ASZWbe4lXaubB36ztrGX,08td7MxkoHQkXnWAYD8d6Q`. A maximum of 50 IDs can be sent in one request.
     * @param 'artist'|'user'|Type $type the ID type: either `artist` or `user`
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        string $ids,
        string|Type $type,
        ?RequestOptions $requestOptions = null
    ): array {
        $params = ['ids' => $ids, 'type' => $type];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->check(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add the current user as a follower of one or more artists or other Spotify users.
     *
     * @param list<string> $ids A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids).
     * For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._
     *
     * @throws APIException
     */
    public function follow(
        array $ids,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['ids' => $ids];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->follow(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove the current user as a follower of one or more artists or other Spotify users.
     *
     * @param list<string> $ids A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._
     *
     * @throws APIException
     */
    public function unfollow(
        ?array $ids = null,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['ids' => $ids];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unfollow(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
