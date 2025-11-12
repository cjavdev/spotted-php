<?php

declare(strict_types=1);

namespace Spotted\AudioAnalysis\AudioAnalysisGetResponse;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type SegmentShape = array{
 *   confidence?: float|null,
 *   duration?: float|null,
 *   loudness_end?: float|null,
 *   loudness_max?: float|null,
 *   loudness_max_time?: float|null,
 *   loudness_start?: float|null,
 *   pitches?: list<float>|null,
 *   start?: float|null,
 *   timbre?: list<float>|null,
 * }
 */
final class Segment implements BaseModel
{
    /** @use SdkModel<SegmentShape> */
    use SdkModel;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the segmentation. Segments of the song which are difficult to logically segment (e.g: noise) may correspond to low values in this field.
     */
    #[Api(optional: true)]
    public ?float $confidence;

    /**
     * The duration (in seconds) of the segment.
     */
    #[Api(optional: true)]
    public ?float $duration;

    /**
     * The offset loudness of the segment in decibels (dB). This value should be equivalent to the loudness_start of the following segment.
     */
    #[Api(optional: true)]
    public ?float $loudness_end;

    /**
     * The peak loudness of the segment in decibels (dB). Combined with `loudness_start` and `loudness_max_time`, these components can be used to describe the "attack" of the segment.
     */
    #[Api(optional: true)]
    public ?float $loudness_max;

    /**
     * The segment-relative offset of the segment peak loudness in seconds. Combined with `loudness_start` and `loudness_max`, these components can be used to desctibe the "attack" of the segment.
     */
    #[Api(optional: true)]
    public ?float $loudness_max_time;

    /**
     * The onset loudness of the segment in decibels (dB). Combined with `loudness_max` and `loudness_max_time`, these components can be used to describe the "attack" of the segment.
     */
    #[Api(optional: true)]
    public ?float $loudness_start;

    /**
     * Pitch content is given by a “chroma” vector, corresponding to the 12 pitch classes C, C#, D to B, with values ranging from 0 to 1 that describe the relative dominance of every pitch in the chromatic scale. For example a C Major chord would likely be represented by large values of C, E and G (i.e. classes 0, 4, and 7).
     *
     * Vectors are normalized to 1 by their strongest dimension, therefore noisy sounds are likely represented by values that are all close to 1, while pure tones are described by one value at 1 (the pitch) and others near 0.
     * As can be seen below, the 12 vector indices are a combination of low-power spectrum values at their respective pitch frequencies.
     * ![pitch vector](/assets/audio/Pitch_vector.png)
     *
     * @var list<float>|null $pitches
     */
    #[Api(list: 'float', optional: true)]
    public ?array $pitches;

    /**
     * The starting point (in seconds) of the segment.
     */
    #[Api(optional: true)]
    public ?float $start;

