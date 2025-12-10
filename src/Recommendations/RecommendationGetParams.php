<?php

declare(strict_types=1);

namespace Spotted\Recommendations;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Recommendations are generated based on the available information for a given seed entity and matched against similar artists and tracks. If there is sufficient information about the provided seeds, a list of tracks will be returned together with pool size details.
 *
 * For artists and tracks that are very new or obscure there might not be enough data to generate a list of tracks.
 *
 * @deprecated
 * @see Spotted\Services\RecommendationsService::get()
 *
 * @phpstan-type RecommendationGetParamsShape = array{
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
    /** @use SdkModel<RecommendationGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The target size of the list of recommended tracks. For seeds with unusually small pools or when highly restrictive filtering is applied, it may be impossible to generate the requested number of recommended tracks. Debugging information for such cases is available in the response. Default: 20\. Minimum: 1\. Maximum: 100.
     */
    #[Optional]
    public ?int $limit;

    /**
     * An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     */
    #[Optional]
    public ?string $market;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?float $maxAcousticness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?float $maxDanceability;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?int $maxDurationMs;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?float $maxEnergy;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?float $maxInstrumentalness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?int $maxKey;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?float $maxLiveness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?float $maxLoudness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?int $maxMode;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?int $maxPopularity;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?float $maxSpeechiness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?float $maxTempo;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?int $maxTimeSignature;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Optional]
    public ?float $maxValence;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?float $minAcousticness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?float $minDanceability;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?int $minDurationMs;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?float $minEnergy;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?float $minInstrumentalness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?int $minKey;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?float $minLiveness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?float $minLoudness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?int $minMode;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?int $minPopularity;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?float $minSpeechiness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?float $minTempo;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?int $minTimeSignature;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Optional]
    public ?float $minValence;

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for seed artists.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_genres` and `seed_tracks` are not set_.
     */
    #[Optional]
    public ?string $seedArtists;

    /**
     * A comma separated list of any genres in the set of [available genre seeds](/documentation/web-api/reference/get-recommendation-genres). Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_tracks` are not set_.
     */
    #[Optional]
    public ?string $seedGenres;

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for a seed track.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_genres` are not set_.
     */
    #[Optional]
    public ?string $seedTracks;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
    public ?float $targetAcousticness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
    public ?float $targetDanceability;

    /**
     * Target duration of the track (ms).
     */
    #[Optional]
    public ?int $targetDurationMs;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
    public ?float $targetEnergy;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
    public ?float $targetInstrumentalness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
    public ?int $targetKey;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
    public ?float $targetLiveness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
    public ?float $targetLoudness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
    public ?int $targetMode;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
    public ?int $targetPopularity;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
    public ?float $targetSpeechiness;

    /**
     * Target tempo (BPM).
     */
    #[Optional]
    public ?float $targetTempo;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
    public ?int $targetTimeSignature;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Optional]
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
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $market && $self['market'] = $market;
        null !== $maxAcousticness && $self['maxAcousticness'] = $maxAcousticness;
        null !== $maxDanceability && $self['maxDanceability'] = $maxDanceability;
        null !== $maxDurationMs && $self['maxDurationMs'] = $maxDurationMs;
        null !== $maxEnergy && $self['maxEnergy'] = $maxEnergy;
        null !== $maxInstrumentalness && $self['maxInstrumentalness'] = $maxInstrumentalness;
        null !== $maxKey && $self['maxKey'] = $maxKey;
        null !== $maxLiveness && $self['maxLiveness'] = $maxLiveness;
        null !== $maxLoudness && $self['maxLoudness'] = $maxLoudness;
        null !== $maxMode && $self['maxMode'] = $maxMode;
        null !== $maxPopularity && $self['maxPopularity'] = $maxPopularity;
        null !== $maxSpeechiness && $self['maxSpeechiness'] = $maxSpeechiness;
        null !== $maxTempo && $self['maxTempo'] = $maxTempo;
        null !== $maxTimeSignature && $self['maxTimeSignature'] = $maxTimeSignature;
        null !== $maxValence && $self['maxValence'] = $maxValence;
        null !== $minAcousticness && $self['minAcousticness'] = $minAcousticness;
        null !== $minDanceability && $self['minDanceability'] = $minDanceability;
        null !== $minDurationMs && $self['minDurationMs'] = $minDurationMs;
        null !== $minEnergy && $self['minEnergy'] = $minEnergy;
        null !== $minInstrumentalness && $self['minInstrumentalness'] = $minInstrumentalness;
        null !== $minKey && $self['minKey'] = $minKey;
        null !== $minLiveness && $self['minLiveness'] = $minLiveness;
        null !== $minLoudness && $self['minLoudness'] = $minLoudness;
        null !== $minMode && $self['minMode'] = $minMode;
        null !== $minPopularity && $self['minPopularity'] = $minPopularity;
        null !== $minSpeechiness && $self['minSpeechiness'] = $minSpeechiness;
        null !== $minTempo && $self['minTempo'] = $minTempo;
        null !== $minTimeSignature && $self['minTimeSignature'] = $minTimeSignature;
        null !== $minValence && $self['minValence'] = $minValence;
        null !== $seedArtists && $self['seedArtists'] = $seedArtists;
        null !== $seedGenres && $self['seedGenres'] = $seedGenres;
        null !== $seedTracks && $self['seedTracks'] = $seedTracks;
        null !== $targetAcousticness && $self['targetAcousticness'] = $targetAcousticness;
        null !== $targetDanceability && $self['targetDanceability'] = $targetDanceability;
        null !== $targetDurationMs && $self['targetDurationMs'] = $targetDurationMs;
        null !== $targetEnergy && $self['targetEnergy'] = $targetEnergy;
        null !== $targetInstrumentalness && $self['targetInstrumentalness'] = $targetInstrumentalness;
        null !== $targetKey && $self['targetKey'] = $targetKey;
        null !== $targetLiveness && $self['targetLiveness'] = $targetLiveness;
        null !== $targetLoudness && $self['targetLoudness'] = $targetLoudness;
        null !== $targetMode && $self['targetMode'] = $targetMode;
        null !== $targetPopularity && $self['targetPopularity'] = $targetPopularity;
        null !== $targetSpeechiness && $self['targetSpeechiness'] = $targetSpeechiness;
        null !== $targetTempo && $self['targetTempo'] = $targetTempo;
        null !== $targetTimeSignature && $self['targetTimeSignature'] = $targetTimeSignature;
        null !== $targetValence && $self['targetValence'] = $targetValence;

        return $self;
    }

    /**
     * The target size of the list of recommended tracks. For seeds with unusually small pools or when highly restrictive filtering is applied, it may be impossible to generate the requested number of recommended tracks. Debugging information for such cases is available in the response. Default: 20\. Minimum: 1\. Maximum: 100.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
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
        $self = clone $this;
        $self['market'] = $market;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxAcousticness(float $maxAcousticness): self
    {
        $self = clone $this;
        $self['maxAcousticness'] = $maxAcousticness;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxDanceability(float $maxDanceability): self
    {
        $self = clone $this;
        $self['maxDanceability'] = $maxDanceability;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxDurationMs(int $maxDurationMs): self
    {
        $self = clone $this;
        $self['maxDurationMs'] = $maxDurationMs;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxEnergy(float $maxEnergy): self
    {
        $self = clone $this;
        $self['maxEnergy'] = $maxEnergy;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxInstrumentalness(float $maxInstrumentalness): self
    {
        $self = clone $this;
        $self['maxInstrumentalness'] = $maxInstrumentalness;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxKey(int $maxKey): self
    {
        $self = clone $this;
        $self['maxKey'] = $maxKey;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxLiveness(float $maxLiveness): self
    {
        $self = clone $this;
        $self['maxLiveness'] = $maxLiveness;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxLoudness(float $maxLoudness): self
    {
        $self = clone $this;
        $self['maxLoudness'] = $maxLoudness;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxMode(int $maxMode): self
    {
        $self = clone $this;
        $self['maxMode'] = $maxMode;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxPopularity(int $maxPopularity): self
    {
        $self = clone $this;
        $self['maxPopularity'] = $maxPopularity;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxSpeechiness(float $maxSpeechiness): self
    {
        $self = clone $this;
        $self['maxSpeechiness'] = $maxSpeechiness;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxTempo(float $maxTempo): self
    {
        $self = clone $this;
        $self['maxTempo'] = $maxTempo;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxTimeSignature(int $maxTimeSignature): self
    {
        $self = clone $this;
        $self['maxTimeSignature'] = $maxTimeSignature;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxValence(float $maxValence): self
    {
        $self = clone $this;
        $self['maxValence'] = $maxValence;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinAcousticness(float $minAcousticness): self
    {
        $self = clone $this;
        $self['minAcousticness'] = $minAcousticness;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinDanceability(float $minDanceability): self
    {
        $self = clone $this;
        $self['minDanceability'] = $minDanceability;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinDurationMs(int $minDurationMs): self
    {
        $self = clone $this;
        $self['minDurationMs'] = $minDurationMs;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinEnergy(float $minEnergy): self
    {
        $self = clone $this;
        $self['minEnergy'] = $minEnergy;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinInstrumentalness(float $minInstrumentalness): self
    {
        $self = clone $this;
        $self['minInstrumentalness'] = $minInstrumentalness;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinKey(int $minKey): self
    {
        $self = clone $this;
        $self['minKey'] = $minKey;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinLiveness(float $minLiveness): self
    {
        $self = clone $this;
        $self['minLiveness'] = $minLiveness;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinLoudness(float $minLoudness): self
    {
        $self = clone $this;
        $self['minLoudness'] = $minLoudness;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinMode(int $minMode): self
    {
        $self = clone $this;
        $self['minMode'] = $minMode;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinPopularity(int $minPopularity): self
    {
        $self = clone $this;
        $self['minPopularity'] = $minPopularity;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinSpeechiness(float $minSpeechiness): self
    {
        $self = clone $this;
        $self['minSpeechiness'] = $minSpeechiness;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinTempo(float $minTempo): self
    {
        $self = clone $this;
        $self['minTempo'] = $minTempo;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinTimeSignature(int $minTimeSignature): self
    {
        $self = clone $this;
        $self['minTimeSignature'] = $minTimeSignature;

        return $self;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinValence(float $minValence): self
    {
        $self = clone $this;
        $self['minValence'] = $minValence;

        return $self;
    }

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for seed artists.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_genres` and `seed_tracks` are not set_.
     */
    public function withSeedArtists(string $seedArtists): self
    {
        $self = clone $this;
        $self['seedArtists'] = $seedArtists;

        return $self;
    }

    /**
     * A comma separated list of any genres in the set of [available genre seeds](/documentation/web-api/reference/get-recommendation-genres). Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_tracks` are not set_.
     */
    public function withSeedGenres(string $seedGenres): self
    {
        $self = clone $this;
        $self['seedGenres'] = $seedGenres;

        return $self;
    }

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for a seed track.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_genres` are not set_.
     */
    public function withSeedTracks(string $seedTracks): self
    {
        $self = clone $this;
        $self['seedTracks'] = $seedTracks;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetAcousticness(float $targetAcousticness): self
    {
        $self = clone $this;
        $self['targetAcousticness'] = $targetAcousticness;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetDanceability(float $targetDanceability): self
    {
        $self = clone $this;
        $self['targetDanceability'] = $targetDanceability;

        return $self;
    }

    /**
     * Target duration of the track (ms).
     */
    public function withTargetDurationMs(int $targetDurationMs): self
    {
        $self = clone $this;
        $self['targetDurationMs'] = $targetDurationMs;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetEnergy(float $targetEnergy): self
    {
        $self = clone $this;
        $self['targetEnergy'] = $targetEnergy;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetInstrumentalness(
        float $targetInstrumentalness
    ): self {
        $self = clone $this;
        $self['targetInstrumentalness'] = $targetInstrumentalness;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetKey(int $targetKey): self
    {
        $self = clone $this;
        $self['targetKey'] = $targetKey;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetLiveness(float $targetLiveness): self
    {
        $self = clone $this;
        $self['targetLiveness'] = $targetLiveness;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetLoudness(float $targetLoudness): self
    {
        $self = clone $this;
        $self['targetLoudness'] = $targetLoudness;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetMode(int $targetMode): self
    {
        $self = clone $this;
        $self['targetMode'] = $targetMode;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetPopularity(int $targetPopularity): self
    {
        $self = clone $this;
        $self['targetPopularity'] = $targetPopularity;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetSpeechiness(float $targetSpeechiness): self
    {
        $self = clone $this;
        $self['targetSpeechiness'] = $targetSpeechiness;

        return $self;
    }

    /**
     * Target tempo (BPM).
     */
    public function withTargetTempo(float $targetTempo): self
    {
        $self = clone $this;
        $self['targetTempo'] = $targetTempo;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetTimeSignature(int $targetTimeSignature): self
    {
        $self = clone $this;
        $self['targetTimeSignature'] = $targetTimeSignature;

        return $self;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetValence(float $targetValence): self
    {
        $self = clone $this;
        $self['targetValence'] = $targetValence;

        return $self;
    }
}
