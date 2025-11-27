<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Following\FollowingBulkGetResponse;
use Spotted\Me\Following\FollowingBulkRetrieveParams;
use Spotted\Me\Following\FollowingCheckParams;
use Spotted\Me\Following\FollowingFollowParams;
use Spotted\Me\Following\FollowingUnfollowParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\FollowingContract;

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
     * @param array{
     *   type: 'artist', after?: string, limit?: int
     * }|FollowingBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|FollowingBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): FollowingBulkGetResponse {
        [$parsed, $options] = FollowingBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/following',
            query: $parsed,
            options: $options,
            convert: FollowingBulkGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Check to see if the current user is following one or more artists or other Spotify users.
     *
     * @param array{ids: string, type: 'artist'|'user'}|FollowingCheckParams $params
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        array|FollowingCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = FollowingCheckParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{ids: list<string>}|FollowingFollowParams $params
     *
     * @throws APIException
     */
    public function follow(
        array|FollowingFollowParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = FollowingFollowParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{ids?: list<string>}|FollowingUnfollowParams $params
     *
     * @throws APIException
     */
    public function unfollow(
        array|FollowingUnfollowParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = FollowingUnfollowParams::parseRequest(
            $params,
            $requestOptions,
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
