<?php

declare(strict_types=1);

namespace Spotted\Me\Player\Queue;

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
use Spotted\Me\Player\Queue\QueueGetResponse\CurrentlyPlaying;
use Spotted\Me\Player\Queue\QueueGetResponse\Queue;
use Spotted\ResumePointObject;
use Spotted\ShowBase;
use Spotted\SimplifiedArtistObject;
use Spotted\TrackObject;
use Spotted\TrackObject\Album;
use Spotted\TrackObject\Type;
use Spotted\TrackRestrictionObject;

/**
 * @phpstan-type QueueGetResponseShape = array{
 *   currentlyPlaying?: null|TrackObject|EpisodeObject,
 *   queue?: list<TrackObject|EpisodeObject>|null,
 * }
 */
final class QueueGetResponse implements BaseModel
{
    /** @use SdkModel<QueueGetResponseShape> */
    use SdkModel;

    /**
     * The currently playing track or episode. Can be `null`.
     */
    #[Optional('currently_playing', union: CurrentlyPlaying::class)]
    public TrackObject|EpisodeObject|null $currentlyPlaying;

    /**
     * The tracks or episodes in the queue. Can be empty.
     *
     * @var list<TrackObject|EpisodeObject>|null $queue
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
     * } $currentlyPlaying
     * @param list<TrackObject|array{
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
     * }> $queue
     */
    public static function with(
        TrackObject|array|EpisodeObject|null $currentlyPlaying = null,
        ?array $queue = null,
    ): self {
        $obj = new self;

        null !== $currentlyPlaying && $obj['currentlyPlaying'] = $currentlyPlaying;
        null !== $queue && $obj['queue'] = $queue;

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
     * } $currentlyPlaying
     */
    public function withCurrentlyPlaying(
        TrackObject|array|EpisodeObject $currentlyPlaying
    ): self {
        $obj = clone $this;
        $obj['currentlyPlaying'] = $currentlyPlaying;

        return $obj;
    }

    /**
     * The tracks or episodes in the queue. Can be empty.
     *
     * @param list<TrackObject|array{
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
     * }> $queue
     */
    public function withQueue(array $queue): self
    {
        $obj = clone $this;
        $obj['queue'] = $queue;

        return $obj;
    }
}
