<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\EpisodeObject;
use Spotted\Me\Player\PlayerGetStateResponse\Actions;
use Spotted\Me\Player\PlayerGetStateResponse\Item;
use Spotted\TrackObject;

/**
 * @phpstan-type player_get_state_response = array{
 *   actions?: Actions,
 *   context?: ContextObject,
 *   currentlyPlayingType?: string,
 *   device?: DeviceObject,
 *   isPlaying?: bool,
 *   item?: TrackObject|EpisodeObject,
 *   progressMs?: int,
 *   repeatState?: string,
 *   shuffleState?: bool,
 *   timestamp?: int,
 * }
 */
final class PlayerGetStateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<player_get_state_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * Allows to update the user interface based on which playback actions are available within the current context.
     */
    #[Api(optional: true)]
    public ?Actions $actions;

    /**
     * A Context Object. Can be `null`.
     */
    #[Api(optional: true)]
    public ?ContextObject $context;

    /**
     * The object type of the currently playing item. Can be one of `track`, `episode`, `ad` or `unknown`.
     */
    #[Api('currently_playing_type', optional: true)]
    public ?string $currentlyPlayingType;

    /**
     * The device that is currently active.
     */
    #[Api(optional: true)]
    public ?DeviceObject $device;

    /**
     * If something is currently playing, return `true`.
     */
    #[Api('is_playing', optional: true)]
    public ?bool $isPlaying;

    /**
     * The currently playing track or episode. Can be `null`.
     */
    #[Api(union: Item::class, optional: true)]
    public TrackObject|EpisodeObject|null $item;

    /**
     * Progress into the currently playing track or episode. Can be `null`.
     */
    #[Api('progress_ms', optional: true)]
    public ?int $progressMs;

    /**
     * off, track, context.
     */
    #[Api('repeat_state', optional: true)]
    public ?string $repeatState;

    /**
     * If shuffle is on or off.
     */
    #[Api('shuffle_state', optional: true)]
    public ?bool $shuffleState;

    /**
     * Unix Millisecond Timestamp when playback state was last changed (play, pause, skip, scrub, new song, etc.).
     */
    #[Api(optional: true)]
    public ?int $timestamp;

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
        ?Actions $actions = null,
        ?ContextObject $context = null,
        ?string $currentlyPlayingType = null,
        ?DeviceObject $device = null,
        ?bool $isPlaying = null,
        TrackObject|EpisodeObject|null $item = null,
        ?int $progressMs = null,
        ?string $repeatState = null,
        ?bool $shuffleState = null,
        ?int $timestamp = null,
    ): self {
        $obj = new self;

        null !== $actions && $obj->actions = $actions;
        null !== $context && $obj->context = $context;
        null !== $currentlyPlayingType && $obj->currentlyPlayingType = $currentlyPlayingType;
        null !== $device && $obj->device = $device;
        null !== $isPlaying && $obj->isPlaying = $isPlaying;
        null !== $item && $obj->item = $item;
        null !== $progressMs && $obj->progressMs = $progressMs;
        null !== $repeatState && $obj->repeatState = $repeatState;
        null !== $shuffleState && $obj->shuffleState = $shuffleState;
        null !== $timestamp && $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * Allows to update the user interface based on which playback actions are available within the current context.
     */
    public function withActions(Actions $actions): self
    {
        $obj = clone $this;
        $obj->actions = $actions;

        return $obj;
    }

    /**
     * A Context Object. Can be `null`.
     */
    public function withContext(ContextObject $context): self
    {
        $obj = clone $this;
        $obj->context = $context;

        return $obj;
    }

    /**
     * The object type of the currently playing item. Can be one of `track`, `episode`, `ad` or `unknown`.
     */
    public function withCurrentlyPlayingType(string $currentlyPlayingType): self
    {
        $obj = clone $this;
        $obj->currentlyPlayingType = $currentlyPlayingType;

        return $obj;
    }

    /**
     * The device that is currently active.
     */
    public function withDevice(DeviceObject $device): self
    {
        $obj = clone $this;
        $obj->device = $device;

        return $obj;
    }

    /**
     * If something is currently playing, return `true`.
     */
    public function withIsPlaying(bool $isPlaying): self
    {
        $obj = clone $this;
        $obj->isPlaying = $isPlaying;

        return $obj;
    }

    /**
     * The currently playing track or episode. Can be `null`.
     */
    public function withItem(TrackObject|EpisodeObject $item): self
    {
        $obj = clone $this;
        $obj->item = $item;

        return $obj;
    }

    /**
     * Progress into the currently playing track or episode. Can be `null`.
     */
    public function withProgressMs(int $progressMs): self
    {
        $obj = clone $this;
        $obj->progressMs = $progressMs;

        return $obj;
    }

    /**
     * off, track, context.
     */
    public function withRepeatState(string $repeatState): self
    {
        $obj = clone $this;
        $obj->repeatState = $repeatState;

        return $obj;
    }

    /**
     * If shuffle is on or off.
     */
    public function withShuffleState(bool $shuffleState): self
    {
        $obj = clone $this;
        $obj->shuffleState = $shuffleState;

        return $obj;
    }

    /**
     * Unix Millisecond Timestamp when playback state was last changed (play, pause, skip, scrub, new song, etc.).
     */
    public function withTimestamp(int $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }
}
