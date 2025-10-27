<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\PlaylistTrackObject\Track;

/**
 * @phpstan-type playlist_track_object = array{
 *   addedAt?: \DateTimeInterface,
 *   addedBy?: PlaylistUserObject,
 *   isLocal?: bool,
 *   track?: TrackObject|EpisodeObject,
 * }
 */
final class PlaylistTrackObject implements BaseModel
{
    /** @use SdkModel<playlist_track_object> */
    use SdkModel;

    /**
     * The date and time the track or episode was added. _**Note**: some very old playlists may return `null` in this field._.
     */
    #[Api('added_at', optional: true)]
    public ?\DateTimeInterface $addedAt;

    /**
     * The Spotify user who added the track or episode. _**Note**: some very old playlists may return `null` in this field._.
     */
    #[Api('added_by', optional: true)]
    public ?PlaylistUserObject $addedBy;

    /**
     * Whether this track or episode is a [local file](/documentation/web-api/concepts/playlists/#local-files) or not.
     */
    #[Api('is_local', optional: true)]
    public ?bool $isLocal;

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
        ?\DateTimeInterface $addedAt = null,
        ?PlaylistUserObject $addedBy = null,
        ?bool $isLocal = null,
        TrackObject|EpisodeObject|null $track = null,
    ): self {
        $obj = new self;

        null !== $addedAt && $obj->addedAt = $addedAt;
        null !== $addedBy && $obj->addedBy = $addedBy;
        null !== $isLocal && $obj->isLocal = $isLocal;
        null !== $track && $obj->track = $track;

        return $obj;
    }

    /**
     * The date and time the track or episode was added. _**Note**: some very old playlists may return `null` in this field._.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj->addedAt = $addedAt;

        return $obj;
    }

    /**
     * The Spotify user who added the track or episode. _**Note**: some very old playlists may return `null` in this field._.
     */
    public function withAddedBy(PlaylistUserObject $addedBy): self
    {
        $obj = clone $this;
        $obj->addedBy = $addedBy;

        return $obj;
    }

    /**
     * Whether this track or episode is a [local file](/documentation/web-api/concepts/playlists/#local-files) or not.
     */
    public function withIsLocal(bool $isLocal): self
    {
        $obj = clone $this;
        $obj->isLocal = $isLocal;

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
