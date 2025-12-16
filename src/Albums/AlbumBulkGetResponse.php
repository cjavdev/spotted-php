<?php

declare(strict_types=1);

namespace Spotted\Albums;

use Spotted\AlbumRestrictionObject;
use Spotted\Albums\AlbumBulkGetResponse\Album;
use Spotted\Albums\AlbumBulkGetResponse\Album\AlbumType;
use Spotted\Albums\AlbumBulkGetResponse\Album\ReleaseDatePrecision;
use Spotted\Albums\AlbumBulkGetResponse\Album\Tracks;
use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalIDObject;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\SimplifiedArtistObject;

/**
 * @phpstan-type AlbumBulkGetResponseShape = array{albums: list<Album>}
 */
final class AlbumBulkGetResponse implements BaseModel
{
    /** @use SdkModel<AlbumBulkGetResponseShape> */
    use SdkModel;

    /** @var list<Album> $albums */
    #[Required(list: Album::class)]
    public array $albums;

    /**
     * `new AlbumBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AlbumBulkGetResponse::with(albums: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AlbumBulkGetResponse)->withAlbums(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Album|array{
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
     *   published?: bool|null,
     *   restrictions?: AlbumRestrictionObject|null,
     *   tracks?: Tracks|null,
     * }> $albums
     */
    public static function with(array $albums): self
    {
        $self = new self;

        $self['albums'] = $albums;

        return $self;
    }

    /**
     * @param list<Album|array{
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
     *   published?: bool|null,
     *   restrictions?: AlbumRestrictionObject|null,
     *   tracks?: Tracks|null,
     * }> $albums
     */
    public function withAlbums(array $albums): self
    {
        $self = clone $this;
        $self['albums'] = $albums;

        return $self;
    }
}
