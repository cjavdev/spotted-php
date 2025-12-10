<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Following\FollowingBulkGetResponse;
use Spotted\Me\Following\FollowingBulkRetrieveParams;
use Spotted\Me\Following\FollowingCheckParams;
use Spotted\Me\Following\FollowingCheckParams\Type;
use Spotted\Me\Following\FollowingFollowParams;
use Spotted\Me\Following\FollowingUnfollowParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\FollowingRawContract;

final class FollowingRawService implements FollowingRawContract
{
    // @phpstan-ignore-next-line
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
     *   type?: 'artist', after?: string, limit?: int
     * }|FollowingBulkRetrieveParams $params
     *
     * @return BaseResponse<FollowingBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|FollowingBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FollowingBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   ids: string, type: 'artist'|'user'|Type
     * }|FollowingCheckParams $params
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|FollowingCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = FollowingCheckParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function follow(
        array|FollowingFollowParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = FollowingFollowParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function unfollow(
        array|FollowingUnfollowParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FollowingUnfollowParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: 'me/following',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
