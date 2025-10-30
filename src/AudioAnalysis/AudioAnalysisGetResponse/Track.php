<?php

declare(strict_types=1);

namespace Spotted\AudioAnalysis\AudioAnalysisGetResponse;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type TrackShape = array{
 *   analysisChannels?: int,
 *   analysisSampleRate?: int,
 *   codeVersion?: float,
 *   codestring?: string,
 *   duration?: float,
 *   echoprintVersion?: float,
 *   echoprintstring?: string,
 *   endOfFadeIn?: float,
 *   key?: int,
 *   keyConfidence?: float,
 *   loudness?: float,
 *   mode?: int,
 *   modeConfidence?: float,
 *   numSamples?: int,
 *   offsetSeconds?: int,
 *   rhythmVersion?: float,
 *   rhythmstring?: string,
 *   sampleMd5?: string,
 *   startOfFadeOut?: float,
 *   synchVersion?: float,
 *   synchstring?: string,
 *   tempo?: float,
 *   tempoConfidence?: float,
 *   timeSignature?: int,
 *   timeSignatureConfidence?: float,
 *   windowSeconds?: int,
 * }
 */
final class Track implements BaseModel
{
    /** @use SdkModel<TrackShape> */
    use SdkModel;

    /**
     * The number of channels used for analysis. If 1, all channels are summed together to mono before analysis.
     */
    #[Api('analysis_channels', optional: true)]
    public ?int $analysisChannels;

    /**
     * The sample rate used to decode and analyze this track. May differ from the actual sample rate of this track available on Spotify.
     */
    #[Api('analysis_sample_rate', optional: true)]
    public ?int $analysisSampleRate;

    /**
     * A version number for the Echo Nest Musical Fingerprint format used in the codestring field.
     */
    #[Api('code_version', optional: true)]
    public ?float $codeVersion;

    /**
     * An [Echo Nest Musical Fingerprint (ENMFP)](https://academiccommons.columbia.edu/doi/10.7916/D8Q248M4) codestring for this track.
     */
    #[Api(optional: true)]
    public ?string $codestring;

    /**
     * Length of the track in seconds.
     */
    #[Api(optional: true)]
    public ?float $duration;

    /**
     * A version number for the EchoPrint format used in the echoprintstring field.
     */
    #[Api('echoprint_version', optional: true)]
    public ?float $echoprintVersion;

    /**
     * An [EchoPrint](https://github.com/spotify/echoprint-codegen) codestring for this track.
     */
    #[Api(optional: true)]
    public ?string $echoprintstring;

    /**
     * The time, in seconds, at which the track's fade-in period ends. If the track has no fade-in, this will be 0.0.
     */
    #[Api('end_of_fade_in', optional: true)]
    public ?float $endOfFadeIn;

    /**
     * The key the track is in. Integers map to pitches using standard [Pitch Class notation](https://en.wikipedia.org/wiki/Pitch_class). E.g. 0 = C, 1 = C♯/D♭, 2 = D, and so on. If no key was detected, the value is -1.
     */
    #[Api(optional: true)]
    public ?int $key;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `key`.
     */
    #[Api('key_confidence', optional: true)]
    public ?float $keyConfidence;

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
     * The confidence, from 0.0 to 1.0, of the reliability of the `mode`.
     */
    #[Api('mode_confidence', optional: true)]
    public ?float $modeConfidence;

    /**
     * The exact number of audio samples analyzed from this track. See also `analysis_sample_rate`.
     */
    #[Api('num_samples', optional: true)]
    public ?int $numSamples;

    /**
     * An offset to the start of the region of the track that was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    #[Api('offset_seconds', optional: true)]
    public ?int $offsetSeconds;

    /**
     * A version number for the Rhythmstring used in the rhythmstring field.
     */
    #[Api('rhythm_version', optional: true)]
    public ?float $rhythmVersion;

    /**
     * A Rhythmstring for this track. The format of this string is similar to the Synchstring.
     */
    #[Api(optional: true)]
    public ?string $rhythmstring;

    /**
     * This field will always contain the empty string.
     */
    #[Api('sample_md5', optional: true)]
    public ?string $sampleMd5;

    /**
     * The time, in seconds, at which the track's fade-out period starts. If the track has no fade-out, this should match the track's length.
     */
    #[Api('start_of_fade_out', optional: true)]
    public ?float $startOfFadeOut;

    /**
     * A version number for the Synchstring used in the synchstring field.
     */
    #[Api('synch_version', optional: true)]
    public ?float $synchVersion;

    /**
     * A [Synchstring](https://github.com/echonest/synchdata) for this track.
     */
    #[Api(optional: true)]
    public ?string $synchstring;

