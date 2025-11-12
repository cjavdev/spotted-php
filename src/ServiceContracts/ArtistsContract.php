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
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;

interface ArtistsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ArtistObject;

    /**
     * @api
     *
     * @param array<mixed>|ArtistBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ArtistBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ArtistBulkGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ArtistListAlbumsParams $params
     *
     * @return CursorURLPage<ArtistListAlbumsResponse>
     *
     * @throws APIException
     */
    public function listAlbums(
        string $id,
        array|ArtistListAlbumsParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;

    /**
     * @deprecated
     *
     * @api
     *
     * @throws APIException
     */
    public function listRelatedArtists(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ArtistListRelatedArtistsResponse;

    /**
     * @api
     *
     * @param array<mixed>|ArtistTopTracksParams $params
     *
     * @throws APIException
     */
    public function topTracks(
        string $id,
        array|ArtistTopTracksParams $params,
        ?RequestOptions $requestOptions = null,
    ): ArtistTopTracksResponse;
}
