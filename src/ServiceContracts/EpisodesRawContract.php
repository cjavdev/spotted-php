<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\EpisodeObject;
use Spotted\Episodes\EpisodeBulkGetResponse;
use Spotted\Episodes\EpisodeBulkRetrieveParams;
use Spotted\Episodes\EpisodeRetrieveParams;
use Spotted\RequestOptions;

interface EpisodesRawContract
{
    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the episode
     * @param array<mixed>|EpisodeRetrieveParams $params
     *
     * @return BaseResponse<EpisodeObject>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|EpisodeRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EpisodeBulkRetrieveParams $params
     *
     * @return BaseResponse<EpisodeBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|EpisodeBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
