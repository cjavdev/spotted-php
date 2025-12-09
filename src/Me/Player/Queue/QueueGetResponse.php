<?php

declare(strict_types=1);

namespace Spotted\Me\Player\Queue;

use Spotted\Core\Attributes\Api;
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
 *   currently_playing?: null|TrackObject|EpisodeObject,
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
    #[Api(union: CurrentlyPlaying::class, optional: true)]
    public TrackObject|EpisodeObject|null $currently_playing;

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
     * } $currently_playing
     * @param list<TrackObject|array{
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
     * }> $queue
     */
    public static function with(
        TrackObject|array|EpisodeObject|null $currently_playing = null,
        ?array $queue = null,
    ): self {
        $obj = new self;

        null !== $currently_playing && $obj['currently_playing'] = $currently_playing;
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
     * } $currentlyPlaying
     */
    public function withCurrentlyPlaying(
        TrackObject|array|EpisodeObject $currentlyPlaying
    ): self {
        $obj = clone $this;
        $obj['currently_playing'] = $currentlyPlaying;

        return $obj;
    }

    /**
     * The tracks or episodes in the queue. Can be empty.
     *
     * @param list<TrackObject|array{
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
     * }> $queue
     */
    public function withQueue(array $queue): self
    {
        $obj = clone $this;
        $obj['queue'] = $queue;

        return $obj;
    }
}
