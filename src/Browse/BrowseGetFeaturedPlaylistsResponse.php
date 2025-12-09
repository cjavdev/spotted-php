<?php

declare(strict_types=1);

namespace Spotted\Browse;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\PagingPlaylistObject;
use Spotted\SimplifiedPlaylistObject;

/**
 * @phpstan-type BrowseGetFeaturedPlaylistsResponseShape = array{
 *   message?: string|null, playlists?: PagingPlaylistObject|null
 * }
 */
final class BrowseGetFeaturedPlaylistsResponse implements BaseModel
{
    /** @use SdkModel<BrowseGetFeaturedPlaylistsResponseShape> */
    use SdkModel;

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
     *
     * @param PagingPlaylistObject|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<SimplifiedPlaylistObject>|null,
     * } $playlists
     */
    public static function with(
        ?string $message = null,
        PagingPlaylistObject|array|null $playlists = null
    ): self {
        $obj = new self;

        null !== $message && $obj['message'] = $message;
        null !== $playlists && $obj['playlists'] = $playlists;

        return $obj;
    }

    /**
     * The localized message of a playlist.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj['message'] = $message;

        return $obj;
    }

    /**
     * @param PagingPlaylistObject|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<SimplifiedPlaylistObject>|null,
     * } $playlists
     */
    public function withPlaylists(PagingPlaylistObject|array $playlists): self
    {
        $obj = clone $this;
        $obj['playlists'] = $playlists;

        return $obj;
    }
}
