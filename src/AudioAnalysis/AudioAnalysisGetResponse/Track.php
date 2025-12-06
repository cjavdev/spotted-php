<?php

declare(strict_types=1);

namespace Spotted\AudioAnalysis\AudioAnalysisGetResponse;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type TrackShape = array{
 *   analysis_channels?: int|null,
 *   analysis_sample_rate?: int|null,
 *   code_version?: float|null,
 *   codestring?: string|null,
 *   duration?: float|null,
 *   echoprint_version?: float|null,
 *   echoprintstring?: string|null,
 *   end_of_fade_in?: float|null,
 *   key?: int|null,
 *   key_confidence?: float|null,
 *   loudness?: float|null,
 *   mode?: int|null,
 *   mode_confidence?: float|null,
 *   num_samples?: int|null,
 *   offset_seconds?: int|null,
 *   rhythm_version?: float|null,
 *   rhythmstring?: string|null,
 *   sample_md5?: string|null,
 *   start_of_fade_out?: float|null,
 *   synch_version?: float|null,
 *   synchstring?: string|null,
 *   tempo?: float|null,
 *   tempo_confidence?: float|null,
 *   time_signature?: int|null,
 *   time_signature_confidence?: float|null,
 *   window_seconds?: int|null,
 * }
 */
final class Track implements BaseModel
{
    /** @use SdkModel<TrackShape> */
    use SdkModel;

    /**
     * The number of channels used for analysis. If 1, all channels are summed together to mono before analysis.
     */
    #[Api(optional: true)]
    public ?int $analysis_channels;

    /**
     * The sample rate used to decode and analyze this track. May differ from the actual sample rate of this track available on Spotify.
     */
    #[Api(optional: true)]
    public ?int $analysis_sample_rate;

    /**
     * A version number for the Echo Nest Musical Fingerprint format used in the codestring field.
     */
    #[Api(optional: true)]
    public ?float $code_version;

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
    #[Api(optional: true)]
    public ?float $echoprint_version;

    /**
     * An [EchoPrint](https://github.com/spotify/echoprint-codegen) codestring for this track.
     */
    #[Api(optional: true)]
    public ?string $echoprintstring;

    /**
     * The time, in seconds, at which the track's fade-in period ends. If the track has no fade-in, this will be 0.0.
     */
    #[Api(optional: true)]
    public ?float $end_of_fade_in;

    /**
     * The key the track is in. Integers map to pitches using standard [Pitch Class notation](https://en.wikipedia.org/wiki/Pitch_class). E.g. 0 = C, 1 = C♯/D♭, 2 = D, and so on. If no key was detected, the value is -1.
     */
    #[Api(optional: true)]
    public ?int $key;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `key`.
     */
    #[Api(optional: true)]
    public ?float $key_confidence;

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
    #[Api(optional: true)]
    public ?float $mode_confidence;

    /**
     * The exact number of audio samples analyzed from this track. See also `analysis_sample_rate`.
     */
    #[Api(optional: true)]
    public ?int $num_samples;

    /**
     * An offset to the start of the region of the track that was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    #[Api(optional: true)]
    public ?int $offset_seconds;

    /**
     * A version number for the Rhythmstring used in the rhythmstring field.
     */
    #[Api(optional: true)]
    public ?float $rhythm_version;

    /**
     * A Rhythmstring for this track. The format of this string is similar to the Synchstring.
     */
    #[Api(optional: true)]
    public ?string $rhythmstring;

    /**
     * This field will always contain the empty string.
     */
    #[Api(optional: true)]
    public ?string $sample_md5;

    /**
     * The time, in seconds, at which the track's fade-out period starts. If the track has no fade-out, this should match the track's length.
     */
    #[Api(optional: true)]
    public ?float $start_of_fade_out;

    /**
     * A version number for the Synchstring used in the synchstring field.
     */
    #[Api(optional: true)]
    public ?float $synch_version;

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
    #[Api(optional: true)]
    public ?float $tempo_confidence;

    /**
     * An estimated time signature. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure). The time signature ranges from 3 to 7 indicating time signatures of "3/4", to "7/4".
     */
    #[Api(optional: true)]
    public ?int $time_signature;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `time_signature`.
     */
    #[Api(optional: true)]
    public ?float $time_signature_confidence;

