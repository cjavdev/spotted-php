<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\TrackObject;

/**
 * @phpstan-type PlayerListRecentlyPlayedResponseShape = array{
 *   context?: ContextObject|null,
 *   played_at?: \DateTimeInterface|null,
 *   track?: TrackObject|null,
 * }
 */
final class PlayerListRecentlyPlayedResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PlayerListRecentlyPlayedResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The context the track was played from.
     */
    #[Api(optional: true)]
    public ?ContextObject $context;

    /**
     * The date and time the track was played.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $played_at;

    /**
     * The track the user listened to.
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
        ?ContextObject $context = null,
        ?\DateTimeInterface $played_at = null,
        ?TrackObject $track = null,
    ): self {
        $obj = new self;

        null !== $context && $obj->context = $context;
        null !== $played_at && $obj->played_at = $played_at;
        null !== $track && $obj->track = $track;

        return $obj;
    }

    /**
     * The context the track was played from.
     */
    public function withContext(ContextObject $context): self
    {
        $obj = clone $this;
        $obj->context = $context;

        return $obj;
    }

    /**
     * The date and time the track was played.
     */
    public function withPlayedAt(\DateTimeInterface $playedAt): self
    {
        $obj = clone $this;
        $obj->played_at = $playedAt;

        return $obj;
    }

    /**
     * The track the user listened to.
     */
    public function withTrack(TrackObject $track): self
    {
        $obj = clone $this;
        $obj->track = $track;

        return $obj;
    }
}
