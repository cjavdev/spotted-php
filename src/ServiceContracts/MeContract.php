<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Exceptions\APIException;
use Spotted\Me\MeGetResponse;
use Spotted\RequestOptions;

interface MeContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): MeGetResponse;
}
