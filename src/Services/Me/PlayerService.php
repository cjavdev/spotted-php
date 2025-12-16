<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\CursorURLPage;
use Spotted\Me\Player\PlayerGetCurrentlyPlayingResponse;
use Spotted\Me\Player\PlayerGetDevicesResponse;
use Spotted\Me\Player\PlayerGetStateResponse;
use Spotted\Me\Player\PlayerListRecentlyPlayedResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\PlayerContract;
use Spotted\Services\Me\Player\QueueService;

final class PlayerService implements PlayerContract
{
    /**
     * @api
     */
    public PlayerRawService $raw;

    /**
     * @api
     */
    public QueueService $queue;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PlayerRawService($client);
        $this->queue = new QueueService($client);
    }

    /**
     * @api
     *
     * Get the object currently being played on the user's Spotify account.
     *
     * @param string $additionalTypes A comma-separated list of item types that your client supports besides the default `track` type. Valid types are: `track` and `episode`.<br/>
     * _**Note**: This parameter was introduced to allow existing clients to maintain their current behaviour and might be deprecated in the future._<br/>
     * In addition to providing this parameter, make sure that your client properly handles cases of new types in the future by checking against the `type` field of each object.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     *
     * @throws APIException
     */
    public function getCurrentlyPlaying(
        ?string $additionalTypes = null,
        ?string $market = null,
        ?RequestOptions $requestOptions = null,
    ): PlayerGetCurrentlyPlayingResponse {
        $params = Util::removeNulls(
            ['additionalTypes' => $additionalTypes, 'market' => $market]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getCurrentlyPlaying(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get information about a user’s available Spotify Connect devices. Some device models are not supported and will not be listed in the API response.
     *
     * @throws APIException
     */
    public function getDevices(
        ?RequestOptions $requestOptions = null
    ): PlayerGetDevicesResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDevices(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get information about the user’s current playback state, including track or episode, progress, and active device.
     *
     * @param string $additionalTypes A comma-separated list of item types that your client supports besides the default `track` type. Valid types are: `track` and `episode`.<br/>
     * _**Note**: This parameter was introduced to allow existing clients to maintain their current behaviour and might be deprecated in the future._<br/>
     * In addition to providing this parameter, make sure that your client properly handles cases of new types in the future by checking against the `type` field of each object.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     *
     * @throws APIException
     */
    public function getState(
        ?string $additionalTypes = null,
        ?string $market = null,
        ?RequestOptions $requestOptions = null,
    ): PlayerGetStateResponse {
        $params = Util::removeNulls(
            ['additionalTypes' => $additionalTypes, 'market' => $market]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getState(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get tracks from the current user's recently played tracks.
     * _**Note**: Currently doesn't support podcast episodes._
     *
     * @param int $after A Unix timestamp in milliseconds. Returns all items
     * after (but not including) this cursor position. If `after` is specified, `before`
     * must not be specified.
     * @param int $before A Unix timestamp in milliseconds. Returns all items
     * before (but not including) this cursor position. If `before` is specified,
     * `after` must not be specified.
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     *
     * @return CursorURLPage<PlayerListRecentlyPlayedResponse>
     *
     * @throws APIException
     */
    public function listRecentlyPlayed(
        ?int $after = null,
        ?int $before = null,
        int $limit = 20,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRecentlyPlayed(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Pause playback on the user's account. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param string $deviceID The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     *
     * @throws APIException
     */
    public function pausePlayback(
        ?string $deviceID = null,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['deviceID' => $deviceID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pausePlayback(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Seeks to the given position in the user’s currently playing track. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param int $positionMs The position in milliseconds to seek to. Must be a
     * positive number. Passing in a position that is greater than the length of
     * the track will cause the player to start playing the next song.
     * @param string $deviceID The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     *
     * @throws APIException
     */
    public function seekToPosition(
        int $positionMs,
        ?string $deviceID = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['positionMs' => $positionMs, 'deviceID' => $deviceID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->seekToPosition(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the repeat mode for the user's playback. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param string $state **track**, **context** or **off**.<br/>
     * **track** will repeat the current track.<br/>
     * **context** will repeat the current context.<br/>
     * **off** will turn repeat off.
     * @param string $deviceID The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     *
     * @throws APIException
     */
    public function setRepeatMode(
        string $state,
        ?string $deviceID = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['state' => $state, 'deviceID' => $deviceID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setRepeatMode(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the volume for the user’s current playback device. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param int $volumePercent The volume to set. Must be a value from 0 to 100 inclusive.
     * @param string $deviceID The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     *
     * @throws APIException
     */
    public function setVolume(
        int $volumePercent,
        ?string $deviceID = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['volumePercent' => $volumePercent, 'deviceID' => $deviceID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setVolume(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Skips to next track in the user’s queue. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param string $deviceID The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     *
     * @throws APIException
     */
    public function skipNext(
        ?string $deviceID = null,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['deviceID' => $deviceID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->skipNext(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Skips to previous track in the user’s queue. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param string $deviceID The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     *
     * @throws APIException
     */
    public function skipPrevious(
        ?string $deviceID = null,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['deviceID' => $deviceID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->skipPrevious(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Start a new context or resume current playback on the user's active device. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param string $deviceID Query param: The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     * @param string $contextUri Body param: Optional. Spotify URI of the context to play.
     * Valid contexts are albums, artists & playlists.
     * `{context_uri:"spotify:album:1Je1IMUlBXcx1Fz0WE7oPT"}`
     * @param array<string,mixed> $offset Body param: Optional. Indicates from where in the context playback should start. Only available when context_uri corresponds to an album or playlist object
     * "position" is zero based and can’t be negative. Example: `"offset": {"position": 5}`
     * "uri" is a string representing the uri of the item to start at. Example: `"offset": {"uri": "spotify:track:1301WleyT98MSxVHPZCA6M"}`
     * @param int $positionMs Body param: Indicates from what position to start playback. Must be a positive number. Passing in a position that is greater than the length of the track will cause the player to start playing the next song.
     * @param bool $published Body param: The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     * @param list<string> $uris Body param: Optional. A JSON array of the Spotify track URIs to play.
     * For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh", "spotify:track:1301WleyT98MSxVHPZCA6M"]}`
     *
     * @throws APIException
     */
    public function startPlayback(
        ?string $deviceID = null,
        ?string $contextUri = null,
        ?array $offset = null,
        ?int $positionMs = null,
        ?bool $published = null,
        ?array $uris = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'deviceID' => $deviceID,
                'contextUri' => $contextUri,
                'offset' => $offset,
                'positionMs' => $positionMs,
                'published' => $published,
                'uris' => $uris,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startPlayback(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Toggle shuffle on or off for user’s playback. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param bool $state **true** : Shuffle user's playback.<br/>
     * **false** : Do not shuffle user's playback.
     * @param string $deviceID The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     *
     * @throws APIException
     */
    public function toggleShuffle(
        bool $state,
        ?string $deviceID = null,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['state' => $state, 'deviceID' => $deviceID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->toggleShuffle(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Transfer playback to a new device and optionally begin playback. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param list<string> $deviceIDs A JSON array containing the ID of the device on which playback should be started/transferred.<br/>For example:`{device_ids:["74ASZWbe4lXaubB36ztrGX"]}`<br/>_**Note**: Although an array is accepted, only a single device_id is currently supported. Supplying more than one will return `400 Bad Request`_
     * @param bool $play **true**: ensure playback happens on new device.<br/>**false** or not provided: keep the current playback state.
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     *
     * @throws APIException
     */
    public function transfer(
        array $deviceIDs,
        ?bool $play = null,
        ?bool $published = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['deviceIDs' => $deviceIDs, 'play' => $play, 'published' => $published]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->transfer(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
