<?php

declare(strict_types=1);

namespace Spotted\AudioAnalysis\AudioAnalysisGetResponse;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type TrackShape = array{
 *   analysisChannels?: int|null,
 *   analysisSampleRate?: int|null,
 *   codeVersion?: float|null,
 *   codestring?: string|null,
 *   duration?: float|null,
 *   echoprintVersion?: float|null,
 *   echoprintstring?: string|null,
 *   endOfFadeIn?: float|null,
 *   key?: int|null,
 *   keyConfidence?: float|null,
 *   loudness?: float|null,
 *   mode?: int|null,
 *   modeConfidence?: float|null,
 *   numSamples?: int|null,
 *   offsetSeconds?: int|null,
 *   rhythmVersion?: float|null,
 *   rhythmstring?: string|null,
 *   sampleMd5?: string|null,
 *   startOfFadeOut?: float|null,
 *   synchVersion?: float|null,
 *   synchstring?: string|null,
 *   tempo?: float|null,
 *   tempoConfidence?: float|null,
 *   timeSignature?: int|null,
 *   timeSignatureConfidence?: float|null,
 *   windowSeconds?: int|null,
 * }
 */
final class Track implements BaseModel
{
    /** @use SdkModel<TrackShape> */
    use SdkModel;

    /**
     * The number of channels used for analysis. If 1, all channels are summed together to mono before analysis.
     */
    #[Optional('analysis_channels')]
    public ?int $analysisChannels;

    /**
     * The sample rate used to decode and analyze this track. May differ from the actual sample rate of this track available on Spotify.
     */
    #[Optional('analysis_sample_rate')]
    public ?int $analysisSampleRate;

    /**
     * A version number for the Echo Nest Musical Fingerprint format used in the codestring field.
     */
    #[Optional('code_version')]
    public ?float $codeVersion;

    /**
     * An [Echo Nest Musical Fingerprint (ENMFP)](https://academiccommons.columbia.edu/doi/10.7916/D8Q248M4) codestring for this track.
     */
    #[Optional]
    public ?string $codestring;

    /**
     * Length of the track in seconds.
     */
    #[Optional]
    public ?float $duration;

    /**
     * A version number for the EchoPrint format used in the echoprintstring field.
     */
    #[Optional('echoprint_version')]
    public ?float $echoprintVersion;

    /**
     * An [EchoPrint](https://github.com/spotify/echoprint-codegen) codestring for this track.
     */
    #[Optional]
    public ?string $echoprintstring;

    /**
     * The time, in seconds, at which the track's fade-in period ends. If the track has no fade-in, this will be 0.0.
     */
    #[Optional('end_of_fade_in')]
    public ?float $endOfFadeIn;

    /**
     * The key the track is in. Integers map to pitches using standard [Pitch Class notation](https://en.wikipedia.org/wiki/Pitch_class). E.g. 0 = C, 1 = C♯/D♭, 2 = D, and so on. If no key was detected, the value is -1.
     */
    #[Optional]
    public ?int $key;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `key`.
     */
    #[Optional('key_confidence')]
    public ?float $keyConfidence;

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
     * The confidence, from 0.0 to 1.0, of the reliability of the `mode`.
     */
    #[Optional('mode_confidence')]
    public ?float $modeConfidence;

    /**
     * The exact number of audio samples analyzed from this track. See also `analysis_sample_rate`.
     */
    #[Optional('num_samples')]
    public ?int $numSamples;

    /**
     * An offset to the start of the region of the track that was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    #[Optional('offset_seconds')]
    public ?int $offsetSeconds;

    /**
     * A version number for the Rhythmstring used in the rhythmstring field.
     */
    #[Optional('rhythm_version')]
    public ?float $rhythmVersion;

    /**
     * A Rhythmstring for this track. The format of this string is similar to the Synchstring.
     */
    #[Optional]
    public ?string $rhythmstring;

    /**
     * This field will always contain the empty string.
     */
    #[Optional('sample_md5')]
    public ?string $sampleMd5;

    /**
     * The time, in seconds, at which the track's fade-out period starts. If the track has no fade-out, this should match the track's length.
     */
    #[Optional('start_of_fade_out')]
    public ?float $startOfFadeOut;

