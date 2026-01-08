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

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface ArtistsRawContract
{
    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ArtistObject>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ArtistBulkRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ArtistBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ArtistBulkRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param array<string,mixed>|ArtistListAlbumsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<ArtistListAlbumsResponse>>
     *
     * @throws APIException
     */
    public function listAlbums(
        string $id,
        array|ArtistListAlbumsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ArtistListRelatedArtistsResponse>
     *
     * @throws APIException
     */
    public function listRelatedArtists(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param array<string,mixed>|ArtistTopTracksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ArtistTopTracksResponse>
     *
     * @throws APIException
     */
    public function topTracks(
        string $id,
        array|ArtistTopTracksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
