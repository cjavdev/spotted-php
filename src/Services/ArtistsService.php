<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\ArtistObject;
use Spotted\Artists\ArtistListAlbumsParams;
use Spotted\Artists\ArtistListAlbumsResponse;
use Spotted\Artists\ArtistListParams;
use Spotted\Artists\ArtistListRelatedArtistsResponse;
use Spotted\Artists\ArtistListResponse;
use Spotted\Artists\ArtistListTopTracksParams;
use Spotted\Artists\ArtistListTopTracksResponse;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\ArtistsContract;

use const Spotted\Core\OMIT as omit;

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
        // @phpstan-ignore-next-line;
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
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the artists. Maximum: 50 IDs.
     *
     * @throws APIException
     */
    public function list(
        $ids,
        ?RequestOptions $requestOptions = null
    ): ArtistListResponse {
        $params = ['ids' => $ids];

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
    ): ArtistListResponse {
        [$parsed, $options] = ArtistListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'artists',
            query: $parsed,
            options: $options,
            convert: ArtistListResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information about an artist's albums.
     *
     * @param string $includeGroups A comma-separated list of keywords that will be used to filter the response. If not supplied, all album types will be returned. <br/>
     * Valid values are:<br/>- `album`<br/>- `single`<br/>- `appears_on`<br/>- `compilation`<br/>For example: `include_groups=album,single`.
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @return CursorURLPage<ArtistListAlbumsResponse>
     *
     * @throws APIException
     */
    public function listAlbums(
        string $id,
        $includeGroups = omit,
        $limit = omit,
        $market = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        $params = [
            'includeGroups' => $includeGroups,
            'limit' => $limit,
            'market' => $market,
            'offset' => $offset,
        ];

        return $this->listAlbumsRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CursorURLPage<ArtistListAlbumsResponse>
     *
     * @throws APIException
     */
    public function listAlbumsRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = ArtistListAlbumsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['artists/%1$s/albums', $id],
            query: $parsed,
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
     * @throws APIException
     */
    public function listRelatedArtists(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ArtistListRelatedArtistsResponse {
        // @phpstan-ignore-next-line;
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
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     *
     * @throws APIException
     */
    public function listTopTracks(
        string $id,
        $market = omit,
        ?RequestOptions $requestOptions = null
    ): ArtistListTopTracksResponse {
        $params = ['market' => $market];

        return $this->listTopTracksRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listTopTracksRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ArtistListTopTracksResponse {
        [$parsed, $options] = ArtistListTopTracksParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['artists/%1$s/top-tracks', $id],
            query: $parsed,
            options: $options,
            convert: ArtistListTopTracksResponse::class,
        );
    }
}
