<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Albums\AlbumBulkGetResponse;
use Spotted\Albums\AlbumBulkRetrieveParams;
use Spotted\Albums\AlbumGetResponse;
use Spotted\Albums\AlbumListTracksParams;
use Spotted\Albums\AlbumRetrieveParams;
use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\AlbumsRawContract;
use Spotted\SimplifiedTrackObject;

final class AlbumsRawService implements AlbumsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single album.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the album
     * @param array{market?: string}|AlbumRetrieveParams $params
     *
     * @return BaseResponse<AlbumGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|AlbumRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AlbumRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['albums/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: AlbumGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information for multiple albums identified by their Spotify IDs.
     *
     * @param array{ids: string, market?: string}|AlbumBulkRetrieveParams $params
     *
     * @return BaseResponse<AlbumBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AlbumBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AlbumBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'albums',
            query: $parsed,
            options: $options,
            convert: AlbumBulkGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information about an album’s tracks.
     * Optional parameters can be used to limit the number of tracks returned.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the album
     * @param array{
     *   limit?: int, market?: string, offset?: int
     * }|AlbumListTracksParams $params
     *
     * @return BaseResponse<CursorURLPage<SimplifiedTrackObject>>
     *
     * @throws APIException
     */
    public function listTracks(
        string $id,
        array|AlbumListTracksParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AlbumListTracksParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['albums/%1$s/tracks', $id],
            query: $parsed,
            options: $options,
            convert: SimplifiedTrackObject::class,
            page: CursorURLPage::class,
        );
    }
}
