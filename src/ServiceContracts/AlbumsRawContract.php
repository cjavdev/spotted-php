<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Albums\AlbumBulkGetResponse;
use Spotted\Albums\AlbumBulkRetrieveParams;
use Spotted\Albums\AlbumGetResponse;
use Spotted\Albums\AlbumListTracksParams;
use Spotted\Albums\AlbumRetrieveParams;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\SimplifiedTrackObject;

interface AlbumsRawContract
{
    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the album
     * @param array<string,mixed>|AlbumRetrieveParams $params
     *
     * @return BaseResponse<AlbumGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|AlbumRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AlbumBulkRetrieveParams $params
     *
     * @return BaseResponse<AlbumBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AlbumBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the album
     * @param array<string,mixed>|AlbumListTracksParams $params
     *
     * @return BaseResponse<CursorURLPage<SimplifiedTrackObject>>
     *
     * @throws APIException
     */
    public function listTracks(
        string $id,
        array|AlbumListTracksParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
