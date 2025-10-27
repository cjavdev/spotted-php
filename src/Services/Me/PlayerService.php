<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Player\PlayerGetCurrentlyPlayingParams;
use Spotted\Me\Player\PlayerGetCurrentlyPlayingResponse;
use Spotted\Me\Player\PlayerGetDevicesResponse;
use Spotted\Me\Player\PlayerGetStateParams;
use Spotted\Me\Player\PlayerGetStateResponse;
use Spotted\Me\Player\PlayerListRecentlyPlayedParams;
use Spotted\Me\Player\PlayerListRecentlyPlayedResponse;
use Spotted\Me\Player\PlayerPausePlaybackParams;
use Spotted\Me\Player\PlayerSeekToPositionParams;
use Spotted\Me\Player\PlayerSetRepeatModeParams;
use Spotted\Me\Player\PlayerSetVolumeParams;
use Spotted\Me\Player\PlayerSkipNextParams;
use Spotted\Me\Player\PlayerSkipPreviousParams;
use Spotted\Me\Player\PlayerStartPlaybackParams;
use Spotted\Me\Player\PlayerToggleShuffleParams;
use Spotted\Me\Player\PlayerTransferParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\PlayerContract;
use Spotted\Services\Me\Player\QueueService;

use const Spotted\Core\OMIT as omit;

final class PlayerService implements PlayerContract
{
    /**
     * @@api
     */
    public QueueService $queue;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
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
        $additionalTypes = omit,
        $market = omit,
        ?RequestOptions $requestOptions = null,
    ): PlayerGetCurrentlyPlayingResponse {
        $params = ['additionalTypes' => $additionalTypes, 'market' => $market];

        return $this->getCurrentlyPlayingRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getCurrentlyPlayingRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PlayerGetCurrentlyPlayingResponse {
        [$parsed, $options] = PlayerGetCurrentlyPlayingParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/player/currently-playing',
            query: $parsed,
            options: $options,
            convert: PlayerGetCurrentlyPlayingResponse::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/player/devices',
            options: $requestOptions,
            convert: PlayerGetDevicesResponse::class,
        );
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
        $additionalTypes = omit,
        $market = omit,
        ?RequestOptions $requestOptions = null,
    ): PlayerGetStateResponse {
        $params = ['additionalTypes' => $additionalTypes, 'market' => $market];

        return $this->getStateRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getStateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PlayerGetStateResponse {
        [$parsed, $options] = PlayerGetStateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/player',
            query: $parsed,
            options: $options,
            convert: PlayerGetStateResponse::class,
        );
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
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->listRecentlyPlayedRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CursorURLPage<PlayerListRecentlyPlayedResponse>
     *
     * @throws APIException
     */
    public function listRecentlyPlayedRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = PlayerListRecentlyPlayedParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/player/recently-played',
            query: $parsed,
            options: $options,
            convert: PlayerListRecentlyPlayedResponse::class,
            page: CursorURLPage::class,
        );
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
        $deviceID = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['deviceID' => $deviceID];

        return $this->pausePlaybackRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function pausePlaybackRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerPausePlaybackParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/player/pause',
            query: $parsed,
            options: $options,
            convert: null,
        );
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
        $positionMs,
        $deviceID = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['positionMs' => $positionMs, 'deviceID' => $deviceID];

        return $this->seekToPositionRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function seekToPositionRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerSeekToPositionParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/player/seek',
            query: $parsed,
            options: $options,
            convert: null,
        );
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
        $state,
        $deviceID = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['state' => $state, 'deviceID' => $deviceID];

        return $this->setRepeatModeRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setRepeatModeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerSetRepeatModeParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/player/repeat',
            query: $parsed,
            options: $options,
            convert: null,
        );
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
        $volumePercent,
        $deviceID = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['volumePercent' => $volumePercent, 'deviceID' => $deviceID];

        return $this->setVolumeRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setVolumeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerSetVolumeParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/player/volume',
            query: $parsed,
            options: $options,
            convert: null,
        );
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
        $deviceID = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['deviceID' => $deviceID];

        return $this->skipNextRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function skipNextRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerSkipNextParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'me/player/next',
            query: $parsed,
            options: $options,
            convert: null,
        );
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
        $deviceID = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['deviceID' => $deviceID];

        return $this->skipPreviousRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function skipPreviousRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerSkipPreviousParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'me/player/previous',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Start a new context or resume current playback on the user's active device. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param string $deviceID The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     * @param string $contextUri Optional. Spotify URI of the context to play.
     * Valid contexts are albums, artists & playlists.
     * `{context_uri:"spotify:album:1Je1IMUlBXcx1Fz0WE7oPT"}`
     * @param array<string,
     * mixed,> $offset Optional. Indicates from where in the context playback should start. Only available when context_uri corresponds to an album or playlist object
     * "position" is zero based and can’t be negative. Example: `"offset": {"position": 5}`
     * "uri" is a string representing the uri of the item to start at. Example: `"offset": {"uri": "spotify:track:1301WleyT98MSxVHPZCA6M"}`
     * @param int $positionMs Indicates from what position to start playback. Must be a positive number. Passing in a position that is greater than the length of the track will cause the player to start playing the next song.
     * @param list<string> $uris Optional. A JSON array of the Spotify track URIs to play.
     * For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh", "spotify:track:1301WleyT98MSxVHPZCA6M"]}`
     *
     * @throws APIException
     */
    public function startPlayback(
        $deviceID = omit,
        $contextUri = omit,
        $offset = omit,
        $positionMs = omit,
        $uris = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'deviceID' => $deviceID,
            'contextUri' => $contextUri,
            'offset' => $offset,
            'positionMs' => $positionMs,
            'uris' => $uris,
        ];

        return $this->startPlaybackRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function startPlaybackRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerStartPlaybackParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['device_id'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/player/play',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: null,
        );
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
        $state,
        $deviceID = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['state' => $state, 'deviceID' => $deviceID];

        return $this->toggleShuffleRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function toggleShuffleRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerToggleShuffleParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/player/shuffle',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Transfer playback to a new device and optionally begin playback. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param list<string> $deviceIDs A JSON array containing the ID of the device on which playback should be started/transferred.<br/>For example:`{device_ids:["74ASZWbe4lXaubB36ztrGX"]}`<br/>_**Note**: Although an array is accepted, only a single device_id is currently supported. Supplying more than one will return `400 Bad Request`_
     * @param bool $play **true**: ensure playback happens on new device.<br/>**false** or not provided: keep the current playback state.
     *
     * @throws APIException
     */
    public function transfer(
        $deviceIDs,
        $play = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['deviceIDs' => $deviceIDs, 'play' => $play];

        return $this->transferRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function transferRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerTransferParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/player',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
