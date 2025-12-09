<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Recommendations\RecommendationGetParams;
use Spotted\Recommendations\RecommendationGetResponse;
use Spotted\Recommendations\RecommendationListAvailableGenreSeedsResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\RecommendationsContract;

final class RecommendationsService implements RecommendationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @deprecated
     *
     * @api
     *
     * Recommendations are generated based on the available information for a given seed entity and matched against similar artists and tracks. If there is sufficient information about the provided seeds, a list of tracks will be returned together with pool size details.
     *
     * For artists and tracks that are very new or obscure there might not be enough data to generate a list of tracks.
     *
     * @param array{
     *   limit?: int,
     *   market?: string,
     *   max_acousticness?: float,
     *   max_danceability?: float,
     *   max_duration_ms?: int,
     *   max_energy?: float,
     *   max_instrumentalness?: float,
     *   max_key?: int,
     *   max_liveness?: float,
     *   max_loudness?: float,
     *   max_mode?: int,
     *   max_popularity?: int,
     *   max_speechiness?: float,
     *   max_tempo?: float,
     *   max_time_signature?: int,
     *   max_valence?: float,
     *   min_acousticness?: float,
     *   min_danceability?: float,
     *   min_duration_ms?: int,
     *   min_energy?: float,
     *   min_instrumentalness?: float,
     *   min_key?: int,
     *   min_liveness?: float,
     *   min_loudness?: float,
     *   min_mode?: int,
     *   min_popularity?: int,
     *   min_speechiness?: float,
     *   min_tempo?: float,
     *   min_time_signature?: int,
     *   min_valence?: float,
     *   seed_artists?: string,
     *   seed_genres?: string,
     *   seed_tracks?: string,
     *   target_acousticness?: float,
     *   target_danceability?: float,
     *   target_duration_ms?: int,
     *   target_energy?: float,
     *   target_instrumentalness?: float,
     *   target_key?: int,
     *   target_liveness?: float,
     *   target_loudness?: float,
     *   target_mode?: int,
     *   target_popularity?: int,
     *   target_speechiness?: float,
     *   target_tempo?: float,
     *   target_time_signature?: int,
     *   target_valence?: float,
     * }|RecommendationGetParams $params
     *
     * @throws APIException
     */
    public function get(
        array|RecommendationGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecommendationGetResponse {
        [$parsed, $options] = RecommendationGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<RecommendationGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'recommendations',
            query: $parsed,
            options: $options,
            convert: RecommendationGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Retrieve a list of available genres seed parameter values for [recommendations](/documentation/web-api/reference/get-recommendations).
     *
     * @throws APIException
     */
    public function listAvailableGenreSeeds(
        ?RequestOptions $requestOptions = null
    ): RecommendationListAvailableGenreSeedsResponse {
        /** @var BaseResponse<RecommendationListAvailableGenreSeedsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'recommendations/available-genre-seeds',
            options: $requestOptions,
            convert: RecommendationListAvailableGenreSeedsResponse::class,
        );

        return $response->parse();
    }
}
