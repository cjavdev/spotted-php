<?php

declare(strict_types=1);

namespace Spotted\Me\Albums;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\Me\Albums\AlbumListResponse\Album;

/**
 * @phpstan-type album_list_response = array{
 *   addedAt?: \DateTimeInterface, album?: Album
 * }
 */
final class AlbumListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<album_list_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * The date and time the album was saved
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    #[Api('added_at', optional: true)]
    public ?\DateTimeInterface $addedAt;

    /**
     * Information about the album.
     */
    #[Api(optional: true)]
    public ?Album $album;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        ?Album $album = null
    ): self {
        $obj = new self;

        null !== $addedAt && $obj->addedAt = $addedAt;
        null !== $album && $obj->album = $album;

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
        $obj->addedAt = $addedAt;

        return $obj;
    }

    /**
     * Information about the album.
     */
    public function withAlbum(Album $album): self
    {
        $obj = clone $this;
        $obj->album = $album;

        return $obj;
    }
}
