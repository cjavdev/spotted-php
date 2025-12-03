<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Audiobooks\AudiobookCheckParams;
use Spotted\Me\Audiobooks\AudiobookListParams;
use Spotted\Me\Audiobooks\AudiobookListResponse;
use Spotted\Me\Audiobooks\AudiobookRemoveParams;
use Spotted\Me\Audiobooks\AudiobookSaveParams;
use Spotted\RequestOptions;

interface AudiobooksContract
{
    /**
     * @api
     *
     * @param array<mixed>|AudiobookListParams $params
     *
     * @return CursorURLPage<AudiobookListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AudiobookListParams $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage;

    /**
     * @api
     *
     * @param array<mixed>|AudiobookCheckParams $params
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        array|AudiobookCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param array<mixed>|AudiobookRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        array|AudiobookRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AudiobookSaveParams $params
     *
     * @throws APIException
     */
    public function save(
        array|AudiobookSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
