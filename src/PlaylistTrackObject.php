<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\PlaylistTrackObject\Track;

/**
 * @phpstan-type PlaylistTrackObjectShape = array{
 *   added_at?: \DateTimeInterface|null,
 *   added_by?: PlaylistUserObject|null,
 *   is_local?: bool|null,
 *   track?: null|TrackObject|EpisodeObject,
 * }
 */
final class PlaylistTrackObject implements BaseModel
{
    /** @use SdkModel<PlaylistTrackObjectShape> */
    use SdkModel;

    /**
     * The date and time the track or episode was added. _**Note**: some very old playlists may return `null` in this field._.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $added_at;

    /**
     * The Spotify user who added the track or episode. _**Note**: some very old playlists may return `null` in this field._.
     */
    #[Api(optional: true)]
    public ?PlaylistUserObject $added_by;

    /**
     * Whether this track or episode is a [local file](/documentation/web-api/concepts/playlists/#local-files) or not.
     */
    #[Api(optional: true)]
    public ?bool $is_local;

    /**
     * Information about the track or episode.
     */
    #[Api(union: Track::class, optional: true)]
    public TrackObject|EpisodeObject|null $track;

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
        ?PlaylistUserObject $added_by = null,
        ?bool $is_local = null,
        TrackObject|EpisodeObject|null $track = null,
    ): self {
        $obj = new self;

        null !== $added_at && $obj->added_at = $added_at;
        null !== $added_by && $obj->added_by = $added_by;
        null !== $is_local && $obj->is_local = $is_local;
        null !== $track && $obj->track = $track;

        return $obj;
    }

    /**
     * The date and time the track or episode was added. _**Note**: some very old playlists may return `null` in this field._.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj->added_at = $addedAt;

        return $obj;
    }

    /**
     * The Spotify user who added the track or episode. _**Note**: some very old playlists may return `null` in this field._.
     */
    public function withAddedBy(PlaylistUserObject $addedBy): self
    {
        $obj = clone $this;
        $obj->added_by = $addedBy;

        return $obj;
    }

    /**
     * Whether this track or episode is a [local file](/documentation/web-api/concepts/playlists/#local-files) or not.
     */
    public function withIsLocal(bool $isLocal): self
    {
        $obj = clone $this;
        $obj->is_local = $isLocal;

        return $obj;
    }

    /**
     * Information about the track or episode.
     */
    public function withTrack(TrackObject|EpisodeObject $track): self
    {
        $obj = clone $this;
        $obj->track = $track;

        return $obj;
    }
}
