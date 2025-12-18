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
 * @phpstan-import-type TimeIntervalObjectShape from \Spotted\AudioAnalysis\TimeIntervalObject
 * @phpstan-import-type MetaShape from \Spotted\AudioAnalysis\AudioAnalysisGetResponse\Meta
 * @phpstan-import-type SectionShape from \Spotted\AudioAnalysis\AudioAnalysisGetResponse\Section
 * @phpstan-import-type SegmentShape from \Spotted\AudioAnalysis\AudioAnalysisGetResponse\Segment
 * @phpstan-import-type TrackShape from \Spotted\AudioAnalysis\AudioAnalysisGetResponse\Track
 *
 * @phpstan-type AudioAnalysisGetResponseShape = array{
 *   bars?: list<TimeIntervalObjectShape>|null,
 *   beats?: list<TimeIntervalObjectShape>|null,
 *   meta?: null|Meta|MetaShape,
 *   published?: bool|null,
 *   sections?: list<SectionShape>|null,
 *   segments?: list<SegmentShape>|null,
 *   tatums?: list<TimeIntervalObjectShape>|null,
 *   track?: null|Track|TrackShape,
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
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

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
     * @param list<TimeIntervalObjectShape>|null $bars
     * @param list<TimeIntervalObjectShape>|null $beats
     * @param Meta|MetaShape|null $meta
     * @param list<SectionShape>|null $sections
     * @param list<SegmentShape>|null $segments
     * @param list<TimeIntervalObjectShape>|null $tatums
     * @param Track|TrackShape|null $track
     */
    public static function with(
        ?array $bars = null,
        ?array $beats = null,
        Meta|array|null $meta = null,
        ?bool $published = null,
        ?array $sections = null,
        ?array $segments = null,
        ?array $tatums = null,
        Track|array|null $track = null,
    ): self {
        $self = new self;

        null !== $bars && $self['bars'] = $bars;
        null !== $beats && $self['beats'] = $beats;
        null !== $meta && $self['meta'] = $meta;
        null !== $published && $self['published'] = $published;
        null !== $sections && $self['sections'] = $sections;
        null !== $segments && $self['segments'] = $segments;
        null !== $tatums && $self['tatums'] = $tatums;
        null !== $track && $self['track'] = $track;

        return $self;
    }

    /**
     * The time intervals of the bars throughout the track. A bar (or measure) is a segment of time defined as a given number of beats.
     *
     * @param list<TimeIntervalObjectShape> $bars
     */
    public function withBars(array $bars): self
    {
        $self = clone $this;
        $self['bars'] = $bars;

        return $self;
    }

    /**
     * The time intervals of beats throughout the track. A beat is the basic time unit of a piece of music; for example, each tick of a metronome. Beats are typically multiples of tatums.
     *
     * @param list<TimeIntervalObjectShape> $beats
     */
    public function withBeats(array $beats): self
    {
        $self = clone $this;
        $self['beats'] = $beats;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

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
     * Sections are defined by large variations in rhythm or timbre, e.g. chorus, verse, bridge, guitar solo, etc. Each section contains its own descriptions of tempo, key, mode, time_signature, and loudness.
     *
     * @param list<SectionShape> $sections
     */
    public function withSections(array $sections): self
    {
        $self = clone $this;
        $self['sections'] = $sections;

        return $self;
    }

    /**
     * Each segment contains a roughly conisistent sound throughout its duration.
     *
     * @param list<SegmentShape> $segments
     */
    public function withSegments(array $segments): self
    {
        $self = clone $this;
        $self['segments'] = $segments;

        return $self;
    }

    /**
     * A tatum represents the lowest regular pulse train that a listener intuitively infers from the timing of perceived musical events (segments).
     *
     * @param list<TimeIntervalObjectShape> $tatums
     */
    public function withTatums(array $tatums): self
    {
        $self = clone $this;
        $self['tatums'] = $tatums;

        return $self;
    }

    /**
     * @param Track|TrackShape $track
     */
    public function withTrack(Track|array $track): self
    {
        $self = clone $this;
        $self['track'] = $track;

        return $self;
    }
}
