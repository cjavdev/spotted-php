<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\EpisodeObject\ReleaseDatePrecision;
use Spotted\PlaylistTrackObject\Track;
use Spotted\PlaylistUserObject\Type;
use Spotted\TrackObject\Album;

/**
 * @phpstan-type PlaylistTrackObjectShape = array{
 *   added_at?: \DateTimeInterface|null,
 *   added_by?: PlaylistUserObject|null,
 *   is_local?: bool|null,
 *   track?: null|TrackObject|EpisodeObject,
 * }
 */
final class PlaylistTrackObject implements BaseModel
{
    /** @use SdkModel<PlaylistTrackObjectShape> */
    use SdkModel;

    /**
     * The date and time the track or episode was added. _**Note**: some very old playlists may return `null` in this field._.
     */
    #[Optional]
    public ?\DateTimeInterface $added_at;

    /**
     * The Spotify user who added the track or episode. _**Note**: some very old playlists may return `null` in this field._.
     */
    #[Optional]
    public ?PlaylistUserObject $added_by;

    /**
     * Whether this track or episode is a [local file](/documentation/web-api/concepts/playlists/#local-files) or not.
     */
    #[Optional]
    public ?bool $is_local;

    /**
     * Information about the track or episode.
     */
    #[Optional(union: Track::class)]
    public TrackObject|EpisodeObject|null $track;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PlaylistUserObject|array{
     *   id?: string|null,
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * } $added_by
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
     *   type?: value-of<TrackObject\Type>|null,
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
     * } $track
     */
    public static function with(
        ?\DateTimeInterface $added_at = null,
        PlaylistUserObject|array|null $added_by = null,
        ?bool $is_local = null,
        TrackObject|array|EpisodeObject|null $track = null,
    ): self {
        $obj = new self;

        null !== $added_at && $obj['added_at'] = $added_at;
        null !== $added_by && $obj['added_by'] = $added_by;
        null !== $is_local && $obj['is_local'] = $is_local;
        null !== $track && $obj['track'] = $track;

        return $obj;
    }

    /**
     * The date and time the track or episode was added. _**Note**: some very old playlists may return `null` in this field._.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj['added_at'] = $addedAt;

        return $obj;
    }

    /**
     * The Spotify user who added the track or episode. _**Note**: some very old playlists may return `null` in this field._.
     *
     * @param PlaylistUserObject|array{
     *   id?: string|null,
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * } $addedBy
     */
    public function withAddedBy(PlaylistUserObject|array $addedBy): self
    {
        $obj = clone $this;
        $obj['added_by'] = $addedBy;

        return $obj;
    }

    /**
     * Whether this track or episode is a [local file](/documentation/web-api/concepts/playlists/#local-files) or not.
     */
    public function withIsLocal(bool $isLocal): self
    {
        $obj = clone $this;
        $obj['is_local'] = $isLocal;

        return $obj;
    }

    /**
     * Information about the track or episode.
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
     *   type?: value-of<TrackObject\Type>|null,
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
     * } $track
     */
    public function withTrack(TrackObject|array|EpisodeObject $track): self
    {
        $obj = clone $this;
        $obj['track'] = $track;

        return $obj;
    }
}
