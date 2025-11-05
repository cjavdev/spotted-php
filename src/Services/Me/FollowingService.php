<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Following\FollowingCheckParams;
use Spotted\Me\Following\FollowingFollowParams;
use Spotted\Me\Following\FollowingListParams;
use Spotted\Me\Following\FollowingListParams\Type;
use Spotted\Me\Following\FollowingListResponse;
use Spotted\Me\Following\FollowingUnfollowParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\FollowingContract;

use const Spotted\Core\OMIT as omit;

final class FollowingService implements FollowingContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the current user's followed artists.
     *
     * @param Type|value-of<Type> $type the ID type: currently only `artist` is supported
     * @param string $after the last artist ID retrieved from the previous request
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     *
     * @throws APIException
     */
    public function list(
        $type,
        $after = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null
    ): FollowingListResponse {
        $params = ['type' => $type, 'after' => $after, 'limit' => $limit];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): FollowingListResponse {
        [$parsed, $options] = FollowingListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/following',
            query: $parsed,
            options: $options,
            convert: FollowingListResponse::class,
        );
    }

    /**
     * @api
     *
     * Check to see if the current user is following one or more artists or other Spotify users.
     *
     * @param string $ids A comma-separated list of the artist or the user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) to check. For example: `ids=74ASZWbe4lXaubB36ztrGX,08td7MxkoHQkXnWAYD8d6Q`. A maximum of 50 IDs can be sent in one request.
     * @param FollowingCheckParams\Type|value-of<FollowingCheckParams\Type> $type the ID type: either `artist` or `user`
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        $ids,
        $type,
        ?RequestOptions $requestOptions = null
    ): array {
        $params = ['ids' => $ids, 'type' => $type];

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
        [$parsed, $options] = FollowingCheckParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/following/contains',
            query: $parsed,
            options: $options,
            convert: new ListOf('bool'),
        );
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
    public function follow($ids, ?RequestOptions $requestOptions = null): mixed
    {
        $params = ['ids' => $ids];

        return $this->followRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function followRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = FollowingFollowParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/following',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
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
        $ids = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['ids' => $ids];

        return $this->unfollowRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function unfollowRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = FollowingUnfollowParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: 'me/following',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
