<?php

declare(strict_types=1);

namespace Spotted\Services\Users;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Users\PlaylistsContract;
use Spotted\SimplifiedPlaylistObject;
use Spotted\Users\Playlists\PlaylistNewResponse;

final class PlaylistsService implements PlaylistsContract
{
    /**
     * @api
     */
    public PlaylistsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PlaylistsRawService($client);
    }

    /**
     * @api
     *
     * Create a playlist for a Spotify user. (The playlist will be empty until
     * you [add tracks](/documentation/web-api/reference/add-tracks-to-playlist).)
     * Each user is generally limited to a maximum of 11000 playlists.
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param string $name The name for the new playlist, for example `"Your Coolest Playlist"`. This name does not need to be unique; a user may have several playlists with the same name.
     * @param bool $collaborative Defaults to `false`. If `true` the playlist will be collaborative. _**Note**: to create a collaborative playlist you must also set `public` to `false`. To create collaborative playlists you must have granted `playlist-modify-private` and `playlist-modify-public` [scopes](/documentation/web-api/concepts/scopes/#list-of-scopes)._
     * @param string $description value for playlist description as displayed in Spotify Clients and in the Web API
     * @param bool $public Defaults to `true`. The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private. To be able to create private playlists, the user must have granted the `playlist-modify-private` [scope](/documentation/web-api/concepts/scopes/#list-of-scopes). For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        string $name,
        ?bool $collaborative = null,
        ?string $description = null,
        ?bool $public = null,
        ?RequestOptions $requestOptions = null,
    ): PlaylistNewResponse {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'collaborative' => $collaborative,
                'description' => $description,
                'public' => $public,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a list of the playlists owned or followed by a Spotify user.
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first playlist to return. Default:
     * 0 (the first object). Maximum offset: 100.000\. Use with `limit` to get the
     * next set of playlists.
     *
     * @return CursorURLPage<SimplifiedPlaylistObject>
     *
     * @throws APIException
     */
    public function list(
        string $userID,
        int $limit = 20,
        int $offset = 0,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        $params = Util::removeNulls(['limit' => $limit, 'offset' => $offset]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
