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
 * @phpstan-type PlayerGetStateResponseShape = array{
 *   actions?: Actions|null,
 *   context?: ContextObject|null,
 *   currently_playing_type?: string|null,
 *   device?: DeviceObject|null,
 *   is_playing?: bool|null,
 *   item?: null|TrackObject|EpisodeObject,
 *   progress_ms?: int|null,
 *   repeat_state?: string|null,
 *   shuffle_state?: bool|null,
 *   timestamp?: int|null,
 * }
 */
final class PlayerGetStateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PlayerGetStateResponseShape> */
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
    #[Api(optional: true)]
    public ?string $currently_playing_type;

    /**
     * The device that is currently active.
     */
    #[Api(optional: true)]
    public ?DeviceObject $device;

    /**
     * If something is currently playing, return `true`.
     */
    #[Api(optional: true)]
    public ?bool $is_playing;

    /**
     * The currently playing track or episode. Can be `null`.
     */
    #[Api(union: Item::class, optional: true)]
    public TrackObject|EpisodeObject|null $item;

    /**
     * Progress into the currently playing track or episode. Can be `null`.
     */
    #[Api(optional: true)]
    public ?int $progress_ms;

    /**
     * off, track, context.
     */
    #[Api(optional: true)]
    public ?string $repeat_state;

    /**
     * If shuffle is on or off.
     */
    #[Api(optional: true)]
    public ?bool $shuffle_state;

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
        ?string $currently_playing_type = null,
        ?DeviceObject $device = null,
        ?bool $is_playing = null,
        TrackObject|EpisodeObject|null $item = null,
        ?int $progress_ms = null,
        ?string $repeat_state = null,
        ?bool $shuffle_state = null,
        ?int $timestamp = null,
    ): self {
        $obj = new self;

        null !== $actions && $obj->actions = $actions;
        null !== $context && $obj->context = $context;
        null !== $currently_playing_type && $obj->currently_playing_type = $currently_playing_type;
        null !== $device && $obj->device = $device;
        null !== $is_playing && $obj->is_playing = $is_playing;
        null !== $item && $obj->item = $item;
        null !== $progress_ms && $obj->progress_ms = $progress_ms;
        null !== $repeat_state && $obj->repeat_state = $repeat_state;
        null !== $shuffle_state && $obj->shuffle_state = $shuffle_state;
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
        $obj->currently_playing_type = $currentlyPlayingType;

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
        $obj->is_playing = $isPlaying;

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
        $obj->progress_ms = $progressMs;

        return $obj;
    }

    /**
     * off, track, context.
     */
    public function withRepeatState(string $repeatState): self
    {
        $obj = clone $this;
        $obj->repeat_state = $repeatState;

        return $obj;
    }

    /**
     * If shuffle is on or off.
     */
    public function withShuffleState(bool $shuffleState): self
    {
        $obj = clone $this;
        $obj->shuffle_state = $shuffleState;

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
