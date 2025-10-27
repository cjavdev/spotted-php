<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Exceptions\APIException;
use Spotted\Markets\MarketListResponse;
use Spotted\RequestOptions;

interface MarketsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MarketListResponse;
}
