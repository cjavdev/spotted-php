<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\EpisodeObject;
use Spotted\EpisodeObject\ReleaseDatePrecision;
use Spotted\EpisodeRestrictionObject;
use Spotted\ExternalIDObject;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\LinkedTrackObject;
use Spotted\Me\Player\PlayerGetStateResponse\Actions;
use Spotted\Me\Player\PlayerGetStateResponse\Item;
use Spotted\ResumePointObject;
use Spotted\ShowBase;
use Spotted\SimplifiedArtistObject;
use Spotted\TrackObject;
use Spotted\TrackObject\Album;
use Spotted\TrackObject\Type;
use Spotted\TrackRestrictionObject;

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
     *
     * @param Actions|array{
     *   interrupting_playback?: bool|null,
     *   pausing?: bool|null,
     *   resuming?: bool|null,
     *   seeking?: bool|null,
     *   skipping_next?: bool|null,
     *   skipping_prev?: bool|null,
     *   toggling_repeat_context?: bool|null,
     *   toggling_repeat_track?: bool|null,
     *   toggling_shuffle?: bool|null,
     *   transferring_playback?: bool|null,
     * } $actions
     * @param ContextObject|array{
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: string|null,
     *   uri?: string|null,
     * } $context
     * @param DeviceObject|array{
     *   id?: string|null,
     *   is_active?: bool|null,
     *   is_private_session?: bool|null,
     *   is_restricted?: bool|null,
     *   name?: string|null,
     *   supports_volume?: bool|null,
     *   type?: string|null,
     *   volume_percent?: int|null,
     * } $device
     * @param TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   available_markets?: list<string>|null,
     *   disc_number?: int|null,
     *   duration_ms?: int|null,
     *   explicit?: bool|null,
     *   external_ids?: ExternalIDObject|null,
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   is_local?: bool|null,
     *   is_playable?: bool|null,
     *   linked_from?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   preview_url?: string|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   track_number?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }|EpisodeObject|array{
     *   id: string,
     *   audio_preview_url: string|null,
     *   description: string,
     *   duration_ms: int,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   is_externally_hosted: bool,
     *   is_playable: bool,
     *   languages: list<string>,
     *   name: string,
     *   release_date: string,
     *   release_date_precision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resume_point?: ResumePointObject|null,
     * } $item
     */
    public static function with(
        Actions|array|null $actions = null,
        ContextObject|array|null $context = null,
        ?string $currently_playing_type = null,
        DeviceObject|array|null $device = null,
        ?bool $is_playing = null,
        TrackObject|array|EpisodeObject|null $item = null,
        ?int $progress_ms = null,
        ?string $repeat_state = null,
        ?bool $shuffle_state = null,
        ?int $timestamp = null,
    ): self {
        $obj = new self;

        null !== $actions && $obj['actions'] = $actions;
        null !== $context && $obj['context'] = $context;
        null !== $currently_playing_type && $obj['currently_playing_type'] = $currently_playing_type;
        null !== $device && $obj['device'] = $device;
        null !== $is_playing && $obj['is_playing'] = $is_playing;
        null !== $item && $obj['item'] = $item;
        null !== $progress_ms && $obj['progress_ms'] = $progress_ms;
        null !== $repeat_state && $obj['repeat_state'] = $repeat_state;
        null !== $shuffle_state && $obj['shuffle_state'] = $shuffle_state;
        null !== $timestamp && $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * Allows to update the user interface based on which playback actions are available within the current context.
     *
     * @param Actions|array{
     *   interrupting_playback?: bool|null,
     *   pausing?: bool|null,
     *   resuming?: bool|null,
     *   seeking?: bool|null,
     *   skipping_next?: bool|null,
     *   skipping_prev?: bool|null,
     *   toggling_repeat_context?: bool|null,
     *   toggling_repeat_track?: bool|null,
     *   toggling_shuffle?: bool|null,
     *   transferring_playback?: bool|null,
     * } $actions
     */
    public function withActions(Actions|array $actions): self
    {
        $obj = clone $this;
        $obj['actions'] = $actions;

        return $obj;
    }

    /**
     * A Context Object. Can be `null`.
     *
     * @param ContextObject|array{
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: string|null,
     *   uri?: string|null,
     * } $context
     */
    public function withContext(ContextObject|array $context): self
    {
        $obj = clone $this;
        $obj['context'] = $context;

        return $obj;
    }

    /**
     * The object type of the currently playing item. Can be one of `track`, `episode`, `ad` or `unknown`.
     */
    public function withCurrentlyPlayingType(string $currentlyPlayingType): self
    {
        $obj = clone $this;
        $obj['currently_playing_type'] = $currentlyPlayingType;

        return $obj;
    }

    /**
     * The device that is currently active.
     *
     * @param DeviceObject|array{
     *   id?: string|null,
     *   is_active?: bool|null,
     *   is_private_session?: bool|null,
     *   is_restricted?: bool|null,
     *   name?: string|null,
     *   supports_volume?: bool|null,
     *   type?: string|null,
     *   volume_percent?: int|null,
     * } $device
     */
    public function withDevice(DeviceObject|array $device): self
    {
        $obj = clone $this;
        $obj['device'] = $device;

        return $obj;
    }

    /**
     * If something is currently playing, return `true`.
     */
    public function withIsPlaying(bool $isPlaying): self
    {
        $obj = clone $this;
        $obj['is_playing'] = $isPlaying;

        return $obj;
    }

    /**
     * The currently playing track or episode. Can be `null`.
     *
     * @param TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   available_markets?: list<string>|null,
     *   disc_number?: int|null,
     *   duration_ms?: int|null,
     *   explicit?: bool|null,
     *   external_ids?: ExternalIDObject|null,
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   is_local?: bool|null,
     *   is_playable?: bool|null,
     *   linked_from?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   preview_url?: string|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   track_number?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }|EpisodeObject|array{
     *   id: string,
     *   audio_preview_url: string|null,
     *   description: string,
     *   duration_ms: int,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   is_externally_hosted: bool,
     *   is_playable: bool,
     *   languages: list<string>,
     *   name: string,
     *   release_date: string,
     *   release_date_precision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resume_point?: ResumePointObject|null,
     * } $item
     */
    public function withItem(TrackObject|array|EpisodeObject $item): self
    {
        $obj = clone $this;
        $obj['item'] = $item;

        return $obj;
    }

    /**
     * Progress into the currently playing track or episode. Can be `null`.
     */
    public function withProgressMs(int $progressMs): self
    {
        $obj = clone $this;
        $obj['progress_ms'] = $progressMs;

        return $obj;
    }

    /**
     * off, track, context.
     */
    public function withRepeatState(string $repeatState): self
    {
        $obj = clone $this;
        $obj['repeat_state'] = $repeatState;

        return $obj;
    }

    /**
     * If shuffle is on or off.
     */
    public function withShuffleState(bool $shuffleState): self
    {
        $obj = clone $this;
        $obj['shuffle_state'] = $shuffleState;

        return $obj;
    }

    /**
     * Unix Millisecond Timestamp when playback state was last changed (play, pause, skip, scrub, new song, etc.).
     */
    public function withTimestamp(int $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }
}
