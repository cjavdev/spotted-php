<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
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
     *   maxAcousticness?: float,
     *   maxDanceability?: float,
     *   maxDurationMs?: int,
     *   maxEnergy?: float,
     *   maxInstrumentalness?: float,
     *   maxKey?: int,
     *   maxLiveness?: float,
     *   maxLoudness?: float,
     *   maxMode?: int,
     *   maxPopularity?: int,
     *   maxSpeechiness?: float,
     *   maxTempo?: float,
     *   maxTimeSignature?: int,
     *   maxValence?: float,
     *   minAcousticness?: float,
     *   minDanceability?: float,
     *   minDurationMs?: int,
     *   minEnergy?: float,
     *   minInstrumentalness?: float,
     *   minKey?: int,
     *   minLiveness?: float,
     *   minLoudness?: float,
     *   minMode?: int,
     *   minPopularity?: int,
     *   minSpeechiness?: float,
     *   minTempo?: float,
     *   minTimeSignature?: int,
     *   minValence?: float,
     *   seedArtists?: string,
     *   seedGenres?: string,
     *   seedTracks?: string,
     *   targetAcousticness?: float,
     *   targetDanceability?: float,
     *   targetDurationMs?: int,
     *   targetEnergy?: float,
     *   targetInstrumentalness?: float,
     *   targetKey?: int,
     *   targetLiveness?: float,
     *   targetLoudness?: float,
     *   targetMode?: int,
     *   targetPopularity?: int,
     *   targetSpeechiness?: float,
     *   targetTempo?: float,
     *   targetTimeSignature?: int,
     *   targetValence?: float,
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
            query: Util::array_transform_keys(
                $parsed,
                [
                    'maxAcousticness' => 'max_acousticness',
                    'maxDanceability' => 'max_danceability',
                    'maxDurationMs' => 'max_duration_ms',
                    'maxEnergy' => 'max_energy',
                    'maxInstrumentalness' => 'max_instrumentalness',
                    'maxKey' => 'max_key',
                    'maxLiveness' => 'max_liveness',
                    'maxLoudness' => 'max_loudness',
                    'maxMode' => 'max_mode',
                    'maxPopularity' => 'max_popularity',
                    'maxSpeechiness' => 'max_speechiness',
                    'maxTempo' => 'max_tempo',
                    'maxTimeSignature' => 'max_time_signature',
                    'maxValence' => 'max_valence',
                    'minAcousticness' => 'min_acousticness',
                    'minDanceability' => 'min_danceability',
                    'minDurationMs' => 'min_duration_ms',
                    'minEnergy' => 'min_energy',
                    'minInstrumentalness' => 'min_instrumentalness',
                    'minKey' => 'min_key',
                    'minLiveness' => 'min_liveness',
                    'minLoudness' => 'min_loudness',
                    'minMode' => 'min_mode',
                    'minPopularity' => 'min_popularity',
                    'minSpeechiness' => 'min_speechiness',
                    'minTempo' => 'min_tempo',
                    'minTimeSignature' => 'min_time_signature',
                    'minValence' => 'min_valence',
                    'seedArtists' => 'seed_artists',
                    'seedGenres' => 'seed_genres',
                    'seedTracks' => 'seed_tracks',
                    'targetAcousticness' => 'target_acousticness',
                    'targetDanceability' => 'target_danceability',
                    'targetDurationMs' => 'target_duration_ms',
                    'targetEnergy' => 'target_energy',
                    'targetInstrumentalness' => 'target_instrumentalness',
                    'targetKey' => 'target_key',
                    'targetLiveness' => 'target_liveness',
                    'targetLoudness' => 'target_loudness',
                    'targetMode' => 'target_mode',
                    'targetPopularity' => 'target_popularity',
                    'targetSpeechiness' => 'target_speechiness',
                    'targetTempo' => 'target_tempo',
                    'targetTimeSignature' => 'target_time_signature',
                    'targetValence' => 'target_valence',
                ],
            ),
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
