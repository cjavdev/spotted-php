<?php

declare(strict_types=1);

namespace Spotted\AudioAnalysis;

use Spotted\AudioAnalysis\AudioAnalysisGetResponse\Meta;
use Spotted\AudioAnalysis\AudioAnalysisGetResponse\Section;
use Spotted\AudioAnalysis\AudioAnalysisGetResponse\Segment;
use Spotted\AudioAnalysis\AudioAnalysisGetResponse\Track;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type AudioAnalysisGetResponseShape = array{
 *   bars?: list<TimeIntervalObject>|null,
 *   beats?: list<TimeIntervalObject>|null,
 *   meta?: Meta|null,
 *   sections?: list<Section>|null,
 *   segments?: list<Segment>|null,
 *   tatums?: list<TimeIntervalObject>|null,
 *   track?: Track|null,
 * }
 */
final class AudioAnalysisGetResponse implements BaseModel
{
    /** @use SdkModel<AudioAnalysisGetResponseShape> */
    use SdkModel;

    /**
     * The time intervals of the bars throughout the track. A bar (or measure) is a segment of time defined as a given number of beats.
     *
     * @var list<TimeIntervalObject>|null $bars
     */
    #[Optional(list: TimeIntervalObject::class)]
    public ?array $bars;

    /**
     * The time intervals of beats throughout the track. A beat is the basic time unit of a piece of music; for example, each tick of a metronome. Beats are typically multiples of tatums.
     *
     * @var list<TimeIntervalObject>|null $beats
     */
    #[Optional(list: TimeIntervalObject::class)]
    public ?array $beats;

    #[Optional]
    public ?Meta $meta;

    /**
     * Sections are defined by large variations in rhythm or timbre, e.g. chorus, verse, bridge, guitar solo, etc. Each section contains its own descriptions of tempo, key, mode, time_signature, and loudness.
     *
     * @var list<Section>|null $sections
     */
    #[Optional(list: Section::class)]
    public ?array $sections;

    /**
     * Each segment contains a roughly conisistent sound throughout its duration.
     *
     * @var list<Segment>|null $segments
     */
    #[Optional(list: Segment::class)]
    public ?array $segments;

    /**
     * A tatum represents the lowest regular pulse train that a listener intuitively infers from the timing of perceived musical events (segments).
     *
     * @var list<TimeIntervalObject>|null $tatums
     */
    #[Optional(list: TimeIntervalObject::class)]
    public ?array $tatums;

    #[Optional]
    public ?Track $track;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<TimeIntervalObject|array{
     *   confidence?: float|null, duration?: float|null, start?: float|null
     * }> $bars
     * @param list<TimeIntervalObject|array{
     *   confidence?: float|null, duration?: float|null, start?: float|null
     * }> $beats
     * @param Meta|array{
     *   analysis_time?: float|null,
     *   analyzer_version?: string|null,
     *   detailed_status?: string|null,
     *   input_process?: string|null,
     *   platform?: string|null,
     *   status_code?: int|null,
     *   timestamp?: int|null,
     * } $meta
     * @param list<Section|array{
     *   confidence?: float|null,
     *   duration?: float|null,
     *   key?: int|null,
     *   key_confidence?: float|null,
     *   loudness?: float|null,
     *   mode?: float|null,
     *   mode_confidence?: float|null,
     *   start?: float|null,
     *   tempo?: float|null,
     *   tempo_confidence?: float|null,
     *   time_signature?: int|null,
     *   time_signature_confidence?: float|null,
     * }> $sections
     * @param list<Segment|array{
     *   confidence?: float|null,
     *   duration?: float|null,
     *   loudness_end?: float|null,
     *   loudness_max?: float|null,
     *   loudness_max_time?: float|null,
     *   loudness_start?: float|null,
     *   pitches?: list<float>|null,
     *   start?: float|null,
     *   timbre?: list<float>|null,
     * }> $segments
     * @param list<TimeIntervalObject|array{
     *   confidence?: float|null, duration?: float|null, start?: float|null
     * }> $tatums
     * @param Track|array{
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
     * } $track
     */
    public static function with(
        ?array $bars = null,
        ?array $beats = null,
        Meta|array|null $meta = null,
        ?array $sections = null,
        ?array $segments = null,
        ?array $tatums = null,
        Track|array|null $track = null,
    ): self {
        $obj = new self;

        null !== $bars && $obj['bars'] = $bars;
        null !== $beats && $obj['beats'] = $beats;
        null !== $meta && $obj['meta'] = $meta;
        null !== $sections && $obj['sections'] = $sections;
        null !== $segments && $obj['segments'] = $segments;
        null !== $tatums && $obj['tatums'] = $tatums;
        null !== $track && $obj['track'] = $track;

        return $obj;
    }

