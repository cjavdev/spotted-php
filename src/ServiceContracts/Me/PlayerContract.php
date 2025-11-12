<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

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

interface PlayerContract
{
    /**
     * @api
     *
     * @param array<mixed>|PlayerGetCurrentlyPlayingParams $params
     *
     * @throws APIException
     */
    public function getCurrentlyPlaying(
        array|PlayerGetCurrentlyPlayingParams $params,
        ?RequestOptions $requestOptions = null,
    ): PlayerGetCurrentlyPlayingResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getDevices(
        ?RequestOptions $requestOptions = null
    ): PlayerGetDevicesResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerGetStateParams $params
     *
     * @throws APIException
     */
    public function getState(
        array|PlayerGetStateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PlayerGetStateResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerListRecentlyPlayedParams $params
     *
     * @return CursorURLPage<PlayerListRecentlyPlayedResponse>
     *
     * @throws APIException
     */
    public function listRecentlyPlayed(
        array|PlayerListRecentlyPlayedParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;

    /**
     * @api
     *
     * @param array<mixed>|PlayerPausePlaybackParams $params
     *
     * @throws APIException
     */
    public function pausePlayback(
        array|PlayerPausePlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PlayerSeekToPositionParams $params
     *
     * @throws APIException
     */
    public function seekToPosition(
        array|PlayerSeekToPositionParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PlayerSetRepeatModeParams $params
     *
     * @throws APIException
     */
    public function setRepeatMode(
        array|PlayerSetRepeatModeParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PlayerSetVolumeParams $params
     *
     * @throws APIException
     */
    public function setVolume(
        array|PlayerSetVolumeParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PlayerSkipNextParams $params
     *
     * @throws APIException
     */
    public function skipNext(
        array|PlayerSkipNextParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PlayerSkipPreviousParams $params
     *
     * @throws APIException
     */
    public function skipPrevious(
        array|PlayerSkipPreviousParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PlayerStartPlaybackParams $params
     *
     * @throws APIException
     */
    public function startPlayback(
        array|PlayerStartPlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PlayerToggleShuffleParams $params
     *
     * @throws APIException
     */
    public function toggleShuffle(
        array|PlayerToggleShuffleParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PlayerTransferParams $params
     *
     * @throws APIException
     */
    public function transfer(
        array|PlayerTransferParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
