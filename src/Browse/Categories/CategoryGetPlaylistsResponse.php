<?php

declare(strict_types=1);

namespace Spotted\Browse\Categories;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\PagingPlaylistObject;

/**
 * @phpstan-type CategoryGetPlaylistsResponseShape = array{
 *   message?: string, playlists?: PagingPlaylistObject
 * }
 */
final class CategoryGetPlaylistsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CategoryGetPlaylistsResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The localized message of a playlist.
     */
    #[Api(optional: true)]
    public ?string $message;

    #[Api(optional: true)]
    public ?PagingPlaylistObject $playlists;

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
        ?string $message = null,
        ?PagingPlaylistObject $playlists = null
    ): self {
        $obj = new self;

        null !== $message && $obj->message = $message;
        null !== $playlists && $obj->playlists = $playlists;

        return $obj;
    }

    /**
     * The localized message of a playlist.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    public function withPlaylists(PagingPlaylistObject $playlists): self
    {
        $obj = clone $this;
        $obj->playlists = $playlists;

        return $obj;
    }
}
