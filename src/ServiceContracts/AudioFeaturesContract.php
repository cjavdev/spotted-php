<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\AudioFeatures\AudioFeatureBulkGetResponse;
use Spotted\AudioFeatures\AudioFeatureBulkRetrieveParams;
use Spotted\AudioFeatures\AudioFeatureGetResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

interface AudioFeaturesContract
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
    ): AudioFeatureGetResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<mixed>|AudioFeatureBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AudioFeatureBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): AudioFeatureBulkGetResponse;
}
