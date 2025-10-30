<?php

declare(strict_types=1);

namespace Spotted\AudioAnalysis;

use Spotted\AudioAnalysis\AudioAnalysisGetResponse\Meta;
use Spotted\AudioAnalysis\AudioAnalysisGetResponse\Section;
use Spotted\AudioAnalysis\AudioAnalysisGetResponse\Segment;
use Spotted\AudioAnalysis\AudioAnalysisGetResponse\Track;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AudioAnalysisGetResponseShape = array{
 *   bars?: list<TimeIntervalObject>,
 *   beats?: list<TimeIntervalObject>,
 *   meta?: Meta,
 *   sections?: list<Section>,
 *   segments?: list<Segment>,
 *   tatums?: list<TimeIntervalObject>,
 *   track?: Track,
 * }
 */
final class AudioAnalysisGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AudioAnalysisGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The time intervals of the bars throughout the track. A bar (or measure) is a segment of time defined as a given number of beats.
     *
     * @var list<TimeIntervalObject>|null $bars
     */
    #[Api(list: TimeIntervalObject::class, optional: true)]
    public ?array $bars;

    /**
     * The time intervals of beats throughout the track. A beat is the basic time unit of a piece of music; for example, each tick of a metronome. Beats are typically multiples of tatums.
     *
     * @var list<TimeIntervalObject>|null $beats
     */
    #[Api(list: TimeIntervalObject::class, optional: true)]
    public ?array $beats;

    #[Api(optional: true)]
    public ?Meta $meta;

    /**
     * Sections are defined by large variations in rhythm or timbre, e.g. chorus, verse, bridge, guitar solo, etc. Each section contains its own descriptions of tempo, key, mode, time_signature, and loudness.
     *
     * @var list<Section>|null $sections
     */
    #[Api(list: Section::class, optional: true)]
    public ?array $sections;

    /**
     * Each segment contains a roughly conisistent sound throughout its duration.
     *
     * @var list<Segment>|null $segments
     */
    #[Api(list: Segment::class, optional: true)]
    public ?array $segments;

    /**
     * A tatum represents the lowest regular pulse train that a listener intuitively infers from the timing of perceived musical events (segments).
     *
     * @var list<TimeIntervalObject>|null $tatums
     */
    #[Api(list: TimeIntervalObject::class, optional: true)]
    public ?array $tatums;

    #[Api(optional: true)]
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
     * @param list<TimeIntervalObject> $bars
     * @param list<TimeIntervalObject> $beats
     * @param list<Section> $sections
     * @param list<Segment> $segments
     * @param list<TimeIntervalObject> $tatums
     */
    public static function with(
        ?array $bars = null,
        ?array $beats = null,
        ?Meta $meta = null,
        ?array $sections = null,
        ?array $segments = null,
        ?array $tatums = null,
        ?Track $track = null,
    ): self {
        $obj = new self;

        null !== $bars && $obj->bars = $bars;
        null !== $beats && $obj->beats = $beats;
        null !== $meta && $obj->meta = $meta;
        null !== $sections && $obj->sections = $sections;
        null !== $segments && $obj->segments = $segments;
        null !== $tatums && $obj->tatums = $tatums;
        null !== $track && $obj->track = $track;

        return $obj;
    }

    /**
     * The time intervals of the bars throughout the track. A bar (or measure) is a segment of time defined as a given number of beats.
     *
     * @param list<TimeIntervalObject> $bars
     */
    public function withBars(array $bars): self
    {
        $obj = clone $this;
        $obj->bars = $bars;

        return $obj;
    }

    /**
     * The time intervals of beats throughout the track. A beat is the basic time unit of a piece of music; for example, each tick of a metronome. Beats are typically multiples of tatums.
     *
     * @param list<TimeIntervalObject> $beats
     */
    public function withBeats(array $beats): self
    {
        $obj = clone $this;
        $obj->beats = $beats;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * Sections are defined by large variations in rhythm or timbre, e.g. chorus, verse, bridge, guitar solo, etc. Each section contains its own descriptions of tempo, key, mode, time_signature, and loudness.
     *
     * @param list<Section> $sections
     */
    public function withSections(array $sections): self
    {
        $obj = clone $this;
        $obj->sections = $sections;

        return $obj;
    }

    /**
     * Each segment contains a roughly conisistent sound throughout its duration.
     *
     * @param list<Segment> $segments
     */
    public function withSegments(array $segments): self
    {
        $obj = clone $this;
        $obj->segments = $segments;

        return $obj;
    }

    /**
     * A tatum represents the lowest regular pulse train that a listener intuitively infers from the timing of perceived musical events (segments).
     *
     * @param list<TimeIntervalObject> $tatums
     */
    public function withTatums(array $tatums): self
    {
        $obj = clone $this;
        $obj->tatums = $tatums;

        return $obj;
    }

    public function withTrack(Track $track): self
    {
        $obj = clone $this;
        $obj->track = $track;

        return $obj;
    }
}
