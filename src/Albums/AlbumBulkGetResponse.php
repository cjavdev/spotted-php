<?php

declare(strict_types=1);

namespace Spotted\Albums;

use Spotted\Albums\AlbumBulkGetResponse\Album;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AlbumShape from \Spotted\Albums\AlbumBulkGetResponse\Album
 *
 * @phpstan-type AlbumBulkGetResponseShape = array{albums: list<AlbumShape>}
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
     * @param list<AlbumShape> $albums
     */
    public static function with(array $albums): self
    {
        $self = new self;

        $self['albums'] = $albums;

        return $self;
    }

    /**
     * @param list<AlbumShape> $albums
     */
    public function withAlbums(array $albums): self
    {
        $self = clone $this;
        $self['albums'] = $albums;

        return $self;
    }
}
