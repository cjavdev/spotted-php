<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\Search\SearchQueryParams;
use Spotted\Search\SearchQueryResponse;

interface SearchContract
{
    /**
     * @api
     *
     * @param array<mixed>|SearchQueryParams $params
     *
     * @throws APIException
     */
    public function query(
        array|SearchQueryParams $params,
        ?RequestOptions $requestOptions = null
    ): SearchQueryResponse;
}
