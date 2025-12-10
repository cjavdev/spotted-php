<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Contracts\BaseResponse;
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

interface PlayerRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PlayerGetCurrentlyPlayingParams $params
     *
     * @return BaseResponse<PlayerGetCurrentlyPlayingResponse>
     *
     * @throws APIException
     */
    public function getCurrentlyPlaying(
        array|PlayerGetCurrentlyPlayingParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<PlayerGetDevicesResponse>
     *
     * @throws APIException
     */
    public function getDevices(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerGetStateParams $params
     *
     * @return BaseResponse<PlayerGetStateResponse>
     *
     * @throws APIException
     */
    public function getState(
        array|PlayerGetStateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerListRecentlyPlayedParams $params
     *
     * @return BaseResponse<CursorURLPage<PlayerListRecentlyPlayedResponse>>
     *
     * @throws APIException
     */
    public function listRecentlyPlayed(
        array|PlayerListRecentlyPlayedParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerPausePlaybackParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function pausePlayback(
        array|PlayerPausePlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerSeekToPositionParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function seekToPosition(
        array|PlayerSeekToPositionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerSetRepeatModeParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setRepeatMode(
        array|PlayerSetRepeatModeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerSetVolumeParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setVolume(
        array|PlayerSetVolumeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerSkipNextParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function skipNext(
        array|PlayerSkipNextParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerSkipPreviousParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function skipPrevious(
        array|PlayerSkipPreviousParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerStartPlaybackParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function startPlayback(
        array|PlayerStartPlaybackParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerToggleShuffleParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function toggleShuffle(
        array|PlayerToggleShuffleParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlayerTransferParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function transfer(
        array|PlayerTransferParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
