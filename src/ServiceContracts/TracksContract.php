<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\TrackObject;
use Spotted\Tracks\TrackBulkGetResponse;
use Spotted\Tracks\TrackBulkRetrieveParams;
use Spotted\Tracks\TrackRetrieveParams;

interface TracksContract
{
    /**
     * @api
     *
     * @param array<mixed>|TrackRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|TrackRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): TrackObject;

    /**
     * @api
     *
     * @param array<mixed>|TrackBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|TrackBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): TrackBulkGetResponse;
}
