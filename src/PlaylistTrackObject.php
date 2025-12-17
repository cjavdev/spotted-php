<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\PlaylistTrackObject\Track;

/**
 * @phpstan-import-type PlaylistUserObjectShape from \Spotted\PlaylistUserObject
 * @phpstan-import-type TrackShape from \Spotted\PlaylistTrackObject\Track
 *
 * @phpstan-type PlaylistTrackObjectShape = array{
 *   addedAt?: \DateTimeInterface|null,
 *   addedBy?: null|PlaylistUserObject|PlaylistUserObjectShape,
 *   isLocal?: bool|null,
 *   published?: bool|null,
 *   track?: null|TrackShape|TrackObject|EpisodeObject,
 * }
 */
final class PlaylistTrackObject implements BaseModel
{
    /** @use SdkModel<PlaylistTrackObjectShape> */
    use SdkModel;

    /**
     * The date and time the track or episode was added. _**Note**: some very old playlists may return `null` in this field._.
     */
    #[Optional('added_at')]
    public ?\DateTimeInterface $addedAt;

    /**
     * The Spotify user who added the track or episode. _**Note**: some very old playlists may return `null` in this field._.
     */
    #[Optional('added_by')]
    public ?PlaylistUserObject $addedBy;

    /**
     * Whether this track or episode is a [local file](/documentation/web-api/concepts/playlists/#local-files) or not.
     */
    #[Optional('is_local')]
    public ?bool $isLocal;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * Information about the track or episode.
     */
    #[Optional(union: Track::class)]
    public TrackObject|EpisodeObject|null $track;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PlaylistUserObjectShape $addedBy
     * @param TrackShape $track
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        PlaylistUserObject|array|null $addedBy = null,
        ?bool $isLocal = null,
        ?bool $published = null,
        TrackObject|array|EpisodeObject|null $track = null,
    ): self {
        $self = new self;

        null !== $addedAt && $self['addedAt'] = $addedAt;
        null !== $addedBy && $self['addedBy'] = $addedBy;
        null !== $isLocal && $self['isLocal'] = $isLocal;
        null !== $published && $self['published'] = $published;
        null !== $track && $self['track'] = $track;

        return $self;
    }

    /**
     * The date and time the track or episode was added. _**Note**: some very old playlists may return `null` in this field._.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $self = clone $this;
        $self['addedAt'] = $addedAt;

        return $self;
    }

    /**
     * The Spotify user who added the track or episode. _**Note**: some very old playlists may return `null` in this field._.
     *
     * @param PlaylistUserObjectShape $addedBy
     */
    public function withAddedBy(PlaylistUserObject|array $addedBy): self
    {
        $self = clone $this;
        $self['addedBy'] = $addedBy;

        return $self;
    }

    /**
     * Whether this track or episode is a [local file](/documentation/web-api/concepts/playlists/#local-files) or not.
     */
    public function withIsLocal(bool $isLocal): self
    {
        $self = clone $this;
        $self['isLocal'] = $isLocal;

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
     * Information about the track or episode.
     *
     * @param TrackShape $track
     */
    public function withTrack(TrackObject|array|EpisodeObject $track): self
    {
        $self = clone $this;
        $self['track'] = $track;

        return $self;
    }
}
