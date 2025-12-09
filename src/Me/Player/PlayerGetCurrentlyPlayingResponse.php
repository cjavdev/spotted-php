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
use Spotted\Me\Player\PlayerGetCurrentlyPlayingResponse\Actions;
use Spotted\Me\Player\PlayerGetCurrentlyPlayingResponse\Item;
use Spotted\ResumePointObject;
use Spotted\ShowBase;
use Spotted\SimplifiedArtistObject;
use Spotted\TrackObject;
use Spotted\TrackObject\Album;
use Spotted\TrackObject\Type;
use Spotted\TrackRestrictionObject;

/**
 * @phpstan-type PlayerGetCurrentlyPlayingResponseShape = array{
 *   actions?: Actions|null,
 *   context?: ContextObject|null,
 *   currentlyPlayingType?: string|null,
 *   isPlaying?: bool|null,
 *   item?: null|TrackObject|EpisodeObject,
 *   progressMs?: int|null,
 *   timestamp?: int|null,
 * }
 */
final class PlayerGetCurrentlyPlayingResponse implements BaseModel
{
    /** @use SdkModel<PlayerGetCurrentlyPlayingResponseShape> */
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
     * Unix Millisecond Timestamp when data was fetched.
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
     *   type?: string|null,
     *   uri?: string|null,
     * } $context
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
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resumePoint?: ResumePointObject|null,
     * } $item
     */
    public static function with(
        Actions|array|null $actions = null,
        ContextObject|array|null $context = null,
        ?string $currentlyPlayingType = null,
        ?bool $isPlaying = null,
        TrackObject|array|EpisodeObject|null $item = null,
        ?int $progressMs = null,
        ?int $timestamp = null,
    ): self {
        $obj = new self;

        null !== $actions && $obj['actions'] = $actions;
        null !== $context && $obj['context'] = $context;
        null !== $currentlyPlayingType && $obj['currentlyPlayingType'] = $currentlyPlayingType;
        null !== $isPlaying && $obj['isPlaying'] = $isPlaying;
        null !== $item && $obj['item'] = $item;
        null !== $progressMs && $obj['progressMs'] = $progressMs;
        null !== $timestamp && $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * Allows to update the user interface based on which playback actions are available within the current context.
     *
     * @param Actions|array{
     *   interruptingPlayback?: bool|null,
     *   pausing?: bool|null,
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
        $obj = clone $this;
        $obj['actions'] = $actions;

        return $obj;
    }

    /**
     * A Context Object. Can be `null`.
     *
     * @param ContextObject|array{
     *   externalURLs?: ExternalURLObject|null,
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
        $obj['currentlyPlayingType'] = $currentlyPlayingType;

        return $obj;
    }

    /**
     * If something is currently playing, return `true`.
     */
    public function withIsPlaying(bool $isPlaying): self
    {
        $obj = clone $this;
        $obj['isPlaying'] = $isPlaying;

        return $obj;
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
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resumePoint?: ResumePointObject|null,
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
        $obj['progressMs'] = $progressMs;

        return $obj;
    }

    /**
     * Unix Millisecond Timestamp when data was fetched.
     */
    public function withTimestamp(int $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }
}
