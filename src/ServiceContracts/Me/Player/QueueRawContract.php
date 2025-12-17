<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me\Player;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Player\Queue\QueueAddParams;
use Spotted\Me\Player\Queue\QueueGetResponse;
use Spotted\RequestOptions;

interface QueueRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|QueueAddParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function add(
        array|QueueAddParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<QueueGetResponse>
     *
     * @throws APIException
     */
    public function get(?RequestOptions $requestOptions = null): BaseResponse;
}