    /**
     * The time intervals of the bars throughout the track. A bar (or measure) is a segment of time defined as a given number of beats.
     *
     * @param list<TimeIntervalObject|array{
     *   confidence?: float|null, duration?: float|null, start?: float|null
     * }> $bars
     */
    public function withBars(array $bars): self
    {
        $obj = clone $this;
        $obj['bars'] = $bars;

        return $obj;
    }

    /**
     * The time intervals of beats throughout the track. A beat is the basic time unit of a piece of music; for example, each tick of a metronome. Beats are typically multiples of tatums.
     *
     * @param list<TimeIntervalObject|array{
     *   confidence?: float|null, duration?: float|null, start?: float|null
     * }> $beats
     */
    public function withBeats(array $beats): self
    {
        $obj = clone $this;
        $obj['beats'] = $beats;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   analysis_time?: float|null,
     *   analyzer_version?: string|null,
     *   detailed_status?: string|null,
     *   input_process?: string|null,
     *   platform?: string|null,
     *   status_code?: int|null,
     *   timestamp?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * Sections are defined by large variations in rhythm or timbre, e.g. chorus, verse, bridge, guitar solo, etc. Each section contains its own descriptions of tempo, key, mode, time_signature, and loudness.
     *
     * @param list<Section|array{
     *   confidence?: float|null,
     *   duration?: float|null,
     *   key?: int|null,
     *   key_confidence?: float|null,
     *   loudness?: float|null,
     *   mode?: float|null,
     *   mode_confidence?: float|null,
     *   start?: float|null,
     *   tempo?: float|null,
     *   tempo_confidence?: float|null,
     *   time_signature?: int|null,
     *   time_signature_confidence?: float|null,
     * }> $sections
     */
    public function withSections(array $sections): self
    {
        $obj = clone $this;
        $obj['sections'] = $sections;

        return $obj;
    }

    /**
     * Each segment contains a roughly conisistent sound throughout its duration.
     *
     * @param list<Segment|array{
     *   confidence?: float|null,
     *   duration?: float|null,
     *   loudness_end?: float|null,
     *   loudness_max?: float|null,
     *   loudness_max_time?: float|null,
     *   loudness_start?: float|null,
     *   pitches?: list<float>|null,
     *   start?: float|null,
     *   timbre?: list<float>|null,
     * }> $segments
     */
    public function withSegments(array $segments): self
    {
        $obj = clone $this;
        $obj['segments'] = $segments;

        return $obj;
    }

    /**
     * A tatum represents the lowest regular pulse train that a listener intuitively infers from the timing of perceived musical events (segments).
     *
     * @param list<TimeIntervalObject|array{
     *   confidence?: float|null, duration?: float|null, start?: float|null
     * }> $tatums
     */
    public function withTatums(array $tatums): self
    {
        $obj = clone $this;
        $obj['tatums'] = $tatums;

        return $obj;
    }

    /**
     * @param Track|array{
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
     * } $track
     */
    public function withTrack(Track|array $track): self
    {
        $obj = clone $this;
        $obj['track'] = $track;

        return $obj;
    }
}
