<?php

declare(strict_types=1);

namespace Spotted\Playlists;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Change a playlist's name and public/private state. (The user must, of
 * course, own the playlist.).
 *
 * @see Spotted\Services\PlaylistsService::update()
 *
 * @phpstan-type PlaylistUpdateParamsShape = array{
 *   collaborative?: bool, description?: string, name?: string, public?: bool
 * }
 */
final class PlaylistUpdateParams implements BaseModel
{
    /** @use SdkModel<PlaylistUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * If `true`, the playlist will become collaborative and other users will be able to modify the playlist in their Spotify client. <br/>
     * _**Note**: You can only set `collaborative` to `true` on non-public playlists._.
     */
    #[Optional]
    public ?bool $collaborative;

    /**
     * Value for playlist description as displayed in Spotify Clients and in the Web API.
     */
    #[Optional]
    public ?string $description;

    /**
     * The new name for the playlist, for example `"My New Playlist Title"`.
     */
    #[Optional]
    public ?string $name;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $public;

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
        ?bool $collaborative = null,
        ?string $description = null,
        ?string $name = null,
        ?bool $public = null,
    ): self {
        $obj = new self;

        null !== $collaborative && $obj['collaborative'] = $collaborative;
        null !== $description && $obj['description'] = $description;
        null !== $name && $obj['name'] = $name;
        null !== $public && $obj['public'] = $public;

        return $obj;
    }

    /**
     * If `true`, the playlist will become collaborative and other users will be able to modify the playlist in their Spotify client. <br/>
     * _**Note**: You can only set `collaborative` to `true` on non-public playlists._.
     */
    public function withCollaborative(bool $collaborative): self
    {
        $obj = clone $this;
        $obj['collaborative'] = $collaborative;

        return $obj;
    }

    /**
     * Value for playlist description as displayed in Spotify Clients and in the Web API.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * The new name for the playlist, for example `"My New Playlist Title"`.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublic(bool $public): self
    {
        $obj = clone $this;
        $obj['public'] = $public;

        return $obj;
    }
}
