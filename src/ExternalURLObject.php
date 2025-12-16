<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalURLObjectShape = array{
 *   published?: bool|null, spotify?: string|null
 * }
 */
final class ExternalURLObject implements BaseModel
{
    /** @use SdkModel<ExternalURLObjectShape> */
    use SdkModel;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * The [Spotify URL](/documentation/web-api/concepts/spotify-uris-ids) for the object.
     */
    #[Optional]
    public ?string $spotify;

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
        ?bool $published = null,
        ?string $spotify = null
    ): self {
        $self = new self;

        null !== $published && $self['published'] = $published;
        null !== $spotify && $self['spotify'] = $spotify;

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
     * The [Spotify URL](/documentation/web-api/concepts/spotify-uris-ids) for the object.
     */
    public function withSpotify(string $spotify): self
    {
        $self = clone $this;
        $self['spotify'] = $spotify;

        return $self;
    }
}
