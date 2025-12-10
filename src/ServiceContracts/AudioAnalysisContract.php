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
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the track
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AudioAnalysisGetResponse;
}
