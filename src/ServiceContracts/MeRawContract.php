<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\MeGetResponse;
use Spotted\RequestOptions;

interface MeRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<MeGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
