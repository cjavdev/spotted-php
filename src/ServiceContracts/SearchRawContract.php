<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\Search\SearchQueryParams;
use Spotted\Search\SearchQueryResponse;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface SearchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SearchQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SearchQueryResponse>
     *
     * @throws APIException
     */
    public function query(
        array|SearchQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
