<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\AudioFeatures\AudioFeatureBulkGetResponse;
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
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track
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
    public function bulkRetrieve(
        string $ids,
        ?RequestOptions $requestOptions = null
    ): AudioFeatureBulkGetResponse;
}
