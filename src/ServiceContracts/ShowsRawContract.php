<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\Shows\ShowBulkGetResponse;
use Spotted\Shows\ShowBulkRetrieveParams;
use Spotted\Shows\ShowGetResponse;
use Spotted\Shows\ShowListEpisodesParams;
use Spotted\Shows\ShowRetrieveParams;
use Spotted\SimplifiedEpisodeObject;

interface ShowsRawContract
{
    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the show
     * @param array<mixed>|ShowRetrieveParams $params
     *
     * @return BaseResponse<ShowGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|ShowRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ShowBulkRetrieveParams $params
     *
     * @return BaseResponse<ShowBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ShowBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the show
     * @param array<mixed>|ShowListEpisodesParams $params
     *
     * @return BaseResponse<CursorURLPage<SimplifiedEpisodeObject>>
     *
     * @throws APIException
     */
    public function listEpisodes(
        string $id,
        array|ShowListEpisodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
