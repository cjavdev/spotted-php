<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me\Player;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Player\Queue\QueueAddParams;
use Spotted\Me\Player\Queue\QueueGetResponse;
use Spotted\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface QueueRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|QueueAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function add(
        array|QueueAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueGetResponse>
     *
     * @throws APIException
     */
    public function get(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
