<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
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

final class PlayerService implements PlayerContract
{
    /**
     * @api
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
     * @param array{
     *   additionalTypes?: string, market?: string
     * }|PlayerGetCurrentlyPlayingParams $params
     *
     * @throws APIException
     */
    public function getCurrentlyPlaying(
        array|PlayerGetCurrentlyPlayingParams $params,
        ?RequestOptions $requestOptions = null,
    ): PlayerGetCurrentlyPlayingResponse {
        [$parsed, $options] = PlayerGetCurrentlyPlayingParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PlayerGetCurrentlyPlayingResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'me/player/currently-playing',
            query: Util::array_transform_keys(
                $parsed,
                ['additionalTypes' => 'additional_types']
            ),
            options: $options,
            convert: PlayerGetCurrentlyPlayingResponse::class,
        );

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
        /** @var BaseResponse<PlayerGetDevicesResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'me/player/devices',
            options: $requestOptions,
            convert: PlayerGetDevicesResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get information about the user’s current playback state, including track or episode, progress, and active device.
     *
     * @param array{
     *   additionalTypes?: string, market?: string
     * }|PlayerGetStateParams $params
     *
     * @throws APIException
     */
    public function getState(
        array|PlayerGetStateParams $params,
        ?RequestOptions $requestOptions = null
    ): PlayerGetStateResponse {
        [$parsed, $options] = PlayerGetStateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PlayerGetStateResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'me/player',
            query: Util::array_transform_keys(
                $parsed,
                ['additionalTypes' => 'additional_types']
            ),
            options: $options,
            convert: PlayerGetStateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get tracks from the current user's recently played tracks.
     * _**Note**: Currently doesn't support podcast episodes._
     *
     * @param array{
     *   after?: int, before?: int, limit?: int
     * }|PlayerListRecentlyPlayedParams $params
     *
     * @return CursorURLPage<PlayerListRecentlyPlayedResponse>
     *
     * @throws APIException
     */
    public function listRecentlyPlayed(
        array|PlayerListRecentlyPlayedParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        [$parsed, $options] = PlayerListRecentlyPlayedParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CursorURLPage<PlayerListRecentlyPlayedResponse>> */
        $response = $this->client->request(
            method: 'get',
            path: 'me/player/recently-played',
            query: $parsed,
            options: $options,
            convert: PlayerListRecentlyPlayedResponse::class,
            page: CursorURLPage::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Pause playback on the user's account. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param array{deviceID?: string}|PlayerPausePlaybackParams $params
     *
     * @throws APIException
     */
    public function pausePlayback(
        array|PlayerPausePlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PlayerPausePlaybackParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: 'me/player/pause',
            query: Util::array_transform_keys($parsed, ['deviceID' => 'device_id']),
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Seeks to the given position in the user’s currently playing track. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param array{
     *   positionMs: int, deviceID?: string
     * }|PlayerSeekToPositionParams $params
     *
     * @throws APIException
     */
    public function seekToPosition(
        array|PlayerSeekToPositionParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PlayerSeekToPositionParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: 'me/player/seek',
            query: Util::array_transform_keys(
                $parsed,
                ['positionMs' => 'position_ms', 'deviceID' => 'device_id']
            ),
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the repeat mode for the user's playback. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param array{state: string, deviceID?: string}|PlayerSetRepeatModeParams $params
     *
     * @throws APIException
     */
    public function setRepeatMode(
        array|PlayerSetRepeatModeParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PlayerSetRepeatModeParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: 'me/player/repeat',
            query: Util::array_transform_keys($parsed, ['deviceID' => 'device_id']),
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the volume for the user’s current playback device. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param array{
     *   volumePercent: int, deviceID?: string
     * }|PlayerSetVolumeParams $params
     *
     * @throws APIException
     */
    public function setVolume(
        array|PlayerSetVolumeParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerSetVolumeParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: 'me/player/volume',
            query: Util::array_transform_keys(
                $parsed,
                ['volumePercent' => 'volume_percent', 'deviceID' => 'device_id'],
            ),
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Skips to next track in the user’s queue. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param array{deviceID?: string}|PlayerSkipNextParams $params
     *
     * @throws APIException
     */
    public function skipNext(
        array|PlayerSkipNextParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerSkipNextParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'me/player/next',
            query: Util::array_transform_keys($parsed, ['deviceID' => 'device_id']),
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Skips to previous track in the user’s queue. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param array{deviceID?: string}|PlayerSkipPreviousParams $params
     *
     * @throws APIException
     */
    public function skipPrevious(
        array|PlayerSkipPreviousParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PlayerSkipPreviousParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'me/player/previous',
            query: Util::array_transform_keys($parsed, ['deviceID' => 'device_id']),
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Start a new context or resume current playback on the user's active device. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param array{
     *   deviceID?: string,
     *   contextUri?: string,
     *   offset?: array<string,mixed>,
     *   positionMs?: int,
     *   uris?: list<string>,
     * }|PlayerStartPlaybackParams $params
     *
     * @throws APIException
     */
    public function startPlayback(
        array|PlayerStartPlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PlayerStartPlaybackParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['device_id'];

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: 'me/player/play',
            query: Util::array_transform_keys(
                array_diff_key($parsed, $query_params),
                ['deviceID' => 'device_id']
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Toggle shuffle on or off for user’s playback. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param array{state: bool, deviceID?: string}|PlayerToggleShuffleParams $params
     *
     * @throws APIException
     */
    public function toggleShuffle(
        array|PlayerToggleShuffleParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PlayerToggleShuffleParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: 'me/player/shuffle',
            query: Util::array_transform_keys($parsed, ['deviceID' => 'device_id']),
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Transfer playback to a new device and optionally begin playback. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param array{deviceIDs: list<string>, play?: bool}|PlayerTransferParams $params
     *
     * @throws APIException
     */
    public function transfer(
        array|PlayerTransferParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PlayerTransferParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: 'me/player',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }
}
