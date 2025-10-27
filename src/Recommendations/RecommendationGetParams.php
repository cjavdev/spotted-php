<?php

declare(strict_types=1);

namespace Spotted\Recommendations;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Recommendations are generated based on the available information for a given seed entity and matched against similar artists and tracks. If there is sufficient information about the provided seeds, a list of tracks will be returned together with pool size details.
 *
 * For artists and tracks that are very new or obscure there might not be enough data to generate a list of tracks.
 *
 * @deprecated
 * @see Spotted\Recommendations->get
 *
 * @phpstan-type recommendation_get_params = array{
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
 * }
 */
final class RecommendationGetParams implements BaseModel
{
    /** @use SdkModel<recommendation_get_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The target size of the list of recommended tracks. For seeds with unusually small pools or when highly restrictive filtering is applied, it may be impossible to generate the requested number of recommended tracks. Debugging information for such cases is available in the response. Default: 20\. Minimum: 1\. Maximum: 100.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     */
    #[Api(optional: true)]
    public ?string $market;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $maxAcousticness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $maxDanceability;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?int $maxDurationMs;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $maxEnergy;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $maxInstrumentalness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?int $maxKey;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $maxLiveness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $maxLoudness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?int $maxMode;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?int $maxPopularity;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $maxSpeechiness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $maxTempo;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?int $maxTimeSignature;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $maxValence;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $minAcousticness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $minDanceability;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?int $minDurationMs;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $minEnergy;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $minInstrumentalness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?int $minKey;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $minLiveness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $minLoudness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?int $minMode;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?int $minPopularity;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $minSpeechiness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $minTempo;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?int $minTimeSignature;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $minValence;

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for seed artists.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_genres` and `seed_tracks` are not set_.
     */
    #[Api(optional: true)]
    public ?string $seedArtists;

    /**
     * A comma separated list of any genres in the set of [available genre seeds](/documentation/web-api/reference/get-recommendation-genres). Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_tracks` are not set_.
     */
    #[Api(optional: true)]
    public ?string $seedGenres;

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for a seed track.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_genres` are not set_.
     */
    #[Api(optional: true)]
    public ?string $seedTracks;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $targetAcousticness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $targetDanceability;

    /**
     * Target duration of the track (ms).
     */
    #[Api(optional: true)]
    public ?int $targetDurationMs;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $targetEnergy;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $targetInstrumentalness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?int $targetKey;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $targetLiveness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $targetLoudness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?int $targetMode;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?int $targetPopularity;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $targetSpeechiness;

    /**
     * Target tempo (BPM).
     */
    #[Api(optional: true)]
    public ?float $targetTempo;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?int $targetTimeSignature;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $targetValence;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $limit = null,
        ?string $market = null,
        ?float $maxAcousticness = null,
        ?float $maxDanceability = null,
        ?int $maxDurationMs = null,
        ?float $maxEnergy = null,
        ?float $maxInstrumentalness = null,
        ?int $maxKey = null,
        ?float $maxLiveness = null,
        ?float $maxLoudness = null,
        ?int $maxMode = null,
        ?int $maxPopularity = null,
        ?float $maxSpeechiness = null,
        ?float $maxTempo = null,
        ?int $maxTimeSignature = null,
        ?float $maxValence = null,
        ?float $minAcousticness = null,
        ?float $minDanceability = null,
        ?int $minDurationMs = null,
        ?float $minEnergy = null,
        ?float $minInstrumentalness = null,
        ?int $minKey = null,
        ?float $minLiveness = null,
        ?float $minLoudness = null,
        ?int $minMode = null,
        ?int $minPopularity = null,
        ?float $minSpeechiness = null,
        ?float $minTempo = null,
        ?int $minTimeSignature = null,
        ?float $minValence = null,
        ?string $seedArtists = null,
        ?string $seedGenres = null,
        ?string $seedTracks = null,
        ?float $targetAcousticness = null,
        ?float $targetDanceability = null,
        ?int $targetDurationMs = null,
        ?float $targetEnergy = null,
        ?float $targetInstrumentalness = null,
        ?int $targetKey = null,
        ?float $targetLiveness = null,
        ?float $targetLoudness = null,
        ?int $targetMode = null,
        ?int $targetPopularity = null,
        ?float $targetSpeechiness = null,
        ?float $targetTempo = null,
        ?int $targetTimeSignature = null,
        ?float $targetValence = null,
    ): self {
        $obj = new self;

        null !== $limit && $obj->limit = $limit;
        null !== $market && $obj->market = $market;
        null !== $maxAcousticness && $obj->maxAcousticness = $maxAcousticness;
        null !== $maxDanceability && $obj->maxDanceability = $maxDanceability;
        null !== $maxDurationMs && $obj->maxDurationMs = $maxDurationMs;
        null !== $maxEnergy && $obj->maxEnergy = $maxEnergy;
        null !== $maxInstrumentalness && $obj->maxInstrumentalness = $maxInstrumentalness;
        null !== $maxKey && $obj->maxKey = $maxKey;
        null !== $maxLiveness && $obj->maxLiveness = $maxLiveness;
        null !== $maxLoudness && $obj->maxLoudness = $maxLoudness;
        null !== $maxMode && $obj->maxMode = $maxMode;
        null !== $maxPopularity && $obj->maxPopularity = $maxPopularity;
        null !== $maxSpeechiness && $obj->maxSpeechiness = $maxSpeechiness;
        null !== $maxTempo && $obj->maxTempo = $maxTempo;
        null !== $maxTimeSignature && $obj->maxTimeSignature = $maxTimeSignature;
        null !== $maxValence && $obj->maxValence = $maxValence;
        null !== $minAcousticness && $obj->minAcousticness = $minAcousticness;
        null !== $minDanceability && $obj->minDanceability = $minDanceability;
        null !== $minDurationMs && $obj->minDurationMs = $minDurationMs;
        null !== $minEnergy && $obj->minEnergy = $minEnergy;
        null !== $minInstrumentalness && $obj->minInstrumentalness = $minInstrumentalness;
        null !== $minKey && $obj->minKey = $minKey;
        null !== $minLiveness && $obj->minLiveness = $minLiveness;
        null !== $minLoudness && $obj->minLoudness = $minLoudness;
        null !== $minMode && $obj->minMode = $minMode;
        null !== $minPopularity && $obj->minPopularity = $minPopularity;
        null !== $minSpeechiness && $obj->minSpeechiness = $minSpeechiness;
        null !== $minTempo && $obj->minTempo = $minTempo;
        null !== $minTimeSignature && $obj->minTimeSignature = $minTimeSignature;
        null !== $minValence && $obj->minValence = $minValence;
        null !== $seedArtists && $obj->seedArtists = $seedArtists;
        null !== $seedGenres && $obj->seedGenres = $seedGenres;
        null !== $seedTracks && $obj->seedTracks = $seedTracks;
        null !== $targetAcousticness && $obj->targetAcousticness = $targetAcousticness;
        null !== $targetDanceability && $obj->targetDanceability = $targetDanceability;
        null !== $targetDurationMs && $obj->targetDurationMs = $targetDurationMs;
        null !== $targetEnergy && $obj->targetEnergy = $targetEnergy;
        null !== $targetInstrumentalness && $obj->targetInstrumentalness = $targetInstrumentalness;
        null !== $targetKey && $obj->targetKey = $targetKey;
        null !== $targetLiveness && $obj->targetLiveness = $targetLiveness;
        null !== $targetLoudness && $obj->targetLoudness = $targetLoudness;
        null !== $targetMode && $obj->targetMode = $targetMode;
        null !== $targetPopularity && $obj->targetPopularity = $targetPopularity;
        null !== $targetSpeechiness && $obj->targetSpeechiness = $targetSpeechiness;
        null !== $targetTempo && $obj->targetTempo = $targetTempo;
        null !== $targetTimeSignature && $obj->targetTimeSignature = $targetTimeSignature;
        null !== $targetValence && $obj->targetValence = $targetValence;

        return $obj;
    }

    /**
     * The target size of the list of recommended tracks. For seeds with unusually small pools or when highly restrictive filtering is applied, it may be impossible to generate the requested number of recommended tracks. Debugging information for such cases is available in the response. Default: 20\. Minimum: 1\. Maximum: 100.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     */
    public function withMarket(string $market): self
    {
        $obj = clone $this;
        $obj->market = $market;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxAcousticness(float $maxAcousticness): self
    {
        $obj = clone $this;
        $obj->maxAcousticness = $maxAcousticness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxDanceability(float $maxDanceability): self
    {
        $obj = clone $this;
        $obj->maxDanceability = $maxDanceability;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxDurationMs(int $maxDurationMs): self
    {
        $obj = clone $this;
        $obj->maxDurationMs = $maxDurationMs;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxEnergy(float $maxEnergy): self
    {
        $obj = clone $this;
        $obj->maxEnergy = $maxEnergy;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxInstrumentalness(float $maxInstrumentalness): self
    {
        $obj = clone $this;
        $obj->maxInstrumentalness = $maxInstrumentalness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxKey(int $maxKey): self
    {
        $obj = clone $this;
        $obj->maxKey = $maxKey;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxLiveness(float $maxLiveness): self
    {
        $obj = clone $this;
        $obj->maxLiveness = $maxLiveness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxLoudness(float $maxLoudness): self
    {
        $obj = clone $this;
        $obj->maxLoudness = $maxLoudness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxMode(int $maxMode): self
    {
        $obj = clone $this;
        $obj->maxMode = $maxMode;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxPopularity(int $maxPopularity): self
    {
        $obj = clone $this;
        $obj->maxPopularity = $maxPopularity;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxSpeechiness(float $maxSpeechiness): self
    {
        $obj = clone $this;
        $obj->maxSpeechiness = $maxSpeechiness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxTempo(float $maxTempo): self
    {
        $obj = clone $this;
        $obj->maxTempo = $maxTempo;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxTimeSignature(int $maxTimeSignature): self
    {
        $obj = clone $this;
        $obj->maxTimeSignature = $maxTimeSignature;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxValence(float $maxValence): self
    {
        $obj = clone $this;
        $obj->maxValence = $maxValence;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinAcousticness(float $minAcousticness): self
    {
        $obj = clone $this;
        $obj->minAcousticness = $minAcousticness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinDanceability(float $minDanceability): self
    {
        $obj = clone $this;
        $obj->minDanceability = $minDanceability;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinDurationMs(int $minDurationMs): self
    {
        $obj = clone $this;
        $obj->minDurationMs = $minDurationMs;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinEnergy(float $minEnergy): self
    {
        $obj = clone $this;
        $obj->minEnergy = $minEnergy;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinInstrumentalness(float $minInstrumentalness): self
    {
        $obj = clone $this;
        $obj->minInstrumentalness = $minInstrumentalness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinKey(int $minKey): self
    {
        $obj = clone $this;
        $obj->minKey = $minKey;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinLiveness(float $minLiveness): self
    {
        $obj = clone $this;
        $obj->minLiveness = $minLiveness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinLoudness(float $minLoudness): self
    {
        $obj = clone $this;
        $obj->minLoudness = $minLoudness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinMode(int $minMode): self
    {
        $obj = clone $this;
        $obj->minMode = $minMode;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinPopularity(int $minPopularity): self
    {
        $obj = clone $this;
        $obj->minPopularity = $minPopularity;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinSpeechiness(float $minSpeechiness): self
    {
        $obj = clone $this;
        $obj->minSpeechiness = $minSpeechiness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinTempo(float $minTempo): self
    {
        $obj = clone $this;
        $obj->minTempo = $minTempo;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinTimeSignature(int $minTimeSignature): self
    {
        $obj = clone $this;
        $obj->minTimeSignature = $minTimeSignature;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinValence(float $minValence): self
    {
        $obj = clone $this;
        $obj->minValence = $minValence;

        return $obj;
    }

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for seed artists.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_genres` and `seed_tracks` are not set_.
     */
    public function withSeedArtists(string $seedArtists): self
    {
        $obj = clone $this;
        $obj->seedArtists = $seedArtists;

        return $obj;
    }

