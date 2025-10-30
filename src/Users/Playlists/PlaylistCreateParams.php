<?php

declare(strict_types=1);

namespace Spotted\Users\Playlists;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Create a playlist for a Spotify user. (The playlist will be empty until
 * you [add tracks](/documentation/web-api/reference/add-tracks-to-playlist).)
 * Each user is generally limited to a maximum of 11000 playlists.
 *
 * @see Spotted\Users\Playlists->create
 *
 * @phpstan-type PlaylistCreateParamsShape = array{
 *   name: string, collaborative?: bool, description?: string, public?: bool
 * }
 */
final class PlaylistCreateParams implements BaseModel
{
    /** @use SdkModel<PlaylistCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name for the new playlist, for example `"Your Coolest Playlist"`. This name does not need to be unique; a user may have several playlists with the same name.
     */
    #[Api]
    public string $name;

    /**
     * Defaults to `false`. If `true` the playlist will be collaborative. _**Note**: to create a collaborative playlist you must also set `public` to `false`. To create collaborative playlists you must have granted `playlist-modify-private` and `playlist-modify-public` [scopes](/documentation/web-api/concepts/scopes/#list-of-scopes)._.
     */
    #[Api(optional: true)]
    public ?bool $collaborative;

    /**
     * value for playlist description as displayed in Spotify Clients and in the Web API.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Defaults to `true`. The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private. To be able to create private playlists, the user must have granted the `playlist-modify-private` [scope](/documentation/web-api/concepts/scopes/#list-of-scopes). For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Api(optional: true)]
    public ?bool $public;

    /**
     * `new PlaylistCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlaylistCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlaylistCreateParams)->withName(...)
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
     */
    public static function with(
        string $name,
        ?bool $collaborative = null,
        ?string $description = null,
        ?bool $public = null,
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $collaborative && $obj->collaborative = $collaborative;
        null !== $description && $obj->description = $description;
        null !== $public && $obj->public = $public;

        return $obj;
    }

    /**
     * The name for the new playlist, for example `"Your Coolest Playlist"`. This name does not need to be unique; a user may have several playlists with the same name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Defaults to `false`. If `true` the playlist will be collaborative. _**Note**: to create a collaborative playlist you must also set `public` to `false`. To create collaborative playlists you must have granted `playlist-modify-private` and `playlist-modify-public` [scopes](/documentation/web-api/concepts/scopes/#list-of-scopes)._.
     */
    public function withCollaborative(bool $collaborative): self
    {
        $obj = clone $this;
        $obj->collaborative = $collaborative;

        return $obj;
    }

    /**
     * value for playlist description as displayed in Spotify Clients and in the Web API.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Defaults to `true`. The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private. To be able to create private playlists, the user must have granted the `playlist-modify-private` [scope](/documentation/web-api/concepts/scopes/#list-of-scopes). For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublic(bool $public): self
    {
        $obj = clone $this;
        $obj->public = $public;

        return $obj;
    }
}
