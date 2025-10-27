<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Albums\AlbumGetResponse;
use Spotted\Albums\AlbumListParams;
use Spotted\Albums\AlbumListResponse;
use Spotted\Albums\AlbumListTracksParams;
use Spotted\Albums\AlbumRetrieveParams;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\AlbumsContract;
use Spotted\SimplifiedTrackObject;

use const Spotted\Core\OMIT as omit;

final class AlbumsService implements AlbumsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single album.
     *
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        $market = omit,
        ?RequestOptions $requestOptions = null
    ): AlbumGetResponse {
        $params = ['market' => $market];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AlbumGetResponse {
        [$parsed, $options] = AlbumRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the albums. Maximum: 20 IDs.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     *
     * @throws APIException
     */
    public function list(
        $ids,
        $market = omit,
        ?RequestOptions $requestOptions = null
    ): AlbumListResponse {
        $params = ['ids' => $ids, 'market' => $market];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AlbumListResponse {
        [$parsed, $options] = AlbumListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'albums',
            query: $parsed,
            options: $options,
            convert: AlbumListResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information about an album’s tracks.
     * Optional parameters can be used to limit the number of tracks returned.
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @return CursorURLPage<SimplifiedTrackObject>
     *
     * @throws APIException
     */
    public function listTracks(
        string $id,
        $limit = omit,
        $market = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        $params = ['limit' => $limit, 'market' => $market, 'offset' => $offset];

        return $this->listTracksRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CursorURLPage<SimplifiedTrackObject>
     *
     * @throws APIException
     */
    public function listTracksRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = AlbumListTracksParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
