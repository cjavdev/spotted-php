<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Tracks\TrackCheckParams;
use Spotted\Me\Tracks\TrackListParams;
use Spotted\Me\Tracks\TrackListResponse;
use Spotted\Me\Tracks\TrackRemoveParams;
use Spotted\Me\Tracks\TrackSaveParams;
use Spotted\RequestOptions;

interface TracksRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|TrackListParams $params
     *
     * @return BaseResponse<CursorURLPage<TrackListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|TrackListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TrackCheckParams $params
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|TrackCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TrackRemoveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        array|TrackRemoveParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TrackSaveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function save(
        array|TrackSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