    /**
     * A comma separated list of any genres in the set of [available genre seeds](/documentation/web-api/reference/get-recommendation-genres). Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_tracks` are not set_.
     */
    public function withSeedGenres(string $seedGenres): self
    {
        $obj = clone $this;
        $obj->seedGenres = $seedGenres;

        return $obj;
    }

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for a seed track.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_genres` are not set_.
     */
    public function withSeedTracks(string $seedTracks): self
    {
        $obj = clone $this;
        $obj->seedTracks = $seedTracks;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetAcousticness(float $targetAcousticness): self
    {
        $obj = clone $this;
        $obj->targetAcousticness = $targetAcousticness;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetDanceability(float $targetDanceability): self
    {
        $obj = clone $this;
        $obj->targetDanceability = $targetDanceability;

        return $obj;
    }

    /**
     * Target duration of the track (ms).
     */
    public function withTargetDurationMs(int $targetDurationMs): self
    {
        $obj = clone $this;
        $obj->targetDurationMs = $targetDurationMs;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetEnergy(float $targetEnergy): self
    {
        $obj = clone $this;
        $obj->targetEnergy = $targetEnergy;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetInstrumentalness(
        float $targetInstrumentalness
    ): self {
        $obj = clone $this;
        $obj->targetInstrumentalness = $targetInstrumentalness;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetKey(int $targetKey): self
    {
        $obj = clone $this;
        $obj->targetKey = $targetKey;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetLiveness(float $targetLiveness): self
    {
        $obj = clone $this;
        $obj->targetLiveness = $targetLiveness;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetLoudness(float $targetLoudness): self
    {
        $obj = clone $this;
        $obj->targetLoudness = $targetLoudness;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetMode(int $targetMode): self
    {
        $obj = clone $this;
        $obj->targetMode = $targetMode;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetPopularity(int $targetPopularity): self
    {
        $obj = clone $this;
        $obj->targetPopularity = $targetPopularity;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetSpeechiness(float $targetSpeechiness): self
    {
        $obj = clone $this;
        $obj->targetSpeechiness = $targetSpeechiness;

        return $obj;
    }

    /**
     * Target tempo (BPM).
     */
    public function withTargetTempo(float $targetTempo): self
    {
        $obj = clone $this;
        $obj->targetTempo = $targetTempo;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetTimeSignature(int $targetTimeSignature): self
    {
        $obj = clone $this;
        $obj->targetTimeSignature = $targetTimeSignature;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetValence(float $targetValence): self
    {
        $obj = clone $this;
        $obj->targetValence = $targetValence;

        return $obj;
    }
}
