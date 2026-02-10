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

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface EpisodesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EpisodeListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<EpisodeListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|EpisodeListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EpisodeCheckParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|EpisodeCheckParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|EpisodeRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        array|EpisodeRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|EpisodeSaveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function save(
        array|EpisodeSaveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
