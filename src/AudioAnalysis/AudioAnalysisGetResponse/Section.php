<?php

declare(strict_types=1);

namespace Spotted\AudioAnalysis\AudioAnalysisGetResponse;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type SectionShape = array{
 *   confidence?: float|null,
 *   duration?: float|null,
 *   key?: int|null,
 *   keyConfidence?: float|null,
 *   loudness?: float|null,
 *   mode?: float|null,
 *   modeConfidence?: float|null,
 *   published?: bool|null,
 *   start?: float|null,
 *   tempo?: float|null,
 *   tempoConfidence?: float|null,
 *   timeSignature?: int|null,
 *   timeSignatureConfidence?: float|null,
 * }
 */
final class Section implements BaseModel
{
    /** @use SdkModel<SectionShape> */
    use SdkModel;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the section's "designation".
     */
    #[Optional]
    public ?float $confidence;

    /**
     * The duration (in seconds) of the section.
     */
    #[Optional]
    public ?float $duration;

    /**
     * The estimated overall key of the section. The values in this field ranging from 0 to 11 mapping to pitches using standard Pitch Class notation (E.g. 0 = C, 1 = C♯/D♭, 2 = D, and so on). If no key was detected, the value is -1.
     */
    #[Optional]
    public ?int $key;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the key. Songs with many key changes may correspond to low values in this field.
     */
    #[Optional('key_confidence')]
    public ?float $keyConfidence;

    /**
     * The overall loudness of the section in decibels (dB). Loudness values are useful for comparing relative loudness of sections within tracks.
     */
    #[Optional]
    public ?float $loudness;

    /**
     * Indicates the modality (major or minor) of a section, the type of scale from which its melodic content is derived. This field will contain a 0 for "minor", a 1 for "major", or a -1 for no result. Note that the major key (e.g. C major) could more likely be confused with the minor key at 3 semitones lower (e.g. A minor) as both keys carry the same pitches.
     */
    #[Optional]
    public ?float $mode;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `mode`.
     */
    #[Optional('mode_confidence')]
    public ?float $modeConfidence;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * The starting point (in seconds) of the section.
     */
    #[Optional]
    public ?float $start;

    /**
     * The overall estimated tempo of the section in beats per minute (BPM). In musical terminology, tempo is the speed or pace of a given piece and derives directly from the average beat duration.
     */
    #[Optional]
    public ?float $tempo;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the tempo. Some tracks contain tempo changes or sounds which don't contain tempo (like pure speech) which would correspond to a low value in this field.
     */
    #[Optional('tempo_confidence')]
    public ?float $tempoConfidence;

    /**
     * An estimated time signature. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure). The time signature ranges from 3 to 7 indicating time signatures of "3/4", to "7/4".
     */
    #[Optional('time_signature')]
    public ?int $timeSignature;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `time_signature`. Sections with time signature changes may correspond to low values in this field.
     */
    #[Optional('time_signature_confidence')]
    public ?float $timeSignatureConfidence;

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
        ?float $confidence = null,
        ?float $duration = null,
        ?int $key = null,
        ?float $keyConfidence = null,
        ?float $loudness = null,
        ?float $mode = null,
        ?float $modeConfidence = null,
        ?bool $published = null,
        ?float $start = null,
        ?float $tempo = null,
        ?float $tempoConfidence = null,
        ?int $timeSignature = null,
        ?float $timeSignatureConfidence = null,
    ): self {
        $self = new self;

        null !== $confidence && $self['confidence'] = $confidence;
        null !== $duration && $self['duration'] = $duration;
        null !== $key && $self['key'] = $key;
        null !== $keyConfidence && $self['keyConfidence'] = $keyConfidence;
        null !== $loudness && $self['loudness'] = $loudness;
        null !== $mode && $self['mode'] = $mode;
        null !== $modeConfidence && $self['modeConfidence'] = $modeConfidence;
        null !== $published && $self['published'] = $published;
        null !== $start && $self['start'] = $start;
        null !== $tempo && $self['tempo'] = $tempo;
        null !== $tempoConfidence && $self['tempoConfidence'] = $tempoConfidence;
        null !== $timeSignature && $self['timeSignature'] = $timeSignature;
        null !== $timeSignatureConfidence && $self['timeSignatureConfidence'] = $timeSignatureConfidence;

        return $self;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the section's "designation".
     */
    public function withConfidence(float $confidence): self
    {
        $self = clone $this;
        $self['confidence'] = $confidence;

        return $self;
    }

    /**
     * The duration (in seconds) of the section.
     */
    public function withDuration(float $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * The estimated overall key of the section. The values in this field ranging from 0 to 11 mapping to pitches using standard Pitch Class notation (E.g. 0 = C, 1 = C♯/D♭, 2 = D, and so on). If no key was detected, the value is -1.
     */
    public function withKey(int $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the key. Songs with many key changes may correspond to low values in this field.
     */
    public function withKeyConfidence(float $keyConfidence): self
    {
        $self = clone $this;
        $self['keyConfidence'] = $keyConfidence;

        return $self;
    }

    /**
     * The overall loudness of the section in decibels (dB). Loudness values are useful for comparing relative loudness of sections within tracks.
     */
    public function withLoudness(float $loudness): self
    {
        $self = clone $this;
        $self['loudness'] = $loudness;

        return $self;
    }

    /**
     * Indicates the modality (major or minor) of a section, the type of scale from which its melodic content is derived. This field will contain a 0 for "minor", a 1 for "major", or a -1 for no result. Note that the major key (e.g. C major) could more likely be confused with the minor key at 3 semitones lower (e.g. A minor) as both keys carry the same pitches.
     */
    public function withMode(float $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `mode`.
     */
    public function withModeConfidence(float $modeConfidence): self
    {
        $self = clone $this;
        $self['modeConfidence'] = $modeConfidence;

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
     * The starting point (in seconds) of the section.
     */
    public function withStart(float $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

        return $self;
    }

    /**
     * The overall estimated tempo of the section in beats per minute (BPM). In musical terminology, tempo is the speed or pace of a given piece and derives directly from the average beat duration.
     */
    public function withTempo(float $tempo): self
    {
        $self = clone $this;
        $self['tempo'] = $tempo;

        return $self;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the tempo. Some tracks contain tempo changes or sounds which don't contain tempo (like pure speech) which would correspond to a low value in this field.
     */
    public function withTempoConfidence(float $tempoConfidence): self
    {
        $self = clone $this;
        $self['tempoConfidence'] = $tempoConfidence;

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
     * The confidence, from 0.0 to 1.0, of the reliability of the `time_signature`. Sections with time signature changes may correspond to low values in this field.
     */
    public function withTimeSignatureConfidence(
        float $timeSignatureConfidence
    ): self {
        $self = clone $this;
        $self['timeSignatureConfidence'] = $timeSignatureConfidence;

        return $self;
    }
}
