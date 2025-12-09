<?php

declare(strict_types=1);

namespace Spotted\Me\Albums;

use Spotted\AlbumRestrictionObject;
use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalIDObject;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\Me\Albums\AlbumListResponse\Album;
use Spotted\Me\Albums\AlbumListResponse\Album\AlbumType;
use Spotted\Me\Albums\AlbumListResponse\Album\ReleaseDatePrecision;
use Spotted\Me\Albums\AlbumListResponse\Album\Tracks;
use Spotted\SimplifiedArtistObject;

/**
 * @phpstan-type AlbumListResponseShape = array{
 *   addedAt?: \DateTimeInterface|null, album?: Album|null
 * }
 */
final class AlbumListResponse implements BaseModel
{
    /** @use SdkModel<AlbumListResponseShape> */
    use SdkModel;

    /**
     * The date and time the album was saved
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    #[Optional('added_at')]
    public ?\DateTimeInterface $addedAt;

    /**
     * Information about the album.
     */
    #[Optional]
    public ?Album $album;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Album|array{
     *   id: string,
     *   albumType: value-of<AlbumType>,
     *   availableMarkets: list<string>,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   images: list<ImageObject>,
     *   name: string,
     *   releaseDate: string,
     *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
     *   totalTracks: int,
     *   type?: 'album',
     *   uri: string,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   copyrights?: list<CopyrightObject>|null,
     *   externalIDs?: ExternalIDObject|null,
     *   genres?: list<string>|null,
     *   label?: string|null,
     *   popularity?: int|null,
     *   restrictions?: AlbumRestrictionObject|null,
     *   tracks?: Tracks|null,
     * } $album
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        Album|array|null $album = null
    ): self {
        $obj = new self;

        null !== $addedAt && $obj['addedAt'] = $addedAt;
        null !== $album && $obj['album'] = $album;

        return $obj;
    }

    /**
     * The date and time the album was saved
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj['addedAt'] = $addedAt;

        return $obj;
    }

    /**
     * Information about the album.
     *
     * @param Album|array{
     *   id: string,
     *   albumType: value-of<AlbumType>,
     *   availableMarkets: list<string>,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   images: list<ImageObject>,
     *   name: string,
     *   releaseDate: string,
     *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
     *   totalTracks: int,
     *   type?: 'album',
     *   uri: string,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   copyrights?: list<CopyrightObject>|null,
     *   externalIDs?: ExternalIDObject|null,
     *   genres?: list<string>|null,
     *   label?: string|null,
     *   popularity?: int|null,
     *   restrictions?: AlbumRestrictionObject|null,
     *   tracks?: Tracks|null,
     * } $album
     */
    public function withAlbum(Album|array $album): self
    {
        $obj = clone $this;
        $obj['album'] = $album;

        return $obj;
    }
}
