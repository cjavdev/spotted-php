<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Albums\AlbumCheckParams;
use Spotted\Me\Albums\AlbumListParams;
use Spotted\Me\Albums\AlbumListResponse;
use Spotted\Me\Albums\AlbumRemoveParams;
use Spotted\Me\Albums\AlbumSaveParams;
use Spotted\RequestOptions;

interface AlbumsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AlbumListParams $params
     *
     * @return CursorURLPage<AlbumListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AlbumListParams $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage;

    /**
     * @api
     *
     * @param array<mixed>|AlbumCheckParams $params
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        array|AlbumCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param array<mixed>|AlbumRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        array|AlbumRemoveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|AlbumSaveParams $params
     *
     * @throws APIException
     */
    public function save(
        array|AlbumSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
