<?php

declare(strict_types=1);

namespace Spotted\Me\Player\Queue;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\EpisodeObject;
use Spotted\Me\Player\Queue\QueueGetResponse\CurrentlyPlaying;
use Spotted\Me\Player\Queue\QueueGetResponse\Queue;
use Spotted\TrackObject;

/**
 * @phpstan-type QueueGetResponseShape = array{
 *   currentlyPlaying?: TrackObject|EpisodeObject,
 *   queue?: list<TrackObject|EpisodeObject>,
 * }
 */
final class QueueGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<QueueGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The currently playing track or episode. Can be `null`.
     */
    #[Api('currently_playing', union: CurrentlyPlaying::class, optional: true)]
    public TrackObject|EpisodeObject|null $currentlyPlaying;

    /**
     * The tracks or episodes in the queue. Can be empty.
     *
     * @var list<TrackObject|EpisodeObject>|null $queue
     */
    #[Api(list: Queue::class, optional: true)]
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
     * @param list<TrackObject|EpisodeObject> $queue
     */
    public static function with(
        TrackObject|EpisodeObject|null $currentlyPlaying = null,
        ?array $queue = null
    ): self {
        $obj = new self;

        null !== $currentlyPlaying && $obj->currentlyPlaying = $currentlyPlaying;
        null !== $queue && $obj->queue = $queue;

        return $obj;
    }

    /**
     * The currently playing track or episode. Can be `null`.
     */
    public function withCurrentlyPlaying(
        TrackObject|EpisodeObject $currentlyPlaying
    ): self {
        $obj = clone $this;
        $obj->currentlyPlaying = $currentlyPlaying;

        return $obj;
    }

    /**
     * The tracks or episodes in the queue. Can be empty.
     *
     * @param list<TrackObject|EpisodeObject> $queue
     */
    public function withQueue(array $queue): self
    {
        $obj = clone $this;
        $obj->queue = $queue;

        return $obj;
    }
}
