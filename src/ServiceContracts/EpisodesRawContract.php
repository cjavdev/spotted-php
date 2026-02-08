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

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface EpisodesRawContract
{
    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the episode
     * @param array<string,mixed>|EpisodeRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EpisodeObject>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|EpisodeRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|EpisodeBulkRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EpisodeBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|EpisodeBulkRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
