<?php

declare(strict_types=1);

namespace Spotted\Services\Playlists;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\CursorURLPage;
use Spotted\Playlists\Tracks\TrackAddResponse;
use Spotted\Playlists\Tracks\TrackRemoveParams\Track;
use Spotted\Playlists\Tracks\TrackRemoveResponse;
use Spotted\Playlists\Tracks\TrackUpdateResponse;
use Spotted\PlaylistTrackObject;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Playlists\TracksContract;

/**
 * @phpstan-import-type TrackShape from \Spotted\Playlists\Tracks\TrackRemoveParams\Track
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class TracksService implements TracksContract
{
    /**
     * @api
     */
    public TracksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TracksRawService($client);
    }

    /**
     * @deprecated
     *
     * @api
     *
     * **Deprecated:** Use [Update Playlist Items](/documentation/web-api/reference/reorder-or-replace-playlists-items) instead.
     *
     * Either reorder or replace items in a playlist depending on the request's parameters.
     * To reorder items, include `range_start`, `insert_before`, `range_length` and `snapshot_id` in the request's body.
     * To replace items, include `uris` as either a query parameter or in the request's body.
     * Replacing items in a playlist will overwrite its existing items. This operation can be used for replacing or clearing items in a playlist.
     * <br/>
     * **Note**: Replace and reorder are mutually exclusive operations which share the same endpoint, but have different parameters.
     * These operations can't be applied together in a single request.
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param int $insertBefore The position where the items should be inserted.<br/>To reorder the items to the end of the playlist, simply set _insert_before_ to the position after the last item.<br/>Examples:<br/>To reorder the first item to the last position in a playlist with 10 items, set _range_start_ to 0, and _insert_before_ to 10.<br/>To reorder the last item in a playlist with 10 items to the start of the playlist, set _range_start_ to 9, and _insert_before_ to 0.
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     * @param int $rangeLength The amount of items to be reordered. Defaults to 1 if not set.<br/>The range of items to be reordered begins from the _range_start_ position, and includes the _range_length_ subsequent items.<br/>Example:<br/>To move the items at index 9-10 to the start of the playlist, _range_start_ is set to 9, and _range_length_ is set to 2.
     * @param int $rangeStart the position of the first item to be reordered
     * @param string $snapshotID the playlist's snapshot ID against which you want to make the changes
     * @param list<string> $uris
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        ?int $insertBefore = null,
        ?bool $published = null,
        ?int $rangeLength = null,
        ?int $rangeStart = null,
        ?string $snapshotID = null,
        ?array $uris = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrackUpdateResponse {
        $params = Util::removeNulls(
            [
                'insertBefore' => $insertBefore,
                'published' => $published,
                'rangeLength' => $rangeLength,
                'rangeStart' => $rangeStart,
                'snapshotID' => $snapshotID,
                'uris' => $uris,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($playlistID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * **Deprecated:** Use [Get Playlist Items](/documentation/web-api/reference/get-playlists-items) instead.
     *
     * Get full details of the items of a playlist owned by a Spotify user.
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param string $additionalTypes A comma-separated list of item types that your client supports besides the default `track` type. Valid types are: `track` and `episode`.<br/>
     * _**Note**: This parameter was introduced to allow existing clients to maintain their current behaviour and might be deprecated in the future._<br/>
     * In addition to providing this parameter, make sure that your client properly handles cases of new types in the future by checking against the `type` field of each object.
     * @param string $fields Filters for the query: a comma-separated list of the
     * fields to return. If omitted, all fields are returned. For example, to get
     * just the total number of items and the request limit:<br/>`fields=total,limit`<br/>A
     * dot separator can be used to specify non-reoccurring fields, while parentheses
     * can be used to specify reoccurring fields within objects. For example, to
     * get just the added date and user ID of the adder:<br/>`fields=items(added_at,added_by.id)`<br/>Use
     * multiple parentheses to drill down into nested objects, for example:<br/>`fields=items(track(name,href,album(name,href)))`<br/>Fields
     * can be excluded by prefixing them with an exclamation mark, for example:<br/>`fields=items.track.album(!external_urls,images)`
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 100.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     * @param RequestOpts|null $requestOptions
     *
     * @return CursorURLPage<PlaylistTrackObject>
     *
     * @throws APIException
     */
    public function list(
        string $playlistID,
        ?string $additionalTypes = null,
        ?string $fields = null,
        int $limit = 20,
        ?string $market = null,
        int $offset = 0,
        RequestOptions|array|null $requestOptions = null,
    ): CursorURLPage {
        $params = Util::removeNulls(
            [
                'additionalTypes' => $additionalTypes,
                'fields' => $fields,
                'limit' => $limit,
                'market' => $market,
                'offset' => $offset,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($playlistID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * **Deprecated:** Use [Add Items to Playlist](/documentation/web-api/reference/add-items-to-playlist) instead.
     *
     * Add one or more items to a user's playlist.
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param int $position The position to insert the items, a zero-based index. For example, to insert the items in the first position: `position=0` ; to insert the items in the third position: `position=2`. If omitted, the items will be appended to the playlist. Items are added in the order they appear in the uris array. For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh","spotify:track:1301WleyT98MSxVHPZCA6M"], "position": 3}`
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     * @param list<string> $uris A JSON array of the [Spotify URIs](/documentation/web-api/concepts/spotify-uris-ids) to add. For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh","spotify:track:1301WleyT98MSxVHPZCA6M", "spotify:episode:512ojhOuo1ktJprKbVcKyQ"]}`<br/>A maximum of 100 items can be added in one request. _**Note**: if the `uris` parameter is present in the query string, any URIs listed here in the body will be ignored._
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $playlistID,
        ?int $position = null,
        ?bool $published = null,
        ?array $uris = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrackAddResponse {
        $params = Util::removeNulls(
            ['position' => $position, 'published' => $published, 'uris' => $uris]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($playlistID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * **Deprecated:** Use [Remove Playlist Items](/documentation/web-api/reference/remove-items-playlist) instead.
     *
     * Remove one or more items from a user's playlist.
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param list<Track|TrackShape> $tracks An array of objects containing [Spotify URIs](/documentation/web-api/concepts/spotify-uris-ids) of the tracks or episodes to remove.
     * For example: `{ "tracks": [{ "uri": "spotify:track:4iV5W9uYEdYUVa79Axb7Rh" },{ "uri": "spotify:track:1301WleyT98MSxVHPZCA6M" }] }`. A maximum of 100 objects can be sent at once.
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     * @param string $snapshotID The playlist's snapshot ID against which you want to make the changes.
     * The API will validate that the specified items exist and in the specified positions and make the changes,
     * even if more recent changes have been made to the playlist.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $playlistID,
        array $tracks,
        ?bool $published = null,
        ?string $snapshotID = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrackRemoveResponse {
        $params = Util::removeNulls(
            [
                'tracks' => $tracks,
                'published' => $published,
                'snapshotID' => $snapshotID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($playlistID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
