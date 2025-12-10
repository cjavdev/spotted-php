<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Audiobooks\AudiobookCheckParams;
use Spotted\Me\Audiobooks\AudiobookListParams;
use Spotted\Me\Audiobooks\AudiobookListResponse;
use Spotted\Me\Audiobooks\AudiobookRemoveParams;
use Spotted\Me\Audiobooks\AudiobookSaveParams;
use Spotted\RequestOptions;

interface AudiobooksRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|AudiobookListParams $params
     *
     * @return BaseResponse<CursorURLPage<AudiobookListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AudiobookListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AudiobookCheckParams $params
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|AudiobookCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AudiobookRemoveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        array|AudiobookRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AudiobookSaveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function save(
        array|AudiobookSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
