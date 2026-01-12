<?php

declare(strict_types=1);

namespace Spotted\Me\Player\Queue;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\EpisodeObject;
use Spotted\Me\Player\Queue\QueueGetResponse\CurrentlyPlaying;
use Spotted\Me\Player\Queue\QueueGetResponse\Queue;
use Spotted\TrackObject;

/**
 * @phpstan-import-type CurrentlyPlayingVariants from \Spotted\Me\Player\Queue\QueueGetResponse\CurrentlyPlaying
 * @phpstan-import-type QueueVariants from \Spotted\Me\Player\Queue\QueueGetResponse\Queue
 * @phpstan-import-type CurrentlyPlayingShape from \Spotted\Me\Player\Queue\QueueGetResponse\CurrentlyPlaying
 * @phpstan-import-type QueueShape from \Spotted\Me\Player\Queue\QueueGetResponse\Queue
 *
 * @phpstan-type QueueGetResponseShape = array{
 *   currentlyPlaying?: CurrentlyPlayingShape|null,
 *   published?: bool|null,
 *   queue?: list<QueueShape>|null,
 * }
 */
final class QueueGetResponse implements BaseModel
{
    /** @use SdkModel<QueueGetResponseShape> */
    use SdkModel;

    /**
     * The currently playing track or episode. Can be `null`.
     *
     * @var CurrentlyPlayingVariants|null $currentlyPlaying
     */
    #[Optional('currently_playing', union: CurrentlyPlaying::class)]
    public TrackObject|EpisodeObject|null $currentlyPlaying;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * The tracks or episodes in the queue. Can be empty.
     *
     * @var list<QueueVariants>|null $queue
     */
    #[Optional(list: Queue::class)]
    public ?array $queue;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CurrentlyPlayingShape|null $currentlyPlaying
     * @param list<QueueShape>|null $queue
     */
    public static function with(
        TrackObject|array|EpisodeObject|null $currentlyPlaying = null,
        ?bool $published = null,
        ?array $queue = null,
    ): self {
        $self = new self;

        null !== $currentlyPlaying && $self['currentlyPlaying'] = $currentlyPlaying;
        null !== $published && $self['published'] = $published;
        null !== $queue && $self['queue'] = $queue;

        return $self;
    }

    /**
     * The currently playing track or episode. Can be `null`.
     *
     * @param CurrentlyPlayingShape $currentlyPlaying
     */
    public function withCurrentlyPlaying(
        TrackObject|array|EpisodeObject $currentlyPlaying
    ): self {
        $self = clone $this;
        $self['currentlyPlaying'] = $currentlyPlaying;

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
     * The tracks or episodes in the queue. Can be empty.
     *
     * @param list<QueueShape> $queue
     */
    public function withQueue(array $queue): self
    {
        $self = clone $this;
        $self['queue'] = $queue;

        return $self;
    }
}
