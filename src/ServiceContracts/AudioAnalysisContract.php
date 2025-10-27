<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\AudioAnalysis\AudioAnalysisGetResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

interface AudioAnalysisContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AudioAnalysisGetResponse;
}
