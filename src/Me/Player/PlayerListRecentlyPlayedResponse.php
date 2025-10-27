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
 * @phpstan-type player_list_recently_played_response = array{
 *   context?: ContextObject, playedAt?: \DateTimeInterface, track?: TrackObject
 * }
 */
final class PlayerListRecentlyPlayedResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<player_list_recently_played_response> */
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
    #[Api('played_at', optional: true)]
    public ?\DateTimeInterface $playedAt;

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
        ?\DateTimeInterface $playedAt = null,
        ?TrackObject $track = null,
    ): self {
        $obj = new self;

        null !== $context && $obj->context = $context;
        null !== $playedAt && $obj->playedAt = $playedAt;
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
        $obj->playedAt = $playedAt;

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
