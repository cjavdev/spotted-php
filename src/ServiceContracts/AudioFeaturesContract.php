<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\AudioFeatures\AudioFeatureGetResponse;
use Spotted\AudioFeatures\AudioFeatureListResponse;
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
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids)
     * for the tracks. Maximum: 100 IDs.
     *
     * @throws APIException
     */
    public function list(
        $ids,
        ?RequestOptions $requestOptions = null
    ): AudioFeatureListResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AudioFeatureListResponse;
}
