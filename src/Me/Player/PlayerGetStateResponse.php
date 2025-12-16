<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
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
 *   currentlyPlayingType?: string|null,
 *   device?: DeviceObject|null,
 *   isPlaying?: bool|null,
 *   item?: null|TrackObject|EpisodeObject,
 *   progressMs?: int|null,
 *   published?: bool|null,
 *   repeatState?: string|null,
 *   shuffleState?: bool|null,
 *   timestamp?: int|null,
 * }
 */
final class PlayerGetStateResponse implements BaseModel
{
    /** @use SdkModel<PlayerGetStateResponseShape> */
    use SdkModel;

    /**
     * Allows to update the user interface based on which playback actions are available within the current context.
     */
    #[Optional]
    public ?Actions $actions;

    /**
     * A Context Object. Can be `null`.
     */
    #[Optional]
    public ?ContextObject $context;

    /**
     * The object type of the currently playing item. Can be one of `track`, `episode`, `ad` or `unknown`.
     */
    #[Optional('currently_playing_type')]
    public ?string $currentlyPlayingType;

    /**
     * The device that is currently active.
     */
    #[Optional]
    public ?DeviceObject $device;

    /**
     * If something is currently playing, return `true`.
     */
    #[Optional('is_playing')]
    public ?bool $isPlaying;

    /**
     * The currently playing track or episode. Can be `null`.
     */
    #[Optional(union: Item::class)]
    public TrackObject|EpisodeObject|null $item;

    /**
     * Progress into the currently playing track or episode. Can be `null`.
     */
    #[Optional('progress_ms')]
    public ?int $progressMs;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * off, track, context.
     */
    #[Optional('repeat_state')]
    public ?string $repeatState;

    /**
     * If shuffle is on or off.
     */
    #[Optional('shuffle_state')]
    public ?bool $shuffleState;

