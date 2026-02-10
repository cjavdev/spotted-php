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

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface TracksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TrackListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<TrackListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|TrackListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TrackCheckParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|TrackCheckParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|TrackRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        array|TrackRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|TrackSaveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function save(
        array|TrackSaveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
