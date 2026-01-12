<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\AudioAnalysis\AudioAnalysisGetResponse;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface AudioAnalysisRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the track
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AudioAnalysisGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