    /**
     * The length of the region of the track was analyzed, if a subset of the track was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    #[Api(optional: true)]
    public ?int $window_seconds;

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
        ?int $analysis_channels = null,
        ?int $analysis_sample_rate = null,
        ?float $code_version = null,
        ?string $codestring = null,
        ?float $duration = null,
        ?float $echoprint_version = null,
        ?string $echoprintstring = null,
        ?float $end_of_fade_in = null,
        ?int $key = null,
        ?float $key_confidence = null,
        ?float $loudness = null,
        ?int $mode = null,
        ?float $mode_confidence = null,
        ?int $num_samples = null,
        ?int $offset_seconds = null,
        ?float $rhythm_version = null,
        ?string $rhythmstring = null,
        ?string $sample_md5 = null,
        ?float $start_of_fade_out = null,
        ?float $synch_version = null,
        ?string $synchstring = null,
        ?float $tempo = null,
        ?float $tempo_confidence = null,
        ?int $time_signature = null,
        ?float $time_signature_confidence = null,
        ?int $window_seconds = null,
    ): self {
        $obj = new self;

        null !== $analysis_channels && $obj['analysis_channels'] = $analysis_channels;
        null !== $analysis_sample_rate && $obj['analysis_sample_rate'] = $analysis_sample_rate;
        null !== $code_version && $obj['code_version'] = $code_version;
        null !== $codestring && $obj['codestring'] = $codestring;
        null !== $duration && $obj['duration'] = $duration;
        null !== $echoprint_version && $obj['echoprint_version'] = $echoprint_version;
        null !== $echoprintstring && $obj['echoprintstring'] = $echoprintstring;
        null !== $end_of_fade_in && $obj['end_of_fade_in'] = $end_of_fade_in;
        null !== $key && $obj['key'] = $key;
        null !== $key_confidence && $obj['key_confidence'] = $key_confidence;
        null !== $loudness && $obj['loudness'] = $loudness;
        null !== $mode && $obj['mode'] = $mode;
        null !== $mode_confidence && $obj['mode_confidence'] = $mode_confidence;
        null !== $num_samples && $obj['num_samples'] = $num_samples;
        null !== $offset_seconds && $obj['offset_seconds'] = $offset_seconds;
        null !== $rhythm_version && $obj['rhythm_version'] = $rhythm_version;
        null !== $rhythmstring && $obj['rhythmstring'] = $rhythmstring;
        null !== $sample_md5 && $obj['sample_md5'] = $sample_md5;
        null !== $start_of_fade_out && $obj['start_of_fade_out'] = $start_of_fade_out;
        null !== $synch_version && $obj['synch_version'] = $synch_version;
        null !== $synchstring && $obj['synchstring'] = $synchstring;
        null !== $tempo && $obj['tempo'] = $tempo;
        null !== $tempo_confidence && $obj['tempo_confidence'] = $tempo_confidence;
        null !== $time_signature && $obj['time_signature'] = $time_signature;
        null !== $time_signature_confidence && $obj['time_signature_confidence'] = $time_signature_confidence;
        null !== $window_seconds && $obj['window_seconds'] = $window_seconds;

        return $obj;
    }

    /**
     * The number of channels used for analysis. If 1, all channels are summed together to mono before analysis.
     */
    public function withAnalysisChannels(int $analysisChannels): self
    {
        $obj = clone $this;
        $obj['analysis_channels'] = $analysisChannels;

        return $obj;
    }

    /**
     * The sample rate used to decode and analyze this track. May differ from the actual sample rate of this track available on Spotify.
     */
    public function withAnalysisSampleRate(int $analysisSampleRate): self
    {
        $obj = clone $this;
        $obj['analysis_sample_rate'] = $analysisSampleRate;

        return $obj;
    }

    /**
     * A version number for the Echo Nest Musical Fingerprint format used in the codestring field.
     */
    public function withCodeVersion(float $codeVersion): self
    {
        $obj = clone $this;
        $obj['code_version'] = $codeVersion;

        return $obj;
    }

    /**
     * An [Echo Nest Musical Fingerprint (ENMFP)](https://academiccommons.columbia.edu/doi/10.7916/D8Q248M4) codestring for this track.
     */
    public function withCodestring(string $codestring): self
    {
        $obj = clone $this;
        $obj['codestring'] = $codestring;

        return $obj;
    }

    /**
     * Length of the track in seconds.
     */
    public function withDuration(float $duration): self
    {
        $obj = clone $this;
        $obj['duration'] = $duration;

        return $obj;
    }

    /**
     * A version number for the EchoPrint format used in the echoprintstring field.
     */
    public function withEchoprintVersion(float $echoprintVersion): self
    {
        $obj = clone $this;
        $obj['echoprint_version'] = $echoprintVersion;

        return $obj;
    }

    /**
     * An [EchoPrint](https://github.com/spotify/echoprint-codegen) codestring for this track.
     */
    public function withEchoprintstring(string $echoprintstring): self
    {
        $obj = clone $this;
        $obj['echoprintstring'] = $echoprintstring;

        return $obj;
    }

    /**
     * The time, in seconds, at which the track's fade-in period ends. If the track has no fade-in, this will be 0.0.
     */
    public function withEndOfFadeIn(float $endOfFadeIn): self
    {
        $obj = clone $this;
        $obj['end_of_fade_in'] = $endOfFadeIn;

        return $obj;
    }

