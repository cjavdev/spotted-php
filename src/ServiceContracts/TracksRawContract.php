<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\TrackObject;
use Spotted\Tracks\TrackBulkGetResponse;
use Spotted\Tracks\TrackBulkRetrieveParams;
use Spotted\Tracks\TrackRetrieveParams;

interface TracksRawContract
{
    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the track
     * @param array<string,mixed>|TrackRetrieveParams $params
     *
     * @return BaseResponse<TrackObject>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|TrackRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TrackBulkRetrieveParams $params
     *
     * @return BaseResponse<TrackBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|TrackBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
