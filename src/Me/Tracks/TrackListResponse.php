<?php

declare(strict_types=1);

namespace Spotted\Me\Tracks;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalIDObject;
use Spotted\ExternalURLObject;
use Spotted\LinkedTrackObject;
use Spotted\SimplifiedArtistObject;
use Spotted\TrackObject;
use Spotted\TrackObject\Album;
use Spotted\TrackObject\Type;
use Spotted\TrackRestrictionObject;

/**
 * @phpstan-type TrackListResponseShape = array{
 *   addedAt?: \DateTimeInterface|null, track?: TrackObject|null
 * }
 */
final class TrackListResponse implements BaseModel
{
    /** @use SdkModel<TrackListResponseShape> */
    use SdkModel;

    /**
     * The date and time the track was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    #[Optional('added_at')]
    public ?\DateTimeInterface $addedAt;

    /**
     * Information about the track.
     */
    #[Optional]
    public ?TrackObject $track;

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
     * } $track
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        TrackObject|array|null $track = null
    ): self {
        $self = new self;

        null !== $addedAt && $self['addedAt'] = $addedAt;
        null !== $track && $self['track'] = $track;

        return $self;
    }

    /**
     * The date and time the track was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $self = clone $this;
        $self['addedAt'] = $addedAt;

        return $self;
    }

    /**
     * Information about the track.
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
     * } $track
     */
    public function withTrack(TrackObject|array $track): self
    {
        $self = clone $this;
        $self['track'] = $track;

        return $self;
    }
}