    /**
     * The overall estimated tempo of a track in beats per minute (BPM). In musical terminology, tempo is the speed or pace of a given piece and derives directly from the average beat duration.
     */
    #[Api(optional: true)]
    public ?float $tempo;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `tempo`.
     */
    #[Api('tempo_confidence', optional: true)]
    public ?float $tempoConfidence;

    /**
     * An estimated time signature. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure). The time signature ranges from 3 to 7 indicating time signatures of "3/4", to "7/4".
     */
    #[Api('time_signature', optional: true)]
    public ?int $timeSignature;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `time_signature`.
     */
    #[Api('time_signature_confidence', optional: true)]
    public ?float $timeSignatureConfidence;

    /**
     * The length of the region of the track was analyzed, if a subset of the track was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    #[Api('window_seconds', optional: true)]
    public ?int $windowSeconds;

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
        ?int $analysisChannels = null,
        ?int $analysisSampleRate = null,
        ?float $codeVersion = null,
        ?string $codestring = null,
        ?float $duration = null,
        ?float $echoprintVersion = null,
        ?string $echoprintstring = null,
        ?float $endOfFadeIn = null,
        ?int $key = null,
        ?float $keyConfidence = null,
        ?float $loudness = null,
        ?int $mode = null,
        ?float $modeConfidence = null,
        ?int $numSamples = null,
        ?int $offsetSeconds = null,
        ?float $rhythmVersion = null,
        ?string $rhythmstring = null,
        ?string $sampleMd5 = null,
        ?float $startOfFadeOut = null,
        ?float $synchVersion = null,
        ?string $synchstring = null,
        ?float $tempo = null,
        ?float $tempoConfidence = null,
        ?int $timeSignature = null,
        ?float $timeSignatureConfidence = null,
        ?int $windowSeconds = null,
    ): self {
        $obj = new self;

        null !== $analysisChannels && $obj->analysisChannels = $analysisChannels;
        null !== $analysisSampleRate && $obj->analysisSampleRate = $analysisSampleRate;
        null !== $codeVersion && $obj->codeVersion = $codeVersion;
        null !== $codestring && $obj->codestring = $codestring;
        null !== $duration && $obj->duration = $duration;
        null !== $echoprintVersion && $obj->echoprintVersion = $echoprintVersion;
        null !== $echoprintstring && $obj->echoprintstring = $echoprintstring;
        null !== $endOfFadeIn && $obj->endOfFadeIn = $endOfFadeIn;
        null !== $key && $obj->key = $key;
        null !== $keyConfidence && $obj->keyConfidence = $keyConfidence;
        null !== $loudness && $obj->loudness = $loudness;
        null !== $mode && $obj->mode = $mode;
        null !== $modeConfidence && $obj->modeConfidence = $modeConfidence;
        null !== $numSamples && $obj->numSamples = $numSamples;
        null !== $offsetSeconds && $obj->offsetSeconds = $offsetSeconds;
        null !== $rhythmVersion && $obj->rhythmVersion = $rhythmVersion;
        null !== $rhythmstring && $obj->rhythmstring = $rhythmstring;
        null !== $sampleMd5 && $obj->sampleMd5 = $sampleMd5;
        null !== $startOfFadeOut && $obj->startOfFadeOut = $startOfFadeOut;
        null !== $synchVersion && $obj->synchVersion = $synchVersion;
        null !== $synchstring && $obj->synchstring = $synchstring;
        null !== $tempo && $obj->tempo = $tempo;
        null !== $tempoConfidence && $obj->tempoConfidence = $tempoConfidence;
        null !== $timeSignature && $obj->timeSignature = $timeSignature;
        null !== $timeSignatureConfidence && $obj->timeSignatureConfidence = $timeSignatureConfidence;
        null !== $windowSeconds && $obj->windowSeconds = $windowSeconds;

        return $obj;
    }

    /**
     * The number of channels used for analysis. If 1, all channels are summed together to mono before analysis.
     */
    public function withAnalysisChannels(int $analysisChannels): self
    {
        $obj = clone $this;
        $obj->analysisChannels = $analysisChannels;

        return $obj;
    }

    /**
     * The sample rate used to decode and analyze this track. May differ from the actual sample rate of this track available on Spotify.
     */
    public function withAnalysisSampleRate(int $analysisSampleRate): self
    {
        $obj = clone $this;
        $obj->analysisSampleRate = $analysisSampleRate;

        return $obj;
    }

    /**
     * A version number for the Echo Nest Musical Fingerprint format used in the codestring field.
     */
    public function withCodeVersion(float $codeVersion): self
    {
        $obj = clone $this;
        $obj->codeVersion = $codeVersion;

        return $obj;
    }

