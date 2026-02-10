<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\ArtistObject;
use Spotted\Artists\ArtistBulkGetResponse;
use Spotted\Artists\ArtistListAlbumsResponse;
use Spotted\Artists\ArtistListRelatedArtistsResponse;
use Spotted\Artists\ArtistTopTracksResponse;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\ArtistsContract;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class ArtistsService implements ArtistsContract
{
    /**
     * @api
     */
    public ArtistsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ArtistsRawService($client);
    }

    /**
     * @api
     *
     * Get Spotify catalog information for a single artist identified by their unique Spotify ID.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ArtistObject {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get Spotify catalog information for several artists based on their Spotify IDs.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the artists. Maximum: 50 IDs.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        string $ids,
        RequestOptions|array|null $requestOptions = null
    ): ArtistBulkGetResponse {
        $params = Util::removeNulls(['ids' => $ids]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->bulkRetrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Spotify catalog information about an artist's albums.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param string $includeGroups A comma-separated list of keywords that will be used to filter the response. If not supplied, all album types will be returned. <br/>
     * Valid values are:<br/>- `album`<br/>- `single`<br/>- `appears_on`<br/>- `compilation`<br/>For example: `include_groups=album,single`.
     * @param int $limit The maximum number of items to return. Default: 5. Minimum: 1. Maximum: 10.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     * @param RequestOpts|null $requestOptions
     *
     * @return CursorURLPage<ArtistListAlbumsResponse>
     *
     * @throws APIException
     */
    public function listAlbums(
        string $id,
        ?string $includeGroups = null,
        int $limit = 5,
        ?string $market = null,
        int $offset = 0,
        RequestOptions|array|null $requestOptions = null,
    ): CursorURLPage {
        $params = Util::removeNulls(
            [
                'includeGroups' => $includeGroups,
                'limit' => $limit,
                'market' => $market,
                'offset' => $offset,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listAlbums($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get Spotify catalog information about artists similar to a given artist. Similarity is based on analysis of the Spotify community's listening history.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listRelatedArtists(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ArtistListRelatedArtistsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRelatedArtists($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get Spotify catalog information about an artist's top tracks by country.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the artist
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function topTracks(
        string $id,
        ?string $market = null,
        RequestOptions|array|null $requestOptions = null,
    ): ArtistTopTracksResponse {
        $params = Util::removeNulls(['market' => $market]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->topTracks($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
