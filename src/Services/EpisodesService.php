<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\EpisodeObject;
use Spotted\Episodes\EpisodeBulkGetResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\EpisodesContract;

final class EpisodesService implements EpisodesContract
{
    /**
     * @api
     */
    public EpisodesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EpisodesRawService($client);
    }

    /**
     * @api
     *
     * Get Spotify catalog information for a single episode identified by its
     * unique Spotify ID.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the episode
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
        ?string $market = null,
        ?RequestOptions $requestOptions = null
    ): EpisodeObject {
        $params = ['market' => $market];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Spotify catalog information for several episodes based on their Spotify IDs.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the episodes. Maximum: 50 IDs.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        string $ids,
        ?string $market = null,
        ?RequestOptions $requestOptions = null
    ): EpisodeBulkGetResponse {
        $params = ['ids' => $ids, 'market' => $market];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->bulkRetrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