    /**
     * An [Echo Nest Musical Fingerprint (ENMFP)](https://academiccommons.columbia.edu/doi/10.7916/D8Q248M4) codestring for this track.
     */
    public function withCodestring(string $codestring): self
    {
        $obj = clone $this;
        $obj->codestring = $codestring;

        return $obj;
    }

    /**
     * Length of the track in seconds.
     */
    public function withDuration(float $duration): self
    {
        $obj = clone $this;
        $obj->duration = $duration;

        return $obj;
    }

    /**
     * A version number for the EchoPrint format used in the echoprintstring field.
     */
    public function withEchoprintVersion(float $echoprintVersion): self
    {
        $obj = clone $this;
        $obj->echoprintVersion = $echoprintVersion;

        return $obj;
    }

    /**
     * An [EchoPrint](https://github.com/spotify/echoprint-codegen) codestring for this track.
     */
    public function withEchoprintstring(string $echoprintstring): self
    {
        $obj = clone $this;
        $obj->echoprintstring = $echoprintstring;

        return $obj;
    }

    /**
     * The time, in seconds, at which the track's fade-in period ends. If the track has no fade-in, this will be 0.0.
     */
    public function withEndOfFadeIn(float $endOfFadeIn): self
    {
        $obj = clone $this;
        $obj->endOfFadeIn = $endOfFadeIn;

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
     * The confidence, from 0.0 to 1.0, of the reliability of the `key`.
     */
    public function withKeyConfidence(float $keyConfidence): self
    {
        $obj = clone $this;
        $obj->keyConfidence = $keyConfidence;

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
     * The confidence, from 0.0 to 1.0, of the reliability of the `mode`.
     */
    public function withModeConfidence(float $modeConfidence): self
    {
        $obj = clone $this;
        $obj->modeConfidence = $modeConfidence;

        return $obj;
    }

    /**
     * The exact number of audio samples analyzed from this track. See also `analysis_sample_rate`.
     */
    public function withNumSamples(int $numSamples): self
    {
        $obj = clone $this;
        $obj->numSamples = $numSamples;

        return $obj;
    }

    /**
     * An offset to the start of the region of the track that was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    public function withOffsetSeconds(int $offsetSeconds): self
    {
        $obj = clone $this;
        $obj->offsetSeconds = $offsetSeconds;

        return $obj;
    }

    /**
     * A version number for the Rhythmstring used in the rhythmstring field.
     */
    public function withRhythmVersion(float $rhythmVersion): self
    {
        $obj = clone $this;
        $obj->rhythmVersion = $rhythmVersion;

        return $obj;
    }

    /**
     * A Rhythmstring for this track. The format of this string is similar to the Synchstring.
     */
    public function withRhythmstring(string $rhythmstring): self
    {
        $obj = clone $this;
        $obj->rhythmstring = $rhythmstring;

        return $obj;
    }

    /**
     * This field will always contain the empty string.
     */
    public function withSampleMd5(string $sampleMd5): self
    {
        $obj = clone $this;
        $obj->sampleMd5 = $sampleMd5;

        return $obj;
    }

    /**
     * The time, in seconds, at which the track's fade-out period starts. If the track has no fade-out, this should match the track's length.
     */
    public function withStartOfFadeOut(float $startOfFadeOut): self
    {
        $obj = clone $this;
        $obj->startOfFadeOut = $startOfFadeOut;

        return $obj;
    }

    /**
     * A version number for the Synchstring used in the synchstring field.
     */
    public function withSynchVersion(float $synchVersion): self
    {
        $obj = clone $this;
        $obj->synchVersion = $synchVersion;

        return $obj;
    }

    /**
     * A [Synchstring](https://github.com/echonest/synchdata) for this track.
     */
    public function withSynchstring(string $synchstring): self
    {
        $obj = clone $this;
        $obj->synchstring = $synchstring;

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
     * The confidence, from 0.0 to 1.0, of the reliability of the `tempo`.
     */
    public function withTempoConfidence(float $tempoConfidence): self
    {
        $obj = clone $this;
        $obj->tempoConfidence = $tempoConfidence;

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
     * The confidence, from 0.0 to 1.0, of the reliability of the `time_signature`.
     */
    public function withTimeSignatureConfidence(
        float $timeSignatureConfidence
    ): self {
        $obj = clone $this;
        $obj->timeSignatureConfidence = $timeSignatureConfidence;

        return $obj;
    }

    /**
     * The length of the region of the track was analyzed, if a subset of the track was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    public function withWindowSeconds(int $windowSeconds): self
    {
        $obj = clone $this;
        $obj->windowSeconds = $windowSeconds;

        return $obj;
    }
}
