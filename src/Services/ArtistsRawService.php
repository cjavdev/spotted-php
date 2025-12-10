<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\ArtistObject;
use Spotted\Artists\ArtistBulkGetResponse;
use Spotted\Artists\ArtistBulkRetrieveParams;
use Spotted\Artists\ArtistListAlbumsParams;
use Spotted\Artists\ArtistListAlbumsResponse;
use Spotted\Artists\ArtistListRelatedArtistsResponse;
use Spotted\Artists\ArtistTopTracksParams;
use Spotted\Artists\ArtistTopTracksResponse;
use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\ArtistsRawContract;

final class ArtistsRawService implements ArtistsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single artist identified by their unique Spotify ID.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['artists/%1$s', $id],
            options: $requestOptions,
            convert: ArtistObject::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information for several artists based on their Spotify IDs.
     *
     * @param array{ids: string}|ArtistBulkRetrieveParams $params
     *
     * @return BaseResponse<ArtistBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ArtistBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ArtistBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'artists',
            query: $parsed,
            options: $options,
            convert: ArtistBulkGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information about an artist's albums.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param array{
     *   includeGroups?: string, limit?: int, market?: string, offset?: int
     * }|ArtistListAlbumsParams $params
     *
     * @return BaseResponse<CursorURLPage<ArtistListAlbumsResponse>>
     *
     * @throws APIException
     */
    public function listAlbums(
        string $id,
        array|ArtistListAlbumsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ArtistListAlbumsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['artists/%1$s/albums', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['includeGroups' => 'include_groups']
            ),
            options: $options,
            convert: ArtistListAlbumsResponse::class,
            page: CursorURLPage::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get Spotify catalog information about artists similar to a given artist. Similarity is based on analysis of the Spotify community's listening history.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['artists/%1$s/related-artists', $id],
            options: $requestOptions,
            convert: ArtistListRelatedArtistsResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information about an artist's top tracks by country.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param array{market?: string}|ArtistTopTracksParams $params
     *
     * @return BaseResponse<ArtistTopTracksResponse>
     *
     * @throws APIException
     */
    public function topTracks(
        string $id,
        array|ArtistTopTracksParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ArtistTopTracksParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['artists/%1$s/top-tracks', $id],
            query: $parsed,
            options: $options,
            convert: ArtistTopTracksResponse::class,
        );
    }
}