    /**
     * A version number for the Synchstring used in the synchstring field.
     */
    #[Optional('synch_version')]
    public ?float $synchVersion;

    /**
     * A [Synchstring](https://github.com/echonest/synchdata) for this track.
     */
    #[Optional]
    public ?string $synchstring;

    /**
     * The overall estimated tempo of a track in beats per minute (BPM). In musical terminology, tempo is the speed or pace of a given piece and derives directly from the average beat duration.
     */
    #[Optional]
    public ?float $tempo;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `tempo`.
     */
    #[Optional('tempo_confidence')]
    public ?float $tempoConfidence;

    /**
     * An estimated time signature. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure). The time signature ranges from 3 to 7 indicating time signatures of "3/4", to "7/4".
     */
    #[Optional('time_signature')]
    public ?int $timeSignature;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `time_signature`.
     */
    #[Optional('time_signature_confidence')]
    public ?float $timeSignatureConfidence;

    /**
     * The length of the region of the track was analyzed, if a subset of the track was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    #[Optional('window_seconds')]
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
        $self = new self;

        null !== $analysisChannels && $self['analysisChannels'] = $analysisChannels;
        null !== $analysisSampleRate && $self['analysisSampleRate'] = $analysisSampleRate;
        null !== $codeVersion && $self['codeVersion'] = $codeVersion;
        null !== $codestring && $self['codestring'] = $codestring;
        null !== $duration && $self['duration'] = $duration;
        null !== $echoprintVersion && $self['echoprintVersion'] = $echoprintVersion;
        null !== $echoprintstring && $self['echoprintstring'] = $echoprintstring;
        null !== $endOfFadeIn && $self['endOfFadeIn'] = $endOfFadeIn;
        null !== $key && $self['key'] = $key;
        null !== $keyConfidence && $self['keyConfidence'] = $keyConfidence;
        null !== $loudness && $self['loudness'] = $loudness;
        null !== $mode && $self['mode'] = $mode;
        null !== $modeConfidence && $self['modeConfidence'] = $modeConfidence;
        null !== $numSamples && $self['numSamples'] = $numSamples;
        null !== $offsetSeconds && $self['offsetSeconds'] = $offsetSeconds;
        null !== $rhythmVersion && $self['rhythmVersion'] = $rhythmVersion;
        null !== $rhythmstring && $self['rhythmstring'] = $rhythmstring;
        null !== $sampleMd5 && $self['sampleMd5'] = $sampleMd5;
        null !== $startOfFadeOut && $self['startOfFadeOut'] = $startOfFadeOut;
        null !== $synchVersion && $self['synchVersion'] = $synchVersion;
        null !== $synchstring && $self['synchstring'] = $synchstring;
        null !== $tempo && $self['tempo'] = $tempo;
        null !== $tempoConfidence && $self['tempoConfidence'] = $tempoConfidence;
        null !== $timeSignature && $self['timeSignature'] = $timeSignature;
        null !== $timeSignatureConfidence && $self['timeSignatureConfidence'] = $timeSignatureConfidence;
        null !== $windowSeconds && $self['windowSeconds'] = $windowSeconds;

        return $self;
    }

    /**
     * The number of channels used for analysis. If 1, all channels are summed together to mono before analysis.
     */
    public function withAnalysisChannels(int $analysisChannels): self
    {
        $self = clone $this;
        $self['analysisChannels'] = $analysisChannels;

        return $self;
    }

    /**
     * The sample rate used to decode and analyze this track. May differ from the actual sample rate of this track available on Spotify.
     */
    public function withAnalysisSampleRate(int $analysisSampleRate): self
    {
        $self = clone $this;
        $self['analysisSampleRate'] = $analysisSampleRate;

        return $self;
    }

    /**
     * A version number for the Echo Nest Musical Fingerprint format used in the codestring field.
     */
    public function withCodeVersion(float $codeVersion): self
    {
        $self = clone $this;
        $self['codeVersion'] = $codeVersion;

        return $self;
    }

    /**
     * An [Echo Nest Musical Fingerprint (ENMFP)](https://academiccommons.columbia.edu/doi/10.7916/D8Q248M4) codestring for this track.
     */
    public function withCodestring(string $codestring): self
    {
        $self = clone $this;
        $self['codestring'] = $codestring;

        return $self;
    }

