<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\TrackObject;

/**
 * @phpstan-import-type ContextObjectShape from \Spotted\Me\Player\ContextObject
 * @phpstan-import-type TrackObjectShape from \Spotted\TrackObject
 *
 * @phpstan-type PlayerListRecentlyPlayedResponseShape = array{
 *   context?: null|ContextObject|ContextObjectShape,
 *   playedAt?: \DateTimeInterface|null,
 *   published?: bool|null,
 *   track?: null|TrackObject|TrackObjectShape,
 * }
 */
final class PlayerListRecentlyPlayedResponse implements BaseModel
{
    /** @use SdkModel<PlayerListRecentlyPlayedResponseShape> */
    use SdkModel;

    /**
     * The context the track was played from.
     */
    #[Optional]
    public ?ContextObject $context;

    /**
     * The date and time the track was played.
     */
    #[Optional('played_at')]
    public ?\DateTimeInterface $playedAt;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * The track the user listened to.
     */
    #[Optional]
    public ?TrackObject $track;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ContextObjectShape $context
     * @param TrackObjectShape $track
     */
    public static function with(
        ContextObject|array|null $context = null,
        ?\DateTimeInterface $playedAt = null,
        ?bool $published = null,
        TrackObject|array|null $track = null,
    ): self {
        $self = new self;

        null !== $context && $self['context'] = $context;
        null !== $playedAt && $self['playedAt'] = $playedAt;
        null !== $published && $self['published'] = $published;
        null !== $track && $self['track'] = $track;

        return $self;
    }

    /**
     * The context the track was played from.
     *
     * @param ContextObjectShape $context
     */
    public function withContext(ContextObject|array $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    /**
     * The date and time the track was played.
     */
    public function withPlayedAt(\DateTimeInterface $playedAt): self
    {
        $self = clone $this;
        $self['playedAt'] = $playedAt;

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
     * The track the user listened to.
     *
     * @param TrackObjectShape $track
     */
    public function withTrack(TrackObject|array $track): self
    {
        $self = clone $this;
        $self['track'] = $track;

        return $self;
    }
}
