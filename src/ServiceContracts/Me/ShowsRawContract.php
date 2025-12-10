<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Shows\ShowCheckParams;
use Spotted\Me\Shows\ShowListParams;
use Spotted\Me\Shows\ShowListResponse;
use Spotted\Me\Shows\ShowRemoveParams;
use Spotted\Me\Shows\ShowSaveParams;
use Spotted\RequestOptions;

interface ShowsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|ShowListParams $params
     *
     * @return BaseResponse<CursorURLPage<ShowListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ShowListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ShowCheckParams $params
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|ShowCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ShowRemoveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        array|ShowRemoveParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ShowSaveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function save(
        array|ShowSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
