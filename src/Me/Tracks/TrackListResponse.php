<?php

declare(strict_types=1);

namespace Spotted\Me\Tracks;

use Spotted\Core\Attributes\Api;
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
 *   added_at?: \DateTimeInterface|null, track?: TrackObject|null
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
    #[Api(optional: true)]
    public ?\DateTimeInterface $added_at;

    /**
     * Information about the track.
     */
    #[Api(optional: true)]
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
     * } $track
     */
    public static function with(
        ?\DateTimeInterface $added_at = null,
        TrackObject|array|null $track = null
    ): self {
        $obj = new self;

        null !== $added_at && $obj['added_at'] = $added_at;
        null !== $track && $obj['track'] = $track;

        return $obj;
    }

    /**
     * The date and time the track was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj['added_at'] = $addedAt;

        return $obj;
    }

    /**
     * Information about the track.
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
     * } $track
     */
    public function withTrack(TrackObject|array $track): self
    {
        $obj = clone $this;
        $obj['track'] = $track;

        return $obj;
    }
}
