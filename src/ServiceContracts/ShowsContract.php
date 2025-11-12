<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\Shows\ShowBulkGetResponse;
use Spotted\Shows\ShowBulkRetrieveParams;
use Spotted\Shows\ShowGetResponse;
use Spotted\Shows\ShowListEpisodesParams;
use Spotted\Shows\ShowRetrieveParams;
use Spotted\SimplifiedEpisodeObject;

interface ShowsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ShowRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|ShowRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ShowGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ShowBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ShowBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ShowBulkGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ShowListEpisodesParams $params
     *
     * @return CursorURLPage<SimplifiedEpisodeObject>
     *
     * @throws APIException
     */
    public function listEpisodes(
        string $id,
        array|ShowListEpisodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;
}
