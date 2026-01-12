<?php

declare(strict_types=1);

namespace Spotted\Users\Playlists;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Create a playlist for a Spotify user. (The playlist will be empty until
 * you [add tracks](/documentation/web-api/reference/add-tracks-to-playlist).)
 * Each user is generally limited to a maximum of 11000 playlists.
 *
 * @see Spotted\Services\Users\PlaylistsService::create()
 *
 * @phpstan-type PlaylistCreateParamsShape = array{
 *   name: string,
 *   collaborative?: bool|null,
 *   description?: string|null,
 *   published?: bool|null,
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
    #[Required]
    public string $name;

    /**
     * Defaults to `false`. If `true` the playlist will be collaborative. _**Note**: to create a collaborative playlist you must also set `public` to `false`. To create collaborative playlists you must have granted `playlist-modify-private` and `playlist-modify-public` [scopes](/documentation/web-api/concepts/scopes/#list-of-scopes)._.
     */
    #[Optional]
    public ?bool $collaborative;

    /**
     * value for playlist description as displayed in Spotify Clients and in the Web API.
     */
    #[Optional]
    public ?string $description;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

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
        ?bool $published = null,
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $collaborative && $self['collaborative'] = $collaborative;
        null !== $description && $self['description'] = $description;
        null !== $published && $self['published'] = $published;

        return $self;
    }

    /**
     * The name for the new playlist, for example `"Your Coolest Playlist"`. This name does not need to be unique; a user may have several playlists with the same name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Defaults to `false`. If `true` the playlist will be collaborative. _**Note**: to create a collaborative playlist you must also set `public` to `false`. To create collaborative playlists you must have granted `playlist-modify-private` and `playlist-modify-public` [scopes](/documentation/web-api/concepts/scopes/#list-of-scopes)._.
     */
    public function withCollaborative(bool $collaborative): self
    {
        $self = clone $this;
        $self['collaborative'] = $collaborative;

        return $self;
    }

    /**
     * value for playlist description as displayed in Spotify Clients and in the Web API.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

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
