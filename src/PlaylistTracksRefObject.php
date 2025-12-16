<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type PlaylistTracksRefObjectShape = array{
 *   href?: string|null, published?: bool|null, total?: int|null
 * }
 */
final class PlaylistTracksRefObject implements BaseModel
{
    /** @use SdkModel<PlaylistTracksRefObjectShape> */
    use SdkModel;

    /**
     * A link to the Web API endpoint where full details of the playlist's tracks can be retrieved.
     */
    #[Optional]
    public ?string $href;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * Number of tracks in the playlist.
     */
    #[Optional]
    public ?int $total;

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
        ?string $href = null,
        ?bool $published = null,
        ?int $total = null
    ): self {
        $self = new self;

        null !== $href && $self['href'] = $href;
        null !== $published && $self['published'] = $published;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * A link to the Web API endpoint where full details of the playlist's tracks can be retrieved.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

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

    /**
     * Number of tracks in the playlist.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
