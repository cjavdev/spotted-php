<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Exceptions\APIException;
use Spotted\EpisodeObject;
use Spotted\Episodes\EpisodeBulkGetResponse;
use Spotted\Episodes\EpisodeBulkRetrieveParams;
use Spotted\Episodes\EpisodeRetrieveParams;
use Spotted\RequestOptions;

interface EpisodesContract
{
    /**
     * @api
     *
     * @param array<mixed>|EpisodeRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|EpisodeRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): EpisodeObject;

    /**
     * @api
     *
     * @param array<mixed>|EpisodeBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|EpisodeBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): EpisodeBulkGetResponse;
}
