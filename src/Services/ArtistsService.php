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
use Spotted\ServiceContracts\ArtistsContract;

final class ArtistsService implements ArtistsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single artist identified by their unique Spotify ID.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ArtistObject {
        /** @var BaseResponse<ArtistObject> */
        $response = $this->client->request(
            method: 'get',
            path: ['artists/%1$s', $id],
            options: $requestOptions,
            convert: ArtistObject::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Spotify catalog information for several artists based on their Spotify IDs.
     *
     * @param array{ids: string}|ArtistBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ArtistBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ArtistBulkGetResponse {
        [$parsed, $options] = ArtistBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ArtistBulkGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'artists',
            query: $parsed,
            options: $options,
            convert: ArtistBulkGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Spotify catalog information about an artist's albums.
     *
     * @param array{
     *   includeGroups?: string, limit?: int, market?: string, offset?: int
     * }|ArtistListAlbumsParams $params
     *
     * @return CursorURLPage<ArtistListAlbumsResponse>
     *
     * @throws APIException
     */
    public function listAlbums(
        string $id,
        array|ArtistListAlbumsParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        [$parsed, $options] = ArtistListAlbumsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CursorURLPage<ArtistListAlbumsResponse>> */
        $response = $this->client->request(
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

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get Spotify catalog information about artists similar to a given artist. Similarity is based on analysis of the Spotify community's listening history.
     *
     * @throws APIException
     */
    public function listRelatedArtists(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ArtistListRelatedArtistsResponse {
        /** @var BaseResponse<ArtistListRelatedArtistsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['artists/%1$s/related-artists', $id],
            options: $requestOptions,
            convert: ArtistListRelatedArtistsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Spotify catalog information about an artist's top tracks by country.
     *
     * @param array{market?: string}|ArtistTopTracksParams $params
     *
     * @throws APIException
     */
    public function topTracks(
        string $id,
        array|ArtistTopTracksParams $params,
        ?RequestOptions $requestOptions = null,
    ): ArtistTopTracksResponse {
        [$parsed, $options] = ArtistTopTracksParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ArtistTopTracksResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['artists/%1$s/top-tracks', $id],
            query: $parsed,
            options: $options,
            convert: ArtistTopTracksResponse::class,
        );

        return $response->parse();
    }
}
