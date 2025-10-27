<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Recommendations\RecommendationGetParams;
use Spotted\Recommendations\RecommendationGetResponse;
use Spotted\Recommendations\RecommendationListAvailableGenreSeedsResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\RecommendationsContract;

use const Spotted\Core\OMIT as omit;

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
     * @param int $limit The target size of the list of recommended tracks. For seeds with unusually small pools or when highly restrictive filtering is applied, it may be impossible to generate the requested number of recommended tracks. Debugging information for such cases is available in the response. Default: 20\. Minimum: 1\. Maximum: 100.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     * @param float $maxAcousticness For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param float $maxDanceability For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param int $maxDurationMs For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param float $maxEnergy For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param float $maxInstrumentalness For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param int $maxKey For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param float $maxLiveness For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param float $maxLoudness For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param int $maxMode For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param int $maxPopularity For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param float $maxSpeechiness For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param float $maxTempo For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param int $maxTimeSignature For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param float $maxValence For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     * @param float $minAcousticness For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param float $minDanceability For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param int $minDurationMs For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param float $minEnergy For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param float $minInstrumentalness For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param int $minKey For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param float $minLiveness For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param float $minLoudness For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param int $minMode For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param int $minPopularity For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param float $minSpeechiness For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param float $minTempo For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param int $minTimeSignature For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param float $minValence For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     * @param string $seedArtists A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for seed artists.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_genres` and `seed_tracks` are not set_.
     * @param string $seedGenres A comma separated list of any genres in the set of [available genre seeds](/documentation/web-api/reference/get-recommendation-genres). Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_tracks` are not set_.
     * @param string $seedTracks A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for a seed track.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_genres` are not set_.
     * @param float $targetAcousticness For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     * @param float $targetDanceability For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     * @param int $targetDurationMs Target duration of the track (ms)
     * @param float $targetEnergy For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     * @param float $targetInstrumentalness For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     * @param int $targetKey For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     * @param float $targetLiveness For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     * @param float $targetLoudness For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     * @param int $targetMode For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     * @param int $targetPopularity For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     * @param float $targetSpeechiness For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     * @param float $targetTempo Target tempo (BPM)
     * @param int $targetTimeSignature For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     * @param float $targetValence For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     *
     * @throws APIException
     */
    public function get(
        $limit = omit,
        $market = omit,
        $maxAcousticness = omit,
        $maxDanceability = omit,
        $maxDurationMs = omit,
        $maxEnergy = omit,
        $maxInstrumentalness = omit,
        $maxKey = omit,
        $maxLiveness = omit,
        $maxLoudness = omit,
        $maxMode = omit,
        $maxPopularity = omit,
        $maxSpeechiness = omit,
        $maxTempo = omit,
        $maxTimeSignature = omit,
        $maxValence = omit,
        $minAcousticness = omit,
        $minDanceability = omit,
        $minDurationMs = omit,
        $minEnergy = omit,
        $minInstrumentalness = omit,
        $minKey = omit,
        $minLiveness = omit,
        $minLoudness = omit,
        $minMode = omit,
        $minPopularity = omit,
        $minSpeechiness = omit,
        $minTempo = omit,
        $minTimeSignature = omit,
        $minValence = omit,
        $seedArtists = omit,
        $seedGenres = omit,
        $seedTracks = omit,
        $targetAcousticness = omit,
        $targetDanceability = omit,
        $targetDurationMs = omit,
        $targetEnergy = omit,
        $targetInstrumentalness = omit,
        $targetKey = omit,
        $targetLiveness = omit,
        $targetLoudness = omit,
        $targetMode = omit,
        $targetPopularity = omit,
        $targetSpeechiness = omit,
        $targetTempo = omit,
        $targetTimeSignature = omit,
        $targetValence = omit,
        ?RequestOptions $requestOptions = null,
    ): RecommendationGetResponse {
        $params = [
            'limit' => $limit,
            'market' => $market,
            'maxAcousticness' => $maxAcousticness,
            'maxDanceability' => $maxDanceability,
            'maxDurationMs' => $maxDurationMs,
            'maxEnergy' => $maxEnergy,
            'maxInstrumentalness' => $maxInstrumentalness,
            'maxKey' => $maxKey,
            'maxLiveness' => $maxLiveness,
            'maxLoudness' => $maxLoudness,
            'maxMode' => $maxMode,
            'maxPopularity' => $maxPopularity,
            'maxSpeechiness' => $maxSpeechiness,
            'maxTempo' => $maxTempo,
            'maxTimeSignature' => $maxTimeSignature,
            'maxValence' => $maxValence,
            'minAcousticness' => $minAcousticness,
            'minDanceability' => $minDanceability,
            'minDurationMs' => $minDurationMs,
            'minEnergy' => $minEnergy,
            'minInstrumentalness' => $minInstrumentalness,
            'minKey' => $minKey,
            'minLiveness' => $minLiveness,
            'minLoudness' => $minLoudness,
            'minMode' => $minMode,
            'minPopularity' => $minPopularity,
            'minSpeechiness' => $minSpeechiness,
            'minTempo' => $minTempo,
            'minTimeSignature' => $minTimeSignature,
            'minValence' => $minValence,
            'seedArtists' => $seedArtists,
            'seedGenres' => $seedGenres,
            'seedTracks' => $seedTracks,
            'targetAcousticness' => $targetAcousticness,
            'targetDanceability' => $targetDanceability,
            'targetDurationMs' => $targetDurationMs,
            'targetEnergy' => $targetEnergy,
            'targetInstrumentalness' => $targetInstrumentalness,
            'targetKey' => $targetKey,
            'targetLiveness' => $targetLiveness,
            'targetLoudness' => $targetLoudness,
            'targetMode' => $targetMode,
            'targetPopularity' => $targetPopularity,
            'targetSpeechiness' => $targetSpeechiness,
            'targetTempo' => $targetTempo,
            'targetTimeSignature' => $targetTimeSignature,
            'targetValence' => $targetValence,
        ];

        return $this->getRaw($params, $requestOptions);
    }

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecommendationGetResponse {
        [$parsed, $options] = RecommendationGetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'recommendations',
            query: $parsed,
            options: $options,
            convert: RecommendationGetResponse::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'recommendations/available-genre-seeds',
            options: $requestOptions,
            convert: RecommendationListAvailableGenreSeedsResponse::class,
        );
    }
}
