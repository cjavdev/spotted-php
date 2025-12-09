<?php

declare(strict_types=1);

namespace Spotted\Services\Playlists;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\Playlists\Followers\FollowerCheckParams;
use Spotted\Playlists\Followers\FollowerFollowParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Playlists\FollowersContract;

final class FollowersService implements FollowersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Check to see if the current user is following a specified playlist.
     *
     * @param array{ids?: string}|FollowerCheckParams $params
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        string $playlistID,
        array|FollowerCheckParams $params,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = FollowerCheckParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<list<bool>> */
        $response = $this->client->request(
            method: 'get',
            path: ['playlists/%1$s/followers/contains', $playlistID],
            query: $parsed,
            options: $options,
            convert: new ListOf('bool'),
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Add the current user as a follower of a playlist.
     *
     * @param array{public?: bool}|FollowerFollowParams $params
     *
     * @throws APIException
     */
    public function follow(
        string $playlistID,
        array|FollowerFollowParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = FollowerFollowParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: ['playlists/%1$s/followers', $playlistID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove the current user as a follower of a playlist.
     *
     * @throws APIException
     */
    public function unfollow(
        string $playlistID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['playlists/%1$s/followers', $playlistID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
