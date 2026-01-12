<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Users;

use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\SimplifiedPlaylistObject;
use Spotted\Users\Playlists\PlaylistNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface PlaylistsContract
{
    /**
     * @api
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param string $name The name for the new playlist, for example `"Your Coolest Playlist"`. This name does not need to be unique; a user may have several playlists with the same name.
     * @param bool $collaborative Defaults to `false`. If `true` the playlist will be collaborative. _**Note**: to create a collaborative playlist you must also set `public` to `false`. To create collaborative playlists you must have granted `playlist-modify-private` and `playlist-modify-public` [scopes](/documentation/web-api/concepts/scopes/#list-of-scopes)._
     * @param string $description value for playlist description as displayed in Spotify Clients and in the Web API
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        string $name,
        ?bool $collaborative = null,
        ?string $description = null,
        ?bool $published = null,
        RequestOptions|array|null $requestOptions = null,
    ): PlaylistNewResponse;

    /**
     * @api
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first playlist to return. Default:
     * 0 (the first object). Maximum offset: 100.000\. Use with `limit` to get the
     * next set of playlists.
     * @param RequestOpts|null $requestOptions
     *
     * @return CursorURLPage<SimplifiedPlaylistObject>
     *
     * @throws APIException
     */
    public function list(
        string $userID,
        int $limit = 20,
        int $offset = 0,
        RequestOptions|array|null $requestOptions = null,
    ): CursorURLPage;
}