    /**
     * Unix Millisecond Timestamp when playback state was last changed (play, pause, skip, scrub, new song, etc.).
     */
    #[Optional]
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
     *   interruptingPlayback?: bool|null,
     *   pausing?: bool|null,
     *   published?: bool|null,
     *   resuming?: bool|null,
     *   seeking?: bool|null,
     *   skippingNext?: bool|null,
     *   skippingPrev?: bool|null,
     *   togglingRepeatContext?: bool|null,
     *   togglingRepeatTrack?: bool|null,
     *   togglingShuffle?: bool|null,
     *   transferringPlayback?: bool|null,
     * } $actions
     * @param ContextObject|array{
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   published?: bool|null,
     *   type?: string|null,
     *   uri?: string|null,
     * } $context
     * @param DeviceObject|array{
     *   id?: string|null,
     *   isActive?: bool|null,
     *   isPrivateSession?: bool|null,
     *   isRestricted?: bool|null,
     *   name?: string|null,
     *   published?: bool|null,
     *   supportsVolume?: bool|null,
     *   type?: string|null,
     *   volumePercent?: int|null,
     * } $device
     * @param TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   availableMarkets?: list<string>|null,
     *   discNumber?: int|null,
     *   durationMs?: int|null,
     *   explicit?: bool|null,
     *   externalIDs?: ExternalIDObject|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   isLocal?: bool|null,
     *   isPlayable?: bool|null,
     *   linkedFrom?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   previewURL?: string|null,
     *   published?: bool|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   trackNumber?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }|EpisodeObject|array{
     *   id: string,
     *   audioPreviewURL: string|null,
     *   description: string,
     *   durationMs: int,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isExternallyHosted: bool,
     *   isPlayable: bool,
     *   languages: list<string>,
     *   name: string,
     *   releaseDate: string,
     *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type?: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   published?: bool|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resumePoint?: ResumePointObject|null,
     * } $item
     */
    public static function with(
        Actions|array|null $actions = null,
        ContextObject|array|null $context = null,
        ?string $currentlyPlayingType = null,
        DeviceObject|array|null $device = null,
        ?bool $isPlaying = null,
        TrackObject|array|EpisodeObject|null $item = null,
        ?int $progressMs = null,
        ?bool $published = null,
        ?string $repeatState = null,
        ?bool $shuffleState = null,
        ?int $timestamp = null,
    ): self {
        $self = new self;

        null !== $actions && $self['actions'] = $actions;
        null !== $context && $self['context'] = $context;
        null !== $currentlyPlayingType && $self['currentlyPlayingType'] = $currentlyPlayingType;
        null !== $device && $self['device'] = $device;
        null !== $isPlaying && $self['isPlaying'] = $isPlaying;
        null !== $item && $self['item'] = $item;
        null !== $progressMs && $self['progressMs'] = $progressMs;
        null !== $published && $self['published'] = $published;
        null !== $repeatState && $self['repeatState'] = $repeatState;
        null !== $shuffleState && $self['shuffleState'] = $shuffleState;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Allows to update the user interface based on which playback actions are available within the current context.
     *
     * @param Actions|array{
     *   interruptingPlayback?: bool|null,
     *   pausing?: bool|null,
     *   published?: bool|null,
     *   resuming?: bool|null,
     *   seeking?: bool|null,
     *   skippingNext?: bool|null,
     *   skippingPrev?: bool|null,
     *   togglingRepeatContext?: bool|null,
     *   togglingRepeatTrack?: bool|null,
     *   togglingShuffle?: bool|null,
     *   transferringPlayback?: bool|null,
     * } $actions
     */
    public function withActions(Actions|array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    /**
     * A Context Object. Can be `null`.
     *
     * @param ContextObject|array{
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   published?: bool|null,
     *   type?: string|null,
     *   uri?: string|null,
     * } $context
     */
    public function withContext(ContextObject|array $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    /**
     * The object type of the currently playing item. Can be one of `track`, `episode`, `ad` or `unknown`.
     */
    public function withCurrentlyPlayingType(string $currentlyPlayingType): self
    {
        $self = clone $this;
        $self['currentlyPlayingType'] = $currentlyPlayingType;

        return $self;
    }

    /**
     * The device that is currently active.
     *
     * @param DeviceObject|array{
     *   id?: string|null,
     *   isActive?: bool|null,
     *   isPrivateSession?: bool|null,
     *   isRestricted?: bool|null,
     *   name?: string|null,
     *   published?: bool|null,
     *   supportsVolume?: bool|null,
     *   type?: string|null,
     *   volumePercent?: int|null,
     * } $device
     */
    public function withDevice(DeviceObject|array $device): self
    {
        $self = clone $this;
        $self['device'] = $device;

        return $self;
    }

    /**
     * If something is currently playing, return `true`.
     */
    public function withIsPlaying(bool $isPlaying): self
    {
        $self = clone $this;
        $self['isPlaying'] = $isPlaying;

        return $self;
    }

    /**
     * The currently playing track or episode. Can be `null`.
     *
     * @param TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   availableMarkets?: list<string>|null,
     *   discNumber?: int|null,
     *   durationMs?: int|null,
     *   explicit?: bool|null,
     *   externalIDs?: ExternalIDObject|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   isLocal?: bool|null,
     *   isPlayable?: bool|null,
     *   linkedFrom?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   previewURL?: string|null,
     *   published?: bool|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   trackNumber?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }|EpisodeObject|array{
     *   id: string,
     *   audioPreviewURL: string|null,
     *   description: string,
     *   durationMs: int,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isExternallyHosted: bool,
     *   isPlayable: bool,
     *   languages: list<string>,
     *   name: string,
     *   releaseDate: string,
     *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type?: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   published?: bool|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resumePoint?: ResumePointObject|null,
     * } $item
     */
    public function withItem(TrackObject|array|EpisodeObject $item): self
    {
        $self = clone $this;
        $self['item'] = $item;

        return $self;
    }

    /**
     * Progress into the currently playing track or episode. Can be `null`.
     */
    public function withProgressMs(int $progressMs): self
    {
        $self = clone $this;
        $self['progressMs'] = $progressMs;

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
     * off, track, context.
     */
    public function withRepeatState(string $repeatState): self
    {
        $self = clone $this;
        $self['repeatState'] = $repeatState;

        return $self;
    }

    /**
     * If shuffle is on or off.
     */
    public function withShuffleState(bool $shuffleState): self
    {
        $self = clone $this;
        $self['shuffleState'] = $shuffleState;

        return $self;
    }

    /**
     * Unix Millisecond Timestamp when playback state was last changed (play, pause, skip, scrub, new song, etc.).
     */
    public function withTimestamp(int $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
