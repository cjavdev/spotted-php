<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Playlists;

use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

interface FollowersContract
{
    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param string $ids **Deprecated** A single item list containing current user's [Spotify Username](/documentation/web-api/concepts/spotify-uris-ids). Maximum: 1 id.
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        string $playlistID,
        ?string $ids = null,
        ?RequestOptions $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param bool $public Defaults to `true`. If `true` the playlist will be included in user's public playlists (added to profile), if `false` it will remain private. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     *
     * @throws APIException
     */
    public function follow(
        string $playlistID,
        ?bool $public = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     *
     * @throws APIException
     */
    public function unfollow(
        string $playlistID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
