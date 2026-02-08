<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Markets\MarketListResponse;
use Spotted\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface MarketsRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
