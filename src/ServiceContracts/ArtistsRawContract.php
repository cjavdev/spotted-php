<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\ArtistObject;
use Spotted\Artists\ArtistBulkGetResponse;
use Spotted\Artists\ArtistBulkRetrieveParams;
use Spotted\Artists\ArtistListAlbumsParams;
use Spotted\Artists\ArtistListAlbumsResponse;
use Spotted\Artists\ArtistListRelatedArtistsResponse;
use Spotted\Artists\ArtistTopTracksParams;
use Spotted\Artists\ArtistTopTracksResponse;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;

interface ArtistsRawContract
{
    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     *
     * @return BaseResponse<ArtistObject>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ArtistBulkRetrieveParams $params
     *
     * @return BaseResponse<ArtistBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ArtistBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param array<mixed>|ArtistListAlbumsParams $params
     *
     * @return BaseResponse<CursorURLPage<ArtistListAlbumsResponse>>
     *
     * @throws APIException
     */
    public function listAlbums(
        string $id,
        array|ArtistListAlbumsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     *
     * @return BaseResponse<ArtistListRelatedArtistsResponse>
     *
     * @throws APIException
     */
    public function listRelatedArtists(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param array<mixed>|ArtistTopTracksParams $params
     *
     * @return BaseResponse<ArtistTopTracksResponse>
     *
     * @throws APIException
     */
    public function topTracks(
        string $id,
        array|ArtistTopTracksParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
