<?php

declare(strict_types=1);

namespace Spotted\Albums;

use Spotted\Albums\AlbumListResponse\Album;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type album_list_response = array{albums: list<Album>}
 */
final class AlbumListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<album_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Album> $albums */
    #[Api(list: Album::class)]
    public array $albums;

    /**
     * `new AlbumListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AlbumListResponse::with(albums: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AlbumListResponse)->withAlbums(...)
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
     * @param list<Album> $albums
     */
    public static function with(array $albums): self
    {
        $obj = new self;

        $obj->albums = $albums;

        return $obj;
    }

    /**
     * @param list<Album> $albums
     */
    public function withAlbums(array $albums): self
    {
        $obj = clone $this;
        $obj->albums = $albums;

        return $obj;
    }
}
