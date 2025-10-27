<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Playlists;

use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

use const Spotted\Core\OMIT as omit;

interface FollowersContract
{
    /**
     * @api
     *
     * @param string $ids **Deprecated** A single item list containing current user's [Spotify Username](/documentation/web-api/concepts/spotify-uris-ids). Maximum: 1 id.
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        string $playlistID,
        $ids = omit,
        ?RequestOptions $requestOptions = null
    ): array;

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
        string $playlistID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param bool $public Defaults to `true`. If `true` the playlist will be included in user's public playlists (added to profile), if `false` it will remain private. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     *
     * @throws APIException
     */
    public function follow(
        string $playlistID,
        $public = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function followRaw(
        string $playlistID,
        array $params,
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
