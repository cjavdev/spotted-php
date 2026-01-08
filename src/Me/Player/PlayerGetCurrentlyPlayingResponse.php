<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\EpisodeObject;
use Spotted\Me\Player\PlayerGetCurrentlyPlayingResponse\Actions;
use Spotted\Me\Player\PlayerGetCurrentlyPlayingResponse\Item;
use Spotted\TrackObject;

/**
 * @phpstan-import-type ItemVariants from \Spotted\Me\Player\PlayerGetCurrentlyPlayingResponse\Item
 * @phpstan-import-type ActionsShape from \Spotted\Me\Player\PlayerGetCurrentlyPlayingResponse\Actions
 * @phpstan-import-type ContextObjectShape from \Spotted\Me\Player\ContextObject
 * @phpstan-import-type ItemShape from \Spotted\Me\Player\PlayerGetCurrentlyPlayingResponse\Item
 *
 * @phpstan-type PlayerGetCurrentlyPlayingResponseShape = array{
 *   actions?: null|Actions|ActionsShape,
 *   context?: null|ContextObject|ContextObjectShape,
 *   currentlyPlayingType?: string|null,
 *   isPlaying?: bool|null,
 *   item?: ItemShape|null,
 *   progressMs?: int|null,
 *   published?: bool|null,
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
     *
     * @var ItemVariants|null $item
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
     * @param Actions|ActionsShape|null $actions
     * @param ContextObject|ContextObjectShape|null $context
     * @param ItemShape|null $item
     */
    public static function with(
        Actions|array|null $actions = null,
        ContextObject|array|null $context = null,
        ?string $currentlyPlayingType = null,
        ?bool $isPlaying = null,
        TrackObject|array|EpisodeObject|null $item = null,
        ?int $progressMs = null,
        ?bool $published = null,
        ?int $timestamp = null,
    ): self {
        $self = new self;

        null !== $actions && $self['actions'] = $actions;
        null !== $context && $self['context'] = $context;
        null !== $currentlyPlayingType && $self['currentlyPlayingType'] = $currentlyPlayingType;
        null !== $isPlaying && $self['isPlaying'] = $isPlaying;
        null !== $item && $self['item'] = $item;
        null !== $progressMs && $self['progressMs'] = $progressMs;
        null !== $published && $self['published'] = $published;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Allows to update the user interface based on which playback actions are available within the current context.
     *
     * @param Actions|ActionsShape $actions
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
     * @param ContextObject|ContextObjectShape $context
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
     * @param ItemShape $item
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
     * Unix Millisecond Timestamp when data was fetched.
     */
    public function withTimestamp(int $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
