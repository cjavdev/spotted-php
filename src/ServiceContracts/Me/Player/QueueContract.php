<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me\Player;

use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Player\Queue\QueueAddParams;
use Spotted\Me\Player\Queue\QueueGetResponse;
use Spotted\RequestOptions;

interface QueueContract
{
    /**
     * @api
     *
     * @param array<mixed>|QueueAddParams $params
     *
     * @throws APIException
     */
    public function add(
        array|QueueAddParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse;
}
