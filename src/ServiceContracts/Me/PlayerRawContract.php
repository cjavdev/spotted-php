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

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface PlayerRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PlayerGetCurrentlyPlayingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlayerGetCurrentlyPlayingResponse>
     *
     * @throws APIException
     */
    public function getCurrentlyPlaying(
        array|PlayerGetCurrentlyPlayingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlayerGetDevicesResponse>
     *
     * @throws APIException
     */
    public function getDevices(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlayerGetStateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlayerGetStateResponse>
     *
     * @throws APIException
     */
    public function getState(
        array|PlayerGetStateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlayerListRecentlyPlayedParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<PlayerListRecentlyPlayedResponse>>
     *
     * @throws APIException
     */
    public function listRecentlyPlayed(
        array|PlayerListRecentlyPlayedParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlayerPausePlaybackParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function pausePlayback(
        array|PlayerPausePlaybackParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlayerSeekToPositionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function seekToPosition(
        array|PlayerSeekToPositionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlayerSetRepeatModeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setRepeatMode(
        array|PlayerSetRepeatModeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlayerSetVolumeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setVolume(
        array|PlayerSetVolumeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlayerSkipNextParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function skipNext(
        array|PlayerSkipNextParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlayerSkipPreviousParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function skipPrevious(
        array|PlayerSkipPreviousParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlayerStartPlaybackParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function startPlayback(
        array|PlayerStartPlaybackParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlayerToggleShuffleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function toggleShuffle(
        array|PlayerToggleShuffleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PlayerTransferParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function transfer(
        array|PlayerTransferParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
