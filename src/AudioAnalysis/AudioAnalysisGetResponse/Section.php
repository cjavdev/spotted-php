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
        ?float $start = null,
        ?float $tempo = null,
        ?float $tempoConfidence = null,
        ?int $timeSignature = null,
        ?float $timeSignatureConfidence = null,
    ): self {
        $obj = new self;

        null !== $confidence && $obj['confidence'] = $confidence;
        null !== $duration && $obj['duration'] = $duration;
        null !== $key && $obj['key'] = $key;
        null !== $keyConfidence && $obj['keyConfidence'] = $keyConfidence;
        null !== $loudness && $obj['loudness'] = $loudness;
        null !== $mode && $obj['mode'] = $mode;
        null !== $modeConfidence && $obj['modeConfidence'] = $modeConfidence;
        null !== $start && $obj['start'] = $start;
        null !== $tempo && $obj['tempo'] = $tempo;
        null !== $tempoConfidence && $obj['tempoConfidence'] = $tempoConfidence;
        null !== $timeSignature && $obj['timeSignature'] = $timeSignature;
        null !== $timeSignatureConfidence && $obj['timeSignatureConfidence'] = $timeSignatureConfidence;

        return $obj;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the section's "designation".
     */
    public function withConfidence(float $confidence): self
    {
        $obj = clone $this;
        $obj['confidence'] = $confidence;

        return $obj;
    }

    /**
     * The duration (in seconds) of the section.
     */
    public function withDuration(float $duration): self
    {
        $obj = clone $this;
        $obj['duration'] = $duration;

        return $obj;
    }

    /**
     * The estimated overall key of the section. The values in this field ranging from 0 to 11 mapping to pitches using standard Pitch Class notation (E.g. 0 = C, 1 = C♯/D♭, 2 = D, and so on). If no key was detected, the value is -1.
     */
    public function withKey(int $key): self
    {
        $obj = clone $this;
        $obj['key'] = $key;

        return $obj;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the key. Songs with many key changes may correspond to low values in this field.
     */
    public function withKeyConfidence(float $keyConfidence): self
    {
        $obj = clone $this;
        $obj['keyConfidence'] = $keyConfidence;

        return $obj;
    }

    /**
     * The overall loudness of the section in decibels (dB). Loudness values are useful for comparing relative loudness of sections within tracks.
     */
    public function withLoudness(float $loudness): self
    {
        $obj = clone $this;
        $obj['loudness'] = $loudness;

        return $obj;
    }

    /**
     * Indicates the modality (major or minor) of a section, the type of scale from which its melodic content is derived. This field will contain a 0 for "minor", a 1 for "major", or a -1 for no result. Note that the major key (e.g. C major) could more likely be confused with the minor key at 3 semitones lower (e.g. A minor) as both keys carry the same pitches.
     */
    public function withMode(float $mode): self
    {
        $obj = clone $this;
        $obj['mode'] = $mode;

        return $obj;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `mode`.
     */
    public function withModeConfidence(float $modeConfidence): self
    {
        $obj = clone $this;
        $obj['modeConfidence'] = $modeConfidence;

        return $obj;
    }

    /**
     * The starting point (in seconds) of the section.
     */
    public function withStart(float $start): self
    {
        $obj = clone $this;
        $obj['start'] = $start;

        return $obj;
    }

    /**
     * The overall estimated tempo of the section in beats per minute (BPM). In musical terminology, tempo is the speed or pace of a given piece and derives directly from the average beat duration.
     */
    public function withTempo(float $tempo): self
    {
        $obj = clone $this;
        $obj['tempo'] = $tempo;

        return $obj;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the tempo. Some tracks contain tempo changes or sounds which don't contain tempo (like pure speech) which would correspond to a low value in this field.
     */
    public function withTempoConfidence(float $tempoConfidence): self
    {
        $obj = clone $this;
        $obj['tempoConfidence'] = $tempoConfidence;

        return $obj;
    }

    /**
     * An estimated time signature. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure). The time signature ranges from 3 to 7 indicating time signatures of "3/4", to "7/4".
     */
    public function withTimeSignature(int $timeSignature): self
    {
        $obj = clone $this;
        $obj['timeSignature'] = $timeSignature;

        return $obj;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `time_signature`. Sections with time signature changes may correspond to low values in this field.
     */
    public function withTimeSignatureConfidence(
        float $timeSignatureConfidence
    ): self {
        $obj = clone $this;
        $obj['timeSignatureConfidence'] = $timeSignatureConfidence;

        return $obj;
    }
}
