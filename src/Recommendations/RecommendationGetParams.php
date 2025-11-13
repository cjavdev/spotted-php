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
 * @see Spotted\Services\RecommendationsService::get()
 *
 * @phpstan-type RecommendationGetParamsShape = array{
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
    public ?float $max_acousticness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $max_danceability;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?int $max_duration_ms;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $max_energy;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $max_instrumentalness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?int $max_key;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $max_liveness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $max_loudness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?int $max_mode;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?int $max_popularity;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $max_speechiness;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $max_tempo;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?int $max_time_signature;

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    #[Api(optional: true)]
    public ?float $max_valence;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $min_acousticness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $min_danceability;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?int $min_duration_ms;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $min_energy;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $min_instrumentalness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?int $min_key;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $min_liveness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $min_loudness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?int $min_mode;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?int $min_popularity;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $min_speechiness;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $min_tempo;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?int $min_time_signature;

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    #[Api(optional: true)]
    public ?float $min_valence;

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for seed artists.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_genres` and `seed_tracks` are not set_.
     */
    #[Api(optional: true)]
    public ?string $seed_artists;

    /**
     * A comma separated list of any genres in the set of [available genre seeds](/documentation/web-api/reference/get-recommendation-genres). Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_tracks` are not set_.
     */
    #[Api(optional: true)]
    public ?string $seed_genres;

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for a seed track.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_genres` are not set_.
     */
    #[Api(optional: true)]
    public ?string $seed_tracks;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $target_acousticness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $target_danceability;

    /**
     * Target duration of the track (ms).
     */
    #[Api(optional: true)]
    public ?int $target_duration_ms;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $target_energy;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $target_instrumentalness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?int $target_key;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $target_liveness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $target_loudness;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?int $target_mode;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?int $target_popularity;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $target_speechiness;

    /**
     * Target tempo (BPM).
     */
    #[Api(optional: true)]
    public ?float $target_tempo;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?int $target_time_signature;

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    #[Api(optional: true)]
    public ?float $target_valence;

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
        ?float $max_acousticness = null,
        ?float $max_danceability = null,
        ?int $max_duration_ms = null,
        ?float $max_energy = null,
        ?float $max_instrumentalness = null,
        ?int $max_key = null,
        ?float $max_liveness = null,
        ?float $max_loudness = null,
        ?int $max_mode = null,
        ?int $max_popularity = null,
        ?float $max_speechiness = null,
        ?float $max_tempo = null,
        ?int $max_time_signature = null,
        ?float $max_valence = null,
        ?float $min_acousticness = null,
        ?float $min_danceability = null,
        ?int $min_duration_ms = null,
        ?float $min_energy = null,
        ?float $min_instrumentalness = null,
        ?int $min_key = null,
        ?float $min_liveness = null,
        ?float $min_loudness = null,
        ?int $min_mode = null,
        ?int $min_popularity = null,
        ?float $min_speechiness = null,
        ?float $min_tempo = null,
        ?int $min_time_signature = null,
        ?float $min_valence = null,
        ?string $seed_artists = null,
        ?string $seed_genres = null,
        ?string $seed_tracks = null,
        ?float $target_acousticness = null,
        ?float $target_danceability = null,
        ?int $target_duration_ms = null,
        ?float $target_energy = null,
        ?float $target_instrumentalness = null,
        ?int $target_key = null,
        ?float $target_liveness = null,
        ?float $target_loudness = null,
        ?int $target_mode = null,
        ?int $target_popularity = null,
        ?float $target_speechiness = null,
        ?float $target_tempo = null,
        ?int $target_time_signature = null,
        ?float $target_valence = null,
    ): self {
        $obj = new self;

        null !== $limit && $obj->limit = $limit;
        null !== $market && $obj->market = $market;
        null !== $max_acousticness && $obj->max_acousticness = $max_acousticness;
        null !== $max_danceability && $obj->max_danceability = $max_danceability;
        null !== $max_duration_ms && $obj->max_duration_ms = $max_duration_ms;
        null !== $max_energy && $obj->max_energy = $max_energy;
        null !== $max_instrumentalness && $obj->max_instrumentalness = $max_instrumentalness;
        null !== $max_key && $obj->max_key = $max_key;
        null !== $max_liveness && $obj->max_liveness = $max_liveness;
        null !== $max_loudness && $obj->max_loudness = $max_loudness;
        null !== $max_mode && $obj->max_mode = $max_mode;
        null !== $max_popularity && $obj->max_popularity = $max_popularity;
        null !== $max_speechiness && $obj->max_speechiness = $max_speechiness;
        null !== $max_tempo && $obj->max_tempo = $max_tempo;
        null !== $max_time_signature && $obj->max_time_signature = $max_time_signature;
        null !== $max_valence && $obj->max_valence = $max_valence;
        null !== $min_acousticness && $obj->min_acousticness = $min_acousticness;
        null !== $min_danceability && $obj->min_danceability = $min_danceability;
        null !== $min_duration_ms && $obj->min_duration_ms = $min_duration_ms;
        null !== $min_energy && $obj->min_energy = $min_energy;
        null !== $min_instrumentalness && $obj->min_instrumentalness = $min_instrumentalness;
        null !== $min_key && $obj->min_key = $min_key;
        null !== $min_liveness && $obj->min_liveness = $min_liveness;
        null !== $min_loudness && $obj->min_loudness = $min_loudness;
        null !== $min_mode && $obj->min_mode = $min_mode;
        null !== $min_popularity && $obj->min_popularity = $min_popularity;
        null !== $min_speechiness && $obj->min_speechiness = $min_speechiness;
        null !== $min_tempo && $obj->min_tempo = $min_tempo;
        null !== $min_time_signature && $obj->min_time_signature = $min_time_signature;
        null !== $min_valence && $obj->min_valence = $min_valence;
        null !== $seed_artists && $obj->seed_artists = $seed_artists;
        null !== $seed_genres && $obj->seed_genres = $seed_genres;
        null !== $seed_tracks && $obj->seed_tracks = $seed_tracks;
        null !== $target_acousticness && $obj->target_acousticness = $target_acousticness;
        null !== $target_danceability && $obj->target_danceability = $target_danceability;
        null !== $target_duration_ms && $obj->target_duration_ms = $target_duration_ms;
        null !== $target_energy && $obj->target_energy = $target_energy;
        null !== $target_instrumentalness && $obj->target_instrumentalness = $target_instrumentalness;
        null !== $target_key && $obj->target_key = $target_key;
        null !== $target_liveness && $obj->target_liveness = $target_liveness;
        null !== $target_loudness && $obj->target_loudness = $target_loudness;
        null !== $target_mode && $obj->target_mode = $target_mode;
        null !== $target_popularity && $obj->target_popularity = $target_popularity;
        null !== $target_speechiness && $obj->target_speechiness = $target_speechiness;
        null !== $target_tempo && $obj->target_tempo = $target_tempo;
        null !== $target_time_signature && $obj->target_time_signature = $target_time_signature;
        null !== $target_valence && $obj->target_valence = $target_valence;

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
        $obj->max_acousticness = $maxAcousticness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxDanceability(float $maxDanceability): self
    {
        $obj = clone $this;
        $obj->max_danceability = $maxDanceability;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxDurationMs(int $maxDurationMs): self
    {
        $obj = clone $this;
        $obj->max_duration_ms = $maxDurationMs;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxEnergy(float $maxEnergy): self
    {
        $obj = clone $this;
        $obj->max_energy = $maxEnergy;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxInstrumentalness(float $maxInstrumentalness): self
    {
        $obj = clone $this;
        $obj->max_instrumentalness = $maxInstrumentalness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxKey(int $maxKey): self
    {
        $obj = clone $this;
        $obj->max_key = $maxKey;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxLiveness(float $maxLiveness): self
    {
        $obj = clone $this;
        $obj->max_liveness = $maxLiveness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxLoudness(float $maxLoudness): self
    {
        $obj = clone $this;
        $obj->max_loudness = $maxLoudness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxMode(int $maxMode): self
    {
        $obj = clone $this;
        $obj->max_mode = $maxMode;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxPopularity(int $maxPopularity): self
    {
        $obj = clone $this;
        $obj->max_popularity = $maxPopularity;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxSpeechiness(float $maxSpeechiness): self
    {
        $obj = clone $this;
        $obj->max_speechiness = $maxSpeechiness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxTempo(float $maxTempo): self
    {
        $obj = clone $this;
        $obj->max_tempo = $maxTempo;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxTimeSignature(int $maxTimeSignature): self
    {
        $obj = clone $this;
        $obj->max_time_signature = $maxTimeSignature;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard ceiling on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `max_instrumentalness=0.35` would filter out most tracks that are likely to be instrumental.
     */
    public function withMaxValence(float $maxValence): self
    {
        $obj = clone $this;
        $obj->max_valence = $maxValence;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinAcousticness(float $minAcousticness): self
    {
        $obj = clone $this;
        $obj->min_acousticness = $minAcousticness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinDanceability(float $minDanceability): self
    {
        $obj = clone $this;
        $obj->min_danceability = $minDanceability;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinDurationMs(int $minDurationMs): self
    {
        $obj = clone $this;
        $obj->min_duration_ms = $minDurationMs;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinEnergy(float $minEnergy): self
    {
        $obj = clone $this;
        $obj->min_energy = $minEnergy;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinInstrumentalness(float $minInstrumentalness): self
    {
        $obj = clone $this;
        $obj->min_instrumentalness = $minInstrumentalness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinKey(int $minKey): self
    {
        $obj = clone $this;
        $obj->min_key = $minKey;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinLiveness(float $minLiveness): self
    {
        $obj = clone $this;
        $obj->min_liveness = $minLiveness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinLoudness(float $minLoudness): self
    {
        $obj = clone $this;
        $obj->min_loudness = $minLoudness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinMode(int $minMode): self
    {
        $obj = clone $this;
        $obj->min_mode = $minMode;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinPopularity(int $minPopularity): self
    {
        $obj = clone $this;
        $obj->min_popularity = $minPopularity;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinSpeechiness(float $minSpeechiness): self
    {
        $obj = clone $this;
        $obj->min_speechiness = $minSpeechiness;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinTempo(float $minTempo): self
    {
        $obj = clone $this;
        $obj->min_tempo = $minTempo;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinTimeSignature(int $minTimeSignature): self
    {
        $obj = clone $this;
        $obj->min_time_signature = $minTimeSignature;

        return $obj;
    }

    /**
     * For each tunable track attribute, a hard floor on the selected track attribute’s value can be provided. See tunable track attributes below for the list of available options. For example, `min_tempo=140` would restrict results to only those tracks with a tempo of greater than 140 beats per minute.
     */
    public function withMinValence(float $minValence): self
    {
        $obj = clone $this;
        $obj->min_valence = $minValence;

        return $obj;
    }

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for seed artists.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_genres` and `seed_tracks` are not set_.
     */
    public function withSeedArtists(string $seedArtists): self
    {
        $obj = clone $this;
        $obj->seed_artists = $seedArtists;

        return $obj;
    }

    /**
     * A comma separated list of any genres in the set of [available genre seeds](/documentation/web-api/reference/get-recommendation-genres). Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_tracks` are not set_.
     */
    public function withSeedGenres(string $seedGenres): self
    {
        $obj = clone $this;
        $obj->seed_genres = $seedGenres;

        return $obj;
    }

    /**
     * A comma separated list of [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for a seed track.  Up to 5 seed values may be provided in any combination of `seed_artists`, `seed_tracks` and `seed_genres`.<br/> _**Note**: only required if `seed_artists` and `seed_genres` are not set_.
     */
    public function withSeedTracks(string $seedTracks): self
    {
        $obj = clone $this;
        $obj->seed_tracks = $seedTracks;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetAcousticness(float $targetAcousticness): self
    {
        $obj = clone $this;
        $obj->target_acousticness = $targetAcousticness;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetDanceability(float $targetDanceability): self
    {
        $obj = clone $this;
        $obj->target_danceability = $targetDanceability;

        return $obj;
    }

    /**
     * Target duration of the track (ms).
     */
    public function withTargetDurationMs(int $targetDurationMs): self
    {
        $obj = clone $this;
        $obj->target_duration_ms = $targetDurationMs;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetEnergy(float $targetEnergy): self
    {
        $obj = clone $this;
        $obj->target_energy = $targetEnergy;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetInstrumentalness(
        float $targetInstrumentalness
    ): self {
        $obj = clone $this;
        $obj->target_instrumentalness = $targetInstrumentalness;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetKey(int $targetKey): self
    {
        $obj = clone $this;
        $obj->target_key = $targetKey;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetLiveness(float $targetLiveness): self
    {
        $obj = clone $this;
        $obj->target_liveness = $targetLiveness;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetLoudness(float $targetLoudness): self
    {
        $obj = clone $this;
        $obj->target_loudness = $targetLoudness;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetMode(int $targetMode): self
    {
        $obj = clone $this;
        $obj->target_mode = $targetMode;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetPopularity(int $targetPopularity): self
    {
        $obj = clone $this;
        $obj->target_popularity = $targetPopularity;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetSpeechiness(float $targetSpeechiness): self
    {
        $obj = clone $this;
        $obj->target_speechiness = $targetSpeechiness;

        return $obj;
    }

    /**
     * Target tempo (BPM).
     */
    public function withTargetTempo(float $targetTempo): self
    {
        $obj = clone $this;
        $obj->target_tempo = $targetTempo;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetTimeSignature(int $targetTimeSignature): self
    {
        $obj = clone $this;
        $obj->target_time_signature = $targetTimeSignature;

        return $obj;
    }

    /**
     * For each of the tunable track attributes (below) a target value may be provided. Tracks with the attribute values nearest to the target values will be preferred. For example, you might request `target_energy=0.6` and `target_danceability=0.8`. All target values will be weighed equally in ranking results.
     */
    public function withTargetValence(float $targetValence): self
    {
        $obj = clone $this;
        $obj->target_valence = $targetValence;

        return $obj;
    }
}
