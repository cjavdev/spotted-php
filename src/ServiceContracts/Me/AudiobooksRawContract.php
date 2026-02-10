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

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface AudiobooksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AudiobookListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<AudiobookListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AudiobookListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AudiobookCheckParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|AudiobookCheckParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|AudiobookRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        array|AudiobookRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|AudiobookSaveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function save(
        array|AudiobookSaveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
