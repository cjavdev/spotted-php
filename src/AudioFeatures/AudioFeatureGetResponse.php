<?php

declare(strict_types=1);

namespace Spotted\AudioFeatures;

use Spotted\AudioFeatures\AudioFeatureGetResponse\Type;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type AudioFeatureGetResponseShape = array{
 *   id?: string|null,
 *   acousticness?: float|null,
 *   analysisURL?: string|null,
 *   danceability?: float|null,
 *   durationMs?: int|null,
 *   energy?: float|null,
 *   instrumentalness?: float|null,
 *   key?: int|null,
 *   liveness?: float|null,
 *   loudness?: float|null,
 *   mode?: int|null,
 *   published?: bool|null,
 *   speechiness?: float|null,
 *   tempo?: float|null,
 *   timeSignature?: int|null,
 *   trackHref?: string|null,
 *   type?: null|Type|value-of<Type>,
 *   uri?: string|null,
 *   valence?: float|null,
 * }
 */
final class AudioFeatureGetResponse implements BaseModel
{
    /** @use SdkModel<AudioFeatureGetResponseShape> */
    use SdkModel;

    /**
     * The Spotify ID for the track.
     */
    #[Optional]
    public ?string $id;

    /**
     * A confidence measure from 0.0 to 1.0 of whether the track is acoustic. 1.0 represents high confidence the track is acoustic.
     */
    #[Optional]
    public ?float $acousticness;

    /**
     * A URL to access the full audio analysis of this track. An access token is required to access this data.
     */
    #[Optional('analysis_url')]
    public ?string $analysisURL;

    /**
     * Danceability describes how suitable a track is for dancing based on a combination of musical elements including tempo, rhythm stability, beat strength, and overall regularity. A value of 0.0 is least danceable and 1.0 is most danceable.
     */
    #[Optional]
    public ?float $danceability;

    /**
     * The duration of the track in milliseconds.
     */
    #[Optional('duration_ms')]
    public ?int $durationMs;

    /**
     * Energy is a measure from 0.0 to 1.0 and represents a perceptual measure of intensity and activity. Typically, energetic tracks feel fast, loud, and noisy. For example, death metal has high energy, while a Bach prelude scores low on the scale. Perceptual features contributing to this attribute include dynamic range, perceived loudness, timbre, onset rate, and general entropy.
     */
    #[Optional]
    public ?float $energy;

    /**
     * Predicts whether a track contains no vocals. "Ooh" and "aah" sounds are treated as instrumental in this context. Rap or spoken word tracks are clearly "vocal". The closer the instrumentalness value is to 1.0, the greater likelihood the track contains no vocal content. Values above 0.5 are intended to represent instrumental tracks, but confidence is higher as the value approaches 1.0.
     */
    #[Optional]
    public ?float $instrumentalness;

    /**
     * The key the track is in. Integers map to pitches using standard [Pitch Class notation](https://en.wikipedia.org/wiki/Pitch_class). E.g. 0 = C, 1 = C♯/D♭, 2 = D, and so on. If no key was detected, the value is -1.
     */
    #[Optional]
    public ?int $key;

    /**
     * Detects the presence of an audience in the recording. Higher liveness values represent an increased probability that the track was performed live. A value above 0.8 provides strong likelihood that the track is live.
     */
    #[Optional]
    public ?float $liveness;

    /**
     * The overall loudness of a track in decibels (dB). Loudness values are averaged across the entire track and are useful for comparing relative loudness of tracks. Loudness is the quality of a sound that is the primary psychological correlate of physical strength (amplitude). Values typically range between -60 and 0 db.
     */
    #[Optional]
    public ?float $loudness;

