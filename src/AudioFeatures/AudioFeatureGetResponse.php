<?php

declare(strict_types=1);

namespace Spotted\AudioFeatures;

use Spotted\AudioFeatures\AudioFeatureGetResponse\Type;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type audio_feature_get_response = array{
 *   id?: string,
 *   acousticness?: float,
 *   analysisURL?: string,
 *   danceability?: float,
 *   durationMs?: int,
 *   energy?: float,
 *   instrumentalness?: float,
 *   key?: int,
 *   liveness?: float,
 *   loudness?: float,
 *   mode?: int,
 *   speechiness?: float,
 *   tempo?: float,
 *   timeSignature?: int,
 *   trackHref?: string,
 *   type?: value-of<Type>,
 *   uri?: string,
 *   valence?: float,
 * }
 */
final class AudioFeatureGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<audio_feature_get_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * The Spotify ID for the track.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * A confidence measure from 0.0 to 1.0 of whether the track is acoustic. 1.0 represents high confidence the track is acoustic.
     */
    #[Api(optional: true)]
    public ?float $acousticness;

    /**
     * A URL to access the full audio analysis of this track. An access token is required to access this data.
     */
    #[Api('analysis_url', optional: true)]
    public ?string $analysisURL;

    /**
     * Danceability describes how suitable a track is for dancing based on a combination of musical elements including tempo, rhythm stability, beat strength, and overall regularity. A value of 0.0 is least danceable and 1.0 is most danceable.
     */
    #[Api(optional: true)]
    public ?float $danceability;

    /**
     * The duration of the track in milliseconds.
     */
    #[Api('duration_ms', optional: true)]
    public ?int $durationMs;

    /**
     * Energy is a measure from 0.0 to 1.0 and represents a perceptual measure of intensity and activity. Typically, energetic tracks feel fast, loud, and noisy. For example, death metal has high energy, while a Bach prelude scores low on the scale. Perceptual features contributing to this attribute include dynamic range, perceived loudness, timbre, onset rate, and general entropy.
     */
    #[Api(optional: true)]
    public ?float $energy;

    /**
     * Predicts whether a track contains no vocals. "Ooh" and "aah" sounds are treated as instrumental in this context. Rap or spoken word tracks are clearly "vocal". The closer the instrumentalness value is to 1.0, the greater likelihood the track contains no vocal content. Values above 0.5 are intended to represent instrumental tracks, but confidence is higher as the value approaches 1.0.
     */
    #[Api(optional: true)]
    public ?float $instrumentalness;

    /**
     * The key the track is in. Integers map to pitches using standard [Pitch Class notation](https://en.wikipedia.org/wiki/Pitch_class). E.g. 0 = C, 1 = C♯/D♭, 2 = D, and so on. If no key was detected, the value is -1.
     */
    #[Api(optional: true)]
    public ?int $key;

    /**
     * Detects the presence of an audience in the recording. Higher liveness values represent an increased probability that the track was performed live. A value above 0.8 provides strong likelihood that the track is live.
     */
    #[Api(optional: true)]
    public ?float $liveness;

    /**
     * The overall loudness of a track in decibels (dB). Loudness values are averaged across the entire track and are useful for comparing relative loudness of tracks. Loudness is the quality of a sound that is the primary psychological correlate of physical strength (amplitude). Values typically range between -60 and 0 db.
     */
    #[Api(optional: true)]
    public ?float $loudness;

    /**
     * Mode indicates the modality (major or minor) of a track, the type of scale from which its melodic content is derived. Major is represented by 1 and minor is 0.
     */
    #[Api(optional: true)]
    public ?int $mode;

    /**
     * Speechiness detects the presence of spoken words in a track. The more exclusively speech-like the recording (e.g. talk show, audio book, poetry), the closer to 1.0 the attribute value. Values above 0.66 describe tracks that are probably made entirely of spoken words. Values between 0.33 and 0.66 describe tracks that may contain both music and speech, either in sections or layered, including such cases as rap music. Values below 0.33 most likely represent music and other non-speech-like tracks.
     */
    #[Api(optional: true)]
    public ?float $speechiness;

    /**
     * The overall estimated tempo of a track in beats per minute (BPM). In musical terminology, tempo is the speed or pace of a given piece and derives directly from the average beat duration.
     */
    #[Api(optional: true)]
    public ?float $tempo;

    /**
     * An estimated time signature. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure). The time signature ranges from 3 to 7 indicating time signatures of "3/4", to "7/4".
     */
    #[Api('time_signature', optional: true)]
    public ?int $timeSignature;

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    #[Api('track_href', optional: true)]
    public ?string $trackHref;

    /**
     * The object type.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * The Spotify URI for the track.
     */
    #[Api(optional: true)]
    public ?string $uri;

    /**
     * A measure from 0.0 to 1.0 describing the musical positiveness conveyed by a track. Tracks with high valence sound more positive (e.g. happy, cheerful, euphoric), while tracks with low valence sound more negative (e.g. sad, depressed, angry).
     */
    #[Api(optional: true)]
    public ?float $valence;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?float $acousticness = null,
        ?string $analysisURL = null,
        ?float $danceability = null,
        ?int $durationMs = null,
        ?float $energy = null,
        ?float $instrumentalness = null,
        ?int $key = null,
        ?float $liveness = null,
        ?float $loudness = null,
        ?int $mode = null,
        ?float $speechiness = null,
        ?float $tempo = null,
        ?int $timeSignature = null,
        ?string $trackHref = null,
        Type|string|null $type = null,
        ?string $uri = null,
        ?float $valence = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $acousticness && $obj->acousticness = $acousticness;
        null !== $analysisURL && $obj->analysisURL = $analysisURL;
        null !== $danceability && $obj->danceability = $danceability;
        null !== $durationMs && $obj->durationMs = $durationMs;
        null !== $energy && $obj->energy = $energy;
        null !== $instrumentalness && $obj->instrumentalness = $instrumentalness;
        null !== $key && $obj->key = $key;
        null !== $liveness && $obj->liveness = $liveness;
        null !== $loudness && $obj->loudness = $loudness;
        null !== $mode && $obj->mode = $mode;
        null !== $speechiness && $obj->speechiness = $speechiness;
        null !== $tempo && $obj->tempo = $tempo;
        null !== $timeSignature && $obj->timeSignature = $timeSignature;
        null !== $trackHref && $obj->trackHref = $trackHref;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj->uri = $uri;
        null !== $valence && $obj->valence = $valence;

        return $obj;
    }

    /**
     * The Spotify ID for the track.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * A confidence measure from 0.0 to 1.0 of whether the track is acoustic. 1.0 represents high confidence the track is acoustic.
     */
    public function withAcousticness(float $acousticness): self
    {
        $obj = clone $this;
        $obj->acousticness = $acousticness;

        return $obj;
    }

    /**
     * A URL to access the full audio analysis of this track. An access token is required to access this data.
     */
    public function withAnalysisURL(string $analysisURL): self
    {
        $obj = clone $this;
        $obj->analysisURL = $analysisURL;

        return $obj;
    }

    /**
     * Danceability describes how suitable a track is for dancing based on a combination of musical elements including tempo, rhythm stability, beat strength, and overall regularity. A value of 0.0 is least danceable and 1.0 is most danceable.
     */
    public function withDanceability(float $danceability): self
    {
        $obj = clone $this;
        $obj->danceability = $danceability;

        return $obj;
    }

    /**
     * The duration of the track in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $obj = clone $this;
        $obj->durationMs = $durationMs;

        return $obj;
    }

    /**
     * Energy is a measure from 0.0 to 1.0 and represents a perceptual measure of intensity and activity. Typically, energetic tracks feel fast, loud, and noisy. For example, death metal has high energy, while a Bach prelude scores low on the scale. Perceptual features contributing to this attribute include dynamic range, perceived loudness, timbre, onset rate, and general entropy.
     */
    public function withEnergy(float $energy): self
    {
        $obj = clone $this;
        $obj->energy = $energy;

        return $obj;
    }

    /**
     * Predicts whether a track contains no vocals. "Ooh" and "aah" sounds are treated as instrumental in this context. Rap or spoken word tracks are clearly "vocal". The closer the instrumentalness value is to 1.0, the greater likelihood the track contains no vocal content. Values above 0.5 are intended to represent instrumental tracks, but confidence is higher as the value approaches 1.0.
     */
    public function withInstrumentalness(float $instrumentalness): self
    {
        $obj = clone $this;
        $obj->instrumentalness = $instrumentalness;

        return $obj;
    }

    /**
     * The key the track is in. Integers map to pitches using standard [Pitch Class notation](https://en.wikipedia.org/wiki/Pitch_class). E.g. 0 = C, 1 = C♯/D♭, 2 = D, and so on. If no key was detected, the value is -1.
     */
    public function withKey(int $key): self
    {
        $obj = clone $this;
        $obj->key = $key;

        return $obj;
    }

    /**
     * Detects the presence of an audience in the recording. Higher liveness values represent an increased probability that the track was performed live. A value above 0.8 provides strong likelihood that the track is live.
     */
    public function withLiveness(float $liveness): self
    {
        $obj = clone $this;
        $obj->liveness = $liveness;

        return $obj;
    }

    /**
     * The overall loudness of a track in decibels (dB). Loudness values are averaged across the entire track and are useful for comparing relative loudness of tracks. Loudness is the quality of a sound that is the primary psychological correlate of physical strength (amplitude). Values typically range between -60 and 0 db.
     */
    public function withLoudness(float $loudness): self
    {
        $obj = clone $this;
        $obj->loudness = $loudness;

        return $obj;
    }

    /**
     * Mode indicates the modality (major or minor) of a track, the type of scale from which its melodic content is derived. Major is represented by 1 and minor is 0.
     */
    public function withMode(int $mode): self
    {
        $obj = clone $this;
        $obj->mode = $mode;

        return $obj;
    }

    /**
     * Speechiness detects the presence of spoken words in a track. The more exclusively speech-like the recording (e.g. talk show, audio book, poetry), the closer to 1.0 the attribute value. Values above 0.66 describe tracks that are probably made entirely of spoken words. Values between 0.33 and 0.66 describe tracks that may contain both music and speech, either in sections or layered, including such cases as rap music. Values below 0.33 most likely represent music and other non-speech-like tracks.
     */
    public function withSpeechiness(float $speechiness): self
    {
        $obj = clone $this;
        $obj->speechiness = $speechiness;

        return $obj;
    }

    /**
     * The overall estimated tempo of a track in beats per minute (BPM). In musical terminology, tempo is the speed or pace of a given piece and derives directly from the average beat duration.
     */
    public function withTempo(float $tempo): self
    {
        $obj = clone $this;
        $obj->tempo = $tempo;

        return $obj;
    }

    /**
     * An estimated time signature. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure). The time signature ranges from 3 to 7 indicating time signatures of "3/4", to "7/4".
     */
    public function withTimeSignature(int $timeSignature): self
    {
        $obj = clone $this;
        $obj->timeSignature = $timeSignature;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    public function withTrackHref(string $trackHref): self
    {
        $obj = clone $this;
        $obj->trackHref = $trackHref;

        return $obj;
    }

    /**
     * The object type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The Spotify URI for the track.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }

    /**
     * A measure from 0.0 to 1.0 describing the musical positiveness conveyed by a track. Tracks with high valence sound more positive (e.g. happy, cheerful, euphoric), while tracks with low valence sound more negative (e.g. sad, depressed, angry).
     */
    public function withValence(float $valence): self
    {
        $obj = clone $this;
        $obj->valence = $valence;

        return $obj;
    }
}
