<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\TracksContract;
use Spotted\TrackObject;
use Spotted\Tracks\TrackListParams;
use Spotted\Tracks\TrackListResponse;
use Spotted\Tracks\TrackRetrieveParams;

use const Spotted\Core\OMIT as omit;

final class TracksService implements TracksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single track identified by its
     * unique Spotify ID.
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
    ): TrackObject {
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
    ): TrackObject {
        [$parsed, $options] = TrackRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['tracks/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: TrackObject::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information for multiple tracks based on their Spotify IDs.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=4iV5W9uYEdYUVa79Axb7Rh,1301WleyT98MSxVHPZCA6M`. Maximum: 50 IDs.
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
    ): TrackListResponse {
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
    ): TrackListResponse {
        [$parsed, $options] = TrackListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'tracks',
            query: $parsed,
            options: $options,
            convert: TrackListResponse::class,
        );
    }
}