    /**
     * Mode indicates the modality (major or minor) of a track, the type of scale from which its melodic content is derived. Major is represented by 1 and minor is 0.
     */
    #[Optional]
    public ?int $mode;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * Speechiness detects the presence of spoken words in a track. The more exclusively speech-like the recording (e.g. talk show, audio book, poetry), the closer to 1.0 the attribute value. Values above 0.66 describe tracks that are probably made entirely of spoken words. Values between 0.33 and 0.66 describe tracks that may contain both music and speech, either in sections or layered, including such cases as rap music. Values below 0.33 most likely represent music and other non-speech-like tracks.
     */
    #[Optional]
    public ?float $speechiness;

    /**
     * The overall estimated tempo of a track in beats per minute (BPM). In musical terminology, tempo is the speed or pace of a given piece and derives directly from the average beat duration.
     */
    #[Optional]
    public ?float $tempo;

    /**
     * An estimated time signature. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure). The time signature ranges from 3 to 7 indicating time signatures of "3/4", to "7/4".
     */
    #[Optional('time_signature')]
    public ?int $timeSignature;

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    #[Optional('track_href')]
    public ?string $trackHref;

    /**
     * The object type.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * The Spotify URI for the track.
     */
    #[Optional]
    public ?string $uri;

    /**
     * A measure from 0.0 to 1.0 describing the musical positiveness conveyed by a track. Tracks with high valence sound more positive (e.g. happy, cheerful, euphoric), while tracks with low valence sound more negative (e.g. sad, depressed, angry).
     */
    #[Optional]
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
        ?bool $published = null,
        ?float $speechiness = null,
        ?float $tempo = null,
        ?int $timeSignature = null,
        ?string $trackHref = null,
        Type|string|null $type = null,
        ?string $uri = null,
        ?float $valence = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $acousticness && $self['acousticness'] = $acousticness;
        null !== $analysisURL && $self['analysisURL'] = $analysisURL;
        null !== $danceability && $self['danceability'] = $danceability;
        null !== $durationMs && $self['durationMs'] = $durationMs;
        null !== $energy && $self['energy'] = $energy;
        null !== $instrumentalness && $self['instrumentalness'] = $instrumentalness;
        null !== $key && $self['key'] = $key;
        null !== $liveness && $self['liveness'] = $liveness;
        null !== $loudness && $self['loudness'] = $loudness;
        null !== $mode && $self['mode'] = $mode;
        null !== $published && $self['published'] = $published;
        null !== $speechiness && $self['speechiness'] = $speechiness;
        null !== $tempo && $self['tempo'] = $tempo;
        null !== $timeSignature && $self['timeSignature'] = $timeSignature;
        null !== $trackHref && $self['trackHref'] = $trackHref;
        null !== $type && $self['type'] = $type;
        null !== $uri && $self['uri'] = $uri;
        null !== $valence && $self['valence'] = $valence;

