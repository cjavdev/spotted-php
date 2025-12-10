<?php

declare(strict_types=1);

namespace Spotted\Browse;

use Spotted\Core\Attributes\Optional;
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
    #[Optional]
    public ?string $message;

    #[Optional]
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
        $self = new self;

        null !== $message && $self['message'] = $message;
        null !== $playlists && $self['playlists'] = $playlists;

        return $self;
    }

    /**
     * The localized message of a playlist.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
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
        $self = clone $this;
        $self['playlists'] = $playlists;

        return $self;
    }
}
