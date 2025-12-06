<?php

declare(strict_types=1);

namespace Spotted\Me\Tracks\TrackSaveParams;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type TimestampedIDShape = array{
 *   id: string, added_at: \DateTimeInterface
 * }
 */
final class TimestampedID implements BaseModel
{
    /** @use SdkModel<TimestampedIDShape> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    #[Api]
    public string $id;

    /**
     * The timestamp when the track was added to the library. Use ISO 8601 format with UTC timezone (e.g., `2023-01-15T14:30:00Z`). You can specify past timestamps to insert tracks at specific positions in the library's chronological order. The API uses minute-level granularity for ordering, though the timestamp supports millisecond precision.
     */
    #[Api]
    public \DateTimeInterface $added_at;

    /**
     * `new TimestampedID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimestampedID::with(id: ..., added_at: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimestampedID)->withID(...)->withAddedAt(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $id, \DateTimeInterface $added_at): self
    {
        $obj = new self;

        $obj['id'] = $id;
        $obj['added_at'] = $added_at;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The timestamp when the track was added to the library. Use ISO 8601 format with UTC timezone (e.g., `2023-01-15T14:30:00Z`). You can specify past timestamps to insert tracks at specific positions in the library's chronological order. The API uses minute-level granularity for ordering, though the timestamp supports millisecond precision.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj['added_at'] = $addedAt;

        return $obj;
    }
}
