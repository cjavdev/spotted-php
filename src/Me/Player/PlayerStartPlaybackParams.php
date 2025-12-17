<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Start a new context or resume current playback on the user's active device. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
 *
 * @see Spotted\Services\Me\PlayerService::startPlayback()
 *
 * @phpstan-type PlayerStartPlaybackParamsShape = array{
 *   deviceID?: string|null,
 *   contextUri?: string|null,
 *   offset?: array<string,mixed>|null,
 *   positionMs?: int|null,
 *   published?: bool|null,
 *   uris?: list<string>|null,
 * }
 */
final class PlayerStartPlaybackParams implements BaseModel
{
    /** @use SdkModel<PlayerStartPlaybackParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     */
    #[Optional]
    public ?string $deviceID;

    /**
     * Optional. Spotify URI of the context to play.
     * Valid contexts are albums, artists & playlists.
     * `{context_uri:"spotify:album:1Je1IMUlBXcx1Fz0WE7oPT"}`.
     */
    #[Optional('context_uri')]
    public ?string $contextUri;

    /**
     * Optional. Indicates from where in the context playback should start. Only available when context_uri corresponds to an album or playlist object
     * "position" is zero based and can’t be negative. Example: `"offset": {"position": 5}`
     * "uri" is a string representing the uri of the item to start at. Example: `"offset": {"uri": "spotify:track:1301WleyT98MSxVHPZCA6M"}`.
     *
     * @var array<string,mixed>|null $offset
     */
    #[Optional(map: 'mixed')]
    public ?array $offset;

    /**
     * Indicates from what position to start playback. Must be a positive number. Passing in a position that is greater than the length of the track will cause the player to start playing the next song.
     */
    #[Optional('position_ms')]
    public ?int $positionMs;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * Optional. A JSON array of the Spotify track URIs to play.
     * For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh", "spotify:track:1301WleyT98MSxVHPZCA6M"]}`.
     *
     * @var list<string>|null $uris
     */
    #[Optional(list: 'string')]
    public ?array $uris;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed> $offset
     * @param list<string> $uris
     */
    public static function with(
        ?string $deviceID = null,
        ?string $contextUri = null,
        ?array $offset = null,
        ?int $positionMs = null,
        ?bool $published = null,
        ?array $uris = null,
    ): self {
        $self = new self;

        null !== $deviceID && $self['deviceID'] = $deviceID;
        null !== $contextUri && $self['contextUri'] = $contextUri;
        null !== $offset && $self['offset'] = $offset;
        null !== $positionMs && $self['positionMs'] = $positionMs;
        null !== $published && $self['published'] = $published;
        null !== $uris && $self['uris'] = $uris;

        return $self;
    }

    /**
     * The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     */
    public function withDeviceID(string $deviceID): self
    {
        $self = clone $this;
        $self['deviceID'] = $deviceID;

        return $self;
    }

    /**
     * Optional. Spotify URI of the context to play.
     * Valid contexts are albums, artists & playlists.
     * `{context_uri:"spotify:album:1Je1IMUlBXcx1Fz0WE7oPT"}`.
     */
    public function withContextUri(string $contextUri): self
    {
        $self = clone $this;
        $self['contextUri'] = $contextUri;

        return $self;
    }

    /**
     * Optional. Indicates from where in the context playback should start. Only available when context_uri corresponds to an album or playlist object
     * "position" is zero based and can’t be negative. Example: `"offset": {"position": 5}`
     * "uri" is a string representing the uri of the item to start at. Example: `"offset": {"uri": "spotify:track:1301WleyT98MSxVHPZCA6M"}`.
     *
     * @param array<string,mixed> $offset
     */
    public function withOffset(array $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Indicates from what position to start playback. Must be a positive number. Passing in a position that is greater than the length of the track will cause the player to start playing the next song.
     */
    public function withPositionMs(int $positionMs): self
    {
        $self = clone $this;
        $self['positionMs'] = $positionMs;

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
     * Optional. A JSON array of the Spotify track URIs to play.
     * For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh", "spotify:track:1301WleyT98MSxVHPZCA6M"]}`.
     *
     * @param list<string> $uris
     */
    public function withUris(array $uris): self
    {
        $self = clone $this;
        $self['uris'] = $uris;

        return $self;
    }
}
