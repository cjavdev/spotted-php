<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\AudioAnalysis\AudioAnalysisGetResponse;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

interface AudioAnalysisRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the track
     *
     * @return BaseResponse<AudioAnalysisGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
