<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\Playlists\PlaylistGetResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\PlaylistsContract;
use Spotted\Services\Playlists\FollowersService;
use Spotted\Services\Playlists\ImagesService;
use Spotted\Services\Playlists\TracksService;

final class PlaylistsService implements PlaylistsContract
{
    /**
     * @api
     */
    public PlaylistsRawService $raw;

    /**
     * @api
     */
    public TracksService $tracks;

    /**
     * @api
     */
    public FollowersService $followers;

    /**
     * @api
     */
    public ImagesService $images;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PlaylistsRawService($client);
        $this->tracks = new TracksService($client);
        $this->followers = new FollowersService($client);
        $this->images = new ImagesService($client);
    }

    /**
     * @api
     *
     * Get a playlist owned by a Spotify user.
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param string $additionalTypes A comma-separated list of item types that your client supports besides the default `track` type. Valid types are: `track` and `episode`.<br/>
     * _**Note**: This parameter was introduced to allow existing clients to maintain their current behaviour and might be deprecated in the future._<br/>
     * In addition to providing this parameter, make sure that your client properly handles cases of new types in the future by checking against the `type` field of each object.
     * @param string $fields Filters for the query: a comma-separated list of the
     * fields to return. If omitted, all fields are returned. For example, to get
     * just the playlist''s description and URI: `fields=description,uri`. A dot
     * separator can be used to specify non-reoccurring fields, while parentheses
     * can be used to specify reoccurring fields within objects. For example, to
     * get just the added date and user ID of the adder: `fields=tracks.items(added_at,added_by.id)`.
     * Use multiple parentheses to drill down into nested objects, for example: `fields=tracks.items(track(name,href,album(name,href)))`.
     * Fields can be excluded by prefixing them with an exclamation mark, for example:
     * `fields=tracks.items(track(name,href,album(!name,href)))`
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     *
     * @throws APIException
     */
    public function retrieve(
        string $playlistID,
        ?string $additionalTypes = null,
        ?string $fields = null,
        ?string $market = null,
        ?RequestOptions $requestOptions = null,
    ): PlaylistGetResponse {
        $params = Util::removeNulls(
            [
                'additionalTypes' => $additionalTypes,
                'fields' => $fields,
                'market' => $market,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($playlistID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Change a playlist's name and public/private state. (The user must, of
     * course, own the playlist.)
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param bool $collaborative If `true`, the playlist will become collaborative and other users will be able to modify the playlist in their Spotify client. <br/>
     * _**Note**: You can only set `collaborative` to `true` on non-public playlists._
     * @param string $description value for playlist description as displayed in Spotify Clients and in the Web API
     * @param string $name The new name for the playlist, for example `"My New Playlist Title"`
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        ?bool $collaborative = null,
        ?string $description = null,
        ?string $name = null,
        ?bool $published = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'collaborative' => $collaborative,
                'description' => $description,
                'name' => $name,
                'published' => $published,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($playlistID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
