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

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface AlbumsRawContract
{
    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the album
     * @param array<string,mixed>|AlbumRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AlbumGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|AlbumRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|AlbumBulkRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AlbumBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AlbumBulkRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the album
     * @param array<string,mixed>|AlbumListTracksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<SimplifiedTrackObject>>
     *
     * @throws APIException
     */
    public function listTracks(
        string $id,
        array|AlbumListTracksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
