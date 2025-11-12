<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Playlists;

use Spotted\Core\Exceptions\APIException;
use Spotted\Playlists\Followers\FollowerCheckParams;
use Spotted\Playlists\Followers\FollowerFollowParams;
use Spotted\RequestOptions;

interface FollowersContract
{
    /**
     * @api
     *
     * @param array<mixed>|FollowerCheckParams $params
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        string $playlistID,
        array|FollowerCheckParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param array<mixed>|FollowerFollowParams $params
     *
     * @throws APIException
     */
    public function follow(
        string $playlistID,
        array|FollowerFollowParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function unfollow(
        string $playlistID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
