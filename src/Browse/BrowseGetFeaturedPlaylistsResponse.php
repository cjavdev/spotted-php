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
 *   message?: string|null,
 *   playlists?: PagingPlaylistObject|null,
 *   published?: bool|null,
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

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

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
     *   published?: bool|null,
     * } $playlists
     */
    public static function with(
        ?string $message = null,
        PagingPlaylistObject|array|null $playlists = null,
        ?bool $published = null,
    ): self {
        $self = new self;

        null !== $message && $self['message'] = $message;
        null !== $playlists && $self['playlists'] = $playlists;
        null !== $published && $self['published'] = $published;

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
     *   published?: bool|null,
     * } $playlists
     */
    public function withPlaylists(PagingPlaylistObject|array $playlists): self
    {
        $self = clone $this;
        $self['playlists'] = $playlists;

        return $self;
    }

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }
}
