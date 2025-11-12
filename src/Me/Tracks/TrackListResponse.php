<?php

declare(strict_types=1);

namespace Spotted\Me\Tracks;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\TrackObject;

/**
 * @phpstan-type TrackListResponseShape = array{
 *   added_at?: \DateTimeInterface|null, track?: TrackObject|null
 * }
 */
final class TrackListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TrackListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The date and time the track was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $added_at;

    /**
     * Information about the track.
     */
    #[Api(optional: true)]
    public ?TrackObject $track;

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
        ?\DateTimeInterface $added_at = null,
        ?TrackObject $track = null
    ): self {
        $obj = new self;

        null !== $added_at && $obj->added_at = $added_at;
        null !== $track && $obj->track = $track;

        return $obj;
    }

    /**
     * The date and time the track was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj->added_at = $addedAt;

        return $obj;
    }

    /**
     * Information about the track.
     */
    public function withTrack(TrackObject $track): self
    {
        $obj = clone $this;
        $obj->track = $track;

        return $obj;
    }
}
