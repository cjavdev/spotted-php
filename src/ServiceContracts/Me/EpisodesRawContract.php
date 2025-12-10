<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Episodes\EpisodeCheckParams;
use Spotted\Me\Episodes\EpisodeListParams;
use Spotted\Me\Episodes\EpisodeListResponse;
use Spotted\Me\Episodes\EpisodeRemoveParams;
use Spotted\Me\Episodes\EpisodeSaveParams;
use Spotted\RequestOptions;

interface EpisodesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|EpisodeListParams $params
     *
     * @return BaseResponse<CursorURLPage<EpisodeListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|EpisodeListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EpisodeCheckParams $params
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|EpisodeCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EpisodeRemoveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        array|EpisodeRemoveParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EpisodeSaveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function save(
        array|EpisodeSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
