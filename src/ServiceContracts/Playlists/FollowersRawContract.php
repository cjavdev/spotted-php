<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Playlists;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Playlists\Followers\FollowerCheckParams;
use Spotted\Playlists\Followers\FollowerFollowParams;
use Spotted\RequestOptions;

interface FollowersRawContract
{
    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<mixed>|FollowerCheckParams $params
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        string $playlistID,
        array|FollowerCheckParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<mixed>|FollowerFollowParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function follow(
        string $playlistID,
        array|FollowerFollowParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function unfollow(
        string $playlistID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