        return $self;
    }

    /**
     * The Spotify ID for the track.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A confidence measure from 0.0 to 1.0 of whether the track is acoustic. 1.0 represents high confidence the track is acoustic.
     */
    public function withAcousticness(float $acousticness): self
    {
        $self = clone $this;
        $self['acousticness'] = $acousticness;

        return $self;
    }

    /**
     * A URL to access the full audio analysis of this track. An access token is required to access this data.
     */
    public function withAnalysisURL(string $analysisURL): self
    {
        $self = clone $this;
        $self['analysisURL'] = $analysisURL;

        return $self;
    }

    /**
     * Danceability describes how suitable a track is for dancing based on a combination of musical elements including tempo, rhythm stability, beat strength, and overall regularity. A value of 0.0 is least danceable and 1.0 is most danceable.
     */
    public function withDanceability(float $danceability): self
    {
        $self = clone $this;
        $self['danceability'] = $danceability;

        return $self;
    }

    /**
     * The duration of the track in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $self = clone $this;
        $self['durationMs'] = $durationMs;

        return $self;
    }

    /**
     * Energy is a measure from 0.0 to 1.0 and represents a perceptual measure of intensity and activity. Typically, energetic tracks feel fast, loud, and noisy. For example, death metal has high energy, while a Bach prelude scores low on the scale. Perceptual features contributing to this attribute include dynamic range, perceived loudness, timbre, onset rate, and general entropy.
     */
    public function withEnergy(float $energy): self
    {
        $self = clone $this;
        $self['energy'] = $energy;

        return $self;
    }

    /**
     * Predicts whether a track contains no vocals. "Ooh" and "aah" sounds are treated as instrumental in this context. Rap or spoken word tracks are clearly "vocal". The closer the instrumentalness value is to 1.0, the greater likelihood the track contains no vocal content. Values above 0.5 are intended to represent instrumental tracks, but confidence is higher as the value approaches 1.0.
     */
    public function withInstrumentalness(float $instrumentalness): self
    {
        $self = clone $this;
        $self['instrumentalness'] = $instrumentalness;

        return $self;
    }

    /**
     * The key the track is in. Integers map to pitches using standard [Pitch Class notation](https://en.wikipedia.org/wiki/Pitch_class). E.g. 0 = C, 1 = C♯/D♭, 2 = D, and so on. If no key was detected, the value is -1.
     */
    public function withKey(int $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    /**
     * Detects the presence of an audience in the recording. Higher liveness values represent an increased probability that the track was performed live. A value above 0.8 provides strong likelihood that the track is live.
     */
    public function withLiveness(float $liveness): self
    {
        $self = clone $this;
        $self['liveness'] = $liveness;

        return $self;
    }

    /**
     * The overall loudness of a track in decibels (dB). Loudness values are averaged across the entire track and are useful for comparing relative loudness of tracks. Loudness is the quality of a sound that is the primary psychological correlate of physical strength (amplitude). Values typically range between -60 and 0 db.
     */
    public function withLoudness(float $loudness): self
    {
        $self = clone $this;
        $self['loudness'] = $loudness;

        return $self;
    }

    /**
     * Mode indicates the modality (major or minor) of a track, the type of scale from which its melodic content is derived. Major is represented by 1 and minor is 0.
     */
    public function withMode(int $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }

    /**
     * Speechiness detects the presence of spoken words in a track. The more exclusively speech-like the recording (e.g. talk show, audio book, poetry), the closer to 1.0 the attribute value. Values above 0.66 describe tracks that are probably made entirely of spoken words. Values between 0.33 and 0.66 describe tracks that may contain both music and speech, either in sections or layered, including such cases as rap music. Values below 0.33 most likely represent music and other non-speech-like tracks.
     */
    public function withSpeechiness(float $speechiness): self
    {
        $self = clone $this;
        $self['speechiness'] = $speechiness;

        return $self;
    }

    /**
     * The overall estimated tempo of a track in beats per minute (BPM). In musical terminology, tempo is the speed or pace of a given piece and derives directly from the average beat duration.
     */
    public function withTempo(float $tempo): self
    {
        $self = clone $this;
        $self['tempo'] = $tempo;

        return $self;
    }

    /**
     * An estimated time signature. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure). The time signature ranges from 3 to 7 indicating time signatures of "3/4", to "7/4".
     */
    public function withTimeSignature(int $timeSignature): self
    {
        $self = clone $this;
        $self['timeSignature'] = $timeSignature;

        return $self;
    }

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    public function withTrackHref(string $trackHref): self
    {
        $self = clone $this;
        $self['trackHref'] = $trackHref;

        return $self;
    }

    /**
     * The object type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The Spotify URI for the track.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }

    /**
     * A measure from 0.0 to 1.0 describing the musical positiveness conveyed by a track. Tracks with high valence sound more positive (e.g. happy, cheerful, euphoric), while tracks with low valence sound more negative (e.g. sad, depressed, angry).
     */
    public function withValence(float $valence): self
    {
        $self = clone $this;
        $self['valence'] = $valence;

        return $self;
    }
}