    /**
     * The key the track is in. Integers map to pitches using standard [Pitch Class notation](https://en.wikipedia.org/wiki/Pitch_class). E.g. 0 = C, 1 = C♯/D♭, 2 = D, and so on. If no key was detected, the value is -1.
     */
    public function withKey(int $key): self
    {
        $obj = clone $this;
        $obj['key'] = $key;

        return $obj;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `key`.
     */
    public function withKeyConfidence(float $keyConfidence): self
    {
        $obj = clone $this;
        $obj['key_confidence'] = $keyConfidence;

        return $obj;
    }

    /**
     * The overall loudness of a track in decibels (dB). Loudness values are averaged across the entire track and are useful for comparing relative loudness of tracks. Loudness is the quality of a sound that is the primary psychological correlate of physical strength (amplitude). Values typically range between -60 and 0 db.
     */
    public function withLoudness(float $loudness): self
    {
        $obj = clone $this;
        $obj['loudness'] = $loudness;

        return $obj;
    }

    /**
     * Mode indicates the modality (major or minor) of a track, the type of scale from which its melodic content is derived. Major is represented by 1 and minor is 0.
     */
    public function withMode(int $mode): self
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
        $obj['mode_confidence'] = $modeConfidence;

        return $obj;
    }

    /**
     * The exact number of audio samples analyzed from this track. See also `analysis_sample_rate`.
     */
    public function withNumSamples(int $numSamples): self
    {
        $obj = clone $this;
        $obj['num_samples'] = $numSamples;

        return $obj;
    }

    /**
     * An offset to the start of the region of the track that was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    public function withOffsetSeconds(int $offsetSeconds): self
    {
        $obj = clone $this;
        $obj['offset_seconds'] = $offsetSeconds;

        return $obj;
    }

    /**
     * A version number for the Rhythmstring used in the rhythmstring field.
     */
    public function withRhythmVersion(float $rhythmVersion): self
    {
        $obj = clone $this;
        $obj['rhythm_version'] = $rhythmVersion;

        return $obj;
    }

    /**
     * A Rhythmstring for this track. The format of this string is similar to the Synchstring.
     */
    public function withRhythmstring(string $rhythmstring): self
    {
        $obj = clone $this;
        $obj['rhythmstring'] = $rhythmstring;

        return $obj;
    }

    /**
     * This field will always contain the empty string.
     */
    public function withSampleMd5(string $sampleMd5): self
    {
        $obj = clone $this;
        $obj['sample_md5'] = $sampleMd5;

        return $obj;
    }

    /**
     * The time, in seconds, at which the track's fade-out period starts. If the track has no fade-out, this should match the track's length.
     */
    public function withStartOfFadeOut(float $startOfFadeOut): self
    {
        $obj = clone $this;
        $obj['start_of_fade_out'] = $startOfFadeOut;

        return $obj;
    }

    /**
     * A version number for the Synchstring used in the synchstring field.
     */
    public function withSynchVersion(float $synchVersion): self
    {
        $obj = clone $this;
        $obj['synch_version'] = $synchVersion;

        return $obj;
    }

    /**
     * A [Synchstring](https://github.com/echonest/synchdata) for this track.
     */
    public function withSynchstring(string $synchstring): self
    {
        $obj = clone $this;
        $obj['synchstring'] = $synchstring;

        return $obj;
    }

    /**
     * The overall estimated tempo of a track in beats per minute (BPM). In musical terminology, tempo is the speed or pace of a given piece and derives directly from the average beat duration.
     */
    public function withTempo(float $tempo): self
    {
        $obj = clone $this;
        $obj['tempo'] = $tempo;

        return $obj;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `tempo`.
     */
    public function withTempoConfidence(float $tempoConfidence): self
    {
        $obj = clone $this;
        $obj['tempo_confidence'] = $tempoConfidence;

        return $obj;
    }

    /**
     * An estimated time signature. The time signature (meter) is a notational convention to specify how many beats are in each bar (or measure). The time signature ranges from 3 to 7 indicating time signatures of "3/4", to "7/4".
     */
    public function withTimeSignature(int $timeSignature): self
    {
        $obj = clone $this;
        $obj['time_signature'] = $timeSignature;

        return $obj;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the `time_signature`.
     */
    public function withTimeSignatureConfidence(
        float $timeSignatureConfidence
    ): self {
        $obj = clone $this;
        $obj['time_signature_confidence'] = $timeSignatureConfidence;

        return $obj;
    }

    /**
     * The length of the region of the track was analyzed, if a subset of the track was analyzed. (As the entire track is analyzed, this should always be 0.).
     */
    public function withWindowSeconds(int $windowSeconds): self
    {
        $obj = clone $this;
        $obj['window_seconds'] = $windowSeconds;

        return $obj;
    }
}
