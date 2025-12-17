<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\AudioFeatures\AudioFeatureBulkGetResponse;
use Spotted\AudioFeatures\AudioFeatureBulkRetrieveParams;
use Spotted\AudioFeatures\AudioFeatureGetResponse;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

interface AudioFeaturesRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track
     *
     * @return BaseResponse<AudioFeatureGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|AudioFeatureBulkRetrieveParams $params
     *
     * @return BaseResponse<AudioFeatureBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AudioFeatureBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