    /**
     * Timbre is the quality of a musical note or sound that distinguishes different types of musical instruments, or voices. It is a complex notion also referred to as sound color, texture, or tone quality, and is derived from the shape of a segment’s spectro-temporal surface, independently of pitch and loudness. The timbre feature is a vector that includes 12 unbounded values roughly centered around 0. Those values are high level abstractions of the spectral surface, ordered by degree of importance.
     *
     * For completeness however, the first dimension represents the average loudness of the segment; second emphasizes brightness; third is more closely correlated to the flatness of a sound; fourth to sounds with a stronger attack; etc. See an image below representing the 12 basis functions (i.e. template segments).
     * ![timbre basis functions](/assets/audio/Timbre_basis_functions.png)
     *
     * The actual timbre of the segment is best described as a linear combination of these 12 basis functions weighted by the coefficient values: timbre = c1 x b1 + c2 x b2 + ... + c12 x b12, where c1 to c12 represent the 12 coefficients and b1 to b12 the 12 basis functions as displayed below. Timbre vectors are best used in comparison with each other.
     *
     * @var list<float>|null $timbre
     */
    #[Api(list: 'float', optional: true)]
    public ?array $timbre;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<float> $pitches
     * @param list<float> $timbre
     */
    public static function with(
        ?float $confidence = null,
        ?float $duration = null,
        ?float $loudness_end = null,
        ?float $loudness_max = null,
        ?float $loudness_max_time = null,
        ?float $loudness_start = null,
        ?array $pitches = null,
        ?float $start = null,
        ?array $timbre = null,
    ): self {
        $obj = new self;

        null !== $confidence && $obj->confidence = $confidence;
        null !== $duration && $obj->duration = $duration;
        null !== $loudness_end && $obj->loudness_end = $loudness_end;
        null !== $loudness_max && $obj->loudness_max = $loudness_max;
        null !== $loudness_max_time && $obj->loudness_max_time = $loudness_max_time;
        null !== $loudness_start && $obj->loudness_start = $loudness_start;
        null !== $pitches && $obj->pitches = $pitches;
        null !== $start && $obj->start = $start;
        null !== $timbre && $obj->timbre = $timbre;

        return $obj;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the segmentation. Segments of the song which are difficult to logically segment (e.g: noise) may correspond to low values in this field.
     */
    public function withConfidence(float $confidence): self
    {
        $obj = clone $this;
        $obj->confidence = $confidence;

        return $obj;
    }

    /**
     * The duration (in seconds) of the segment.
     */
    public function withDuration(float $duration): self
    {
        $obj = clone $this;
        $obj->duration = $duration;

        return $obj;
    }

    /**
     * The offset loudness of the segment in decibels (dB). This value should be equivalent to the loudness_start of the following segment.
     */
    public function withLoudnessEnd(float $loudnessEnd): self
    {
        $obj = clone $this;
        $obj->loudness_end = $loudnessEnd;

        return $obj;
    }

    /**
     * The peak loudness of the segment in decibels (dB). Combined with `loudness_start` and `loudness_max_time`, these components can be used to describe the "attack" of the segment.
     */
    public function withLoudnessMax(float $loudnessMax): self
    {
        $obj = clone $this;
        $obj->loudness_max = $loudnessMax;

        return $obj;
    }

    /**
     * The segment-relative offset of the segment peak loudness in seconds. Combined with `loudness_start` and `loudness_max`, these components can be used to desctibe the "attack" of the segment.
     */
    public function withLoudnessMaxTime(float $loudnessMaxTime): self
    {
        $obj = clone $this;
        $obj->loudness_max_time = $loudnessMaxTime;

        return $obj;
    }

    /**
     * The onset loudness of the segment in decibels (dB). Combined with `loudness_max` and `loudness_max_time`, these components can be used to describe the "attack" of the segment.
     */
    public function withLoudnessStart(float $loudnessStart): self
    {
        $obj = clone $this;
        $obj->loudness_start = $loudnessStart;

        return $obj;
    }

    /**
     * Pitch content is given by a “chroma” vector, corresponding to the 12 pitch classes C, C#, D to B, with values ranging from 0 to 1 that describe the relative dominance of every pitch in the chromatic scale. For example a C Major chord would likely be represented by large values of C, E and G (i.e. classes 0, 4, and 7).
     *
     * Vectors are normalized to 1 by their strongest dimension, therefore noisy sounds are likely represented by values that are all close to 1, while pure tones are described by one value at 1 (the pitch) and others near 0.
     * As can be seen below, the 12 vector indices are a combination of low-power spectrum values at their respective pitch frequencies.
     * ![pitch vector](/assets/audio/Pitch_vector.png)
     *
     * @param list<float> $pitches
     */
    public function withPitches(array $pitches): self
    {
        $obj = clone $this;
        $obj->pitches = $pitches;

        return $obj;
    }

    /**
     * The starting point (in seconds) of the segment.
     */
    public function withStart(float $start): self
    {
        $obj = clone $this;
        $obj->start = $start;

        return $obj;
    }

    /**
     * Timbre is the quality of a musical note or sound that distinguishes different types of musical instruments, or voices. It is a complex notion also referred to as sound color, texture, or tone quality, and is derived from the shape of a segment’s spectro-temporal surface, independently of pitch and loudness. The timbre feature is a vector that includes 12 unbounded values roughly centered around 0. Those values are high level abstractions of the spectral surface, ordered by degree of importance.
     *
     * For completeness however, the first dimension represents the average loudness of the segment; second emphasizes brightness; third is more closely correlated to the flatness of a sound; fourth to sounds with a stronger attack; etc. See an image below representing the 12 basis functions (i.e. template segments).
     * ![timbre basis functions](/assets/audio/Timbre_basis_functions.png)
     *
     * The actual timbre of the segment is best described as a linear combination of these 12 basis functions weighted by the coefficient values: timbre = c1 x b1 + c2 x b2 + ... + c12 x b12, where c1 to c12 represent the 12 coefficients and b1 to b12 the 12 basis functions as displayed below. Timbre vectors are best used in comparison with each other.
     *
     * @param list<float> $timbre
     */
    public function withTimbre(array $timbre): self
    {
        $obj = clone $this;
        $obj->timbre = $timbre;

        return $obj;
    }
}
