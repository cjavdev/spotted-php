<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\ArtistObject;
use Spotted\Artists\ArtistListAlbumsResponse;
use Spotted\Artists\ArtistListRelatedArtistsResponse;
use Spotted\Artists\ArtistListResponse;
use Spotted\Artists\ArtistListTopTracksResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;

use const Spotted\Core\OMIT as omit;

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
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the artists. Maximum: 50 IDs.
     *
     * @throws APIException
     */
    public function list(
        $ids,
        ?RequestOptions $requestOptions = null
    ): ArtistListResponse;

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
    ): ArtistListResponse;

    /**
     * @api
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
    ): CursorURLPage;

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
    ): ArtistListTopTracksResponse;

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
    ): ArtistListTopTracksResponse;
}
