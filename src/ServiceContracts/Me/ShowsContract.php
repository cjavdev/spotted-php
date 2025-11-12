<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Shows\ShowCheckParams;
use Spotted\Me\Shows\ShowListParams;
use Spotted\Me\Shows\ShowListResponse;
use Spotted\Me\Shows\ShowRemoveParams;
use Spotted\Me\Shows\ShowSaveParams;
use Spotted\RequestOptions;

interface ShowsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ShowListParams $params
     *
     * @return CursorURLPage<ShowListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ShowListParams $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage;

    /**
     * @api
     *
     * @param array<mixed>|ShowCheckParams $params
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        array|ShowCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param array<mixed>|ShowRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        array|ShowRemoveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ShowSaveParams $params
     *
     * @throws APIException
     */
    public function save(
        array|ShowSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
