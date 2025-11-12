<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Albums\AlbumBulkGetResponse;
use Spotted\Albums\AlbumBulkRetrieveParams;
use Spotted\Albums\AlbumGetResponse;
use Spotted\Albums\AlbumListTracksParams;
use Spotted\Albums\AlbumRetrieveParams;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\SimplifiedTrackObject;

interface AlbumsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AlbumRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|AlbumRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): AlbumGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|AlbumBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AlbumBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): AlbumBulkGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|AlbumListTracksParams $params
     *
     * @return CursorURLPage<SimplifiedTrackObject>
     *
     * @throws APIException
     */
    public function listTracks(
        string $id,
        array|AlbumListTracksParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;
}
