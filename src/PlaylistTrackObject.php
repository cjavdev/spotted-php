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
 *   addedAt?: \DateTimeInterface|null,
 *   addedBy?: PlaylistUserObject|null,
 *   isLocal?: bool|null,
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
    #[Optional('added_at')]
    public ?\DateTimeInterface $addedAt;

    /**
     * The Spotify user who added the track or episode. _**Note**: some very old playlists may return `null` in this field._.
     */
    #[Optional('added_by')]
    public ?PlaylistUserObject $addedBy;

    /**
     * Whether this track or episode is a [local file](/documentation/web-api/concepts/playlists/#local-files) or not.
     */
    #[Optional('is_local')]
    public ?bool $isLocal;

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
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * } $addedBy
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
     *   type?: value-of<TrackObject\Type>|null,
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
     * } $track
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        PlaylistUserObject|array|null $addedBy = null,
        ?bool $isLocal = null,
        TrackObject|array|EpisodeObject|null $track = null,
    ): self {
        $self = new self;

        null !== $addedAt && $self['addedAt'] = $addedAt;
        null !== $addedBy && $self['addedBy'] = $addedBy;
        null !== $isLocal && $self['isLocal'] = $isLocal;
        null !== $track && $self['track'] = $track;

        return $self;
    }

    /**
     * The date and time the track or episode was added. _**Note**: some very old playlists may return `null` in this field._.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $self = clone $this;
        $self['addedAt'] = $addedAt;

        return $self;
    }

    /**
     * The Spotify user who added the track or episode. _**Note**: some very old playlists may return `null` in this field._.
     *
     * @param PlaylistUserObject|array{
     *   id?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * } $addedBy
     */
    public function withAddedBy(PlaylistUserObject|array $addedBy): self
    {
        $self = clone $this;
        $self['addedBy'] = $addedBy;

        return $self;
    }

    /**
     * Whether this track or episode is a [local file](/documentation/web-api/concepts/playlists/#local-files) or not.
     */
    public function withIsLocal(bool $isLocal): self
    {
        $self = clone $this;
        $self['isLocal'] = $isLocal;

        return $self;
    }

    /**
     * Information about the track or episode.
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
     *   type?: value-of<TrackObject\Type>|null,
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
     * } $track
     */
    public function withTrack(TrackObject|array|EpisodeObject $track): self
    {
        $self = clone $this;
        $self['track'] = $track;

        return $self;
    }
}