    /**
     * Length of the track in seconds.
     */
    public function withDuration(float $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * A version number for the EchoPrint format used in the echoprintstring field.
     */
    public function withEchoprintVersion(float $echoprintVersion): self
    {
        $self = clone $this;
        $self['echoprintVersion'] = $echoprintVersion;

        return $self;
    }

    /**
     * An [EchoPrint](https://github.com/spotify/echoprint-codegen) codestring for this track.
     */
    public function withEchoprintstring(string $echoprintstring): self
    {
        $self = clone $this;
        $self['echoprintstring'] = $echoprintstring;

        return $self;
    }

    /**
     * The time, in seconds, at which the track's fade-in period ends. If the track has no fade-in, this will be 0.0.
     */
    public function withEndOfFadeIn(float $endOfFadeIn): self
    {
        $self = clone $this;
        $self['endOfFadeIn'] = $endOfFadeIn;

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
     * The confidence, from 0.0 to 1.0, of the reliability of the `key`.
     */
    public function withKeyConfidence(float $keyConfidence): self
    {
        $self = clone $this;
        $self['keyConfidence'] = $keyConfidence;

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
     * The confidence, from 0.0 to 1.0, of the reliability of the `mode`.
     */
    public function withModeConfidence(float $modeConfidence): self
    {
        $self = clone $this;
        $self['modeConfidence'] = $modeConfidence;

        return $self;
    }

    /**
     * The exact number of audio samples analyzed from this track. See also `analysis_sample_rate`.
     */
    public function withNumSamples(int $numSamples): self
    {
        $self = clone $this;
        $self['numSamples'] = $numSamples;

        return $self;
    }

    /**
     * An offset to the start of the region of the track that was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    public function withOffsetSeconds(int $offsetSeconds): self
    {
        $self = clone $this;
        $self['offsetSeconds'] = $offsetSeconds;

        return $self;
    }

    /**
     * A version number for the Rhythmstring used in the rhythmstring field.
     */
    public function withRhythmVersion(float $rhythmVersion): self
    {
        $self = clone $this;
        $self['rhythmVersion'] = $rhythmVersion;

        return $self;
    }

    /**
     * A Rhythmstring for this track. The format of this string is similar to the Synchstring.
     */
    public function withRhythmstring(string $rhythmstring): self
    {
        $self = clone $this;
        $self['rhythmstring'] = $rhythmstring;

        return $self;
    }

    /**
     * This field will always contain the empty string.
     */
    public function withSampleMd5(string $sampleMd5): self
    {
        $self = clone $this;
        $self['sampleMd5'] = $sampleMd5;

        return $self;
    }

    /**
     * The time, in seconds, at which the track's fade-out period starts. If the track has no fade-out, this should match the track's length.
     */
    public function withStartOfFadeOut(float $startOfFadeOut): self
    {
        $self = clone $this;
        $self['startOfFadeOut'] = $startOfFadeOut;

        return $self;
    }

    /**
     * A version number for the Synchstring used in the synchstring field.
     */
    public function withSynchVersion(float $synchVersion): self
    {
        $self = clone $this;
        $self['synchVersion'] = $synchVersion;

        return $self;
    }

    /**
     * A [Synchstring](https://github.com/echonest/synchdata) for this track.
     */
    public function withSynchstring(string $synchstring): self
    {
        $self = clone $this;
        $self['synchstring'] = $synchstring;

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
     * The confidence, from 0.0 to 1.0, of the reliability of the `tempo`.
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
     * The confidence, from 0.0 to 1.0, of the reliability of the `time_signature`.
     */
    public function withTimeSignatureConfidence(
        float $timeSignatureConfidence
    ): self {
        $self = clone $this;
        $self['timeSignatureConfidence'] = $timeSignatureConfidence;

        return $self;
    }

    /**
     * The length of the region of the track was analyzed, if a subset of the track was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    public function withWindowSeconds(int $windowSeconds): self
    {
        $self = clone $this;
        $self['windowSeconds'] = $windowSeconds;

        return $self;
    }
}
