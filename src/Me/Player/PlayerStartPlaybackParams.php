<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Start a new context or resume current playback on the user's active device. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
 *
 * @see Spotted\Me\Player->startPlayback
 *
 * @phpstan-type player_start_playback_params = array{
 *   deviceID?: string,
 *   contextUri?: string,
 *   offset?: array<string, mixed>,
 *   positionMs?: int,
 *   uris?: list<string>,
 * }
 */
final class PlayerStartPlaybackParams implements BaseModel
{
    /** @use SdkModel<player_start_playback_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     */
    #[Api(optional: true)]
    public ?string $deviceID;

    /**
     * Optional. Spotify URI of the context to play.
     * Valid contexts are albums, artists & playlists.
     * `{context_uri:"spotify:album:1Je1IMUlBXcx1Fz0WE7oPT"}`.
     */
    #[Api('context_uri', optional: true)]
    public ?string $contextUri;

    /**
     * Optional. Indicates from where in the context playback should start. Only available when context_uri corresponds to an album or playlist object
     * "position" is zero based and can’t be negative. Example: `"offset": {"position": 5}`
     * "uri" is a string representing the uri of the item to start at. Example: `"offset": {"uri": "spotify:track:1301WleyT98MSxVHPZCA6M"}`.
     *
     * @var array<string, mixed>|null $offset
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $offset;

    /**
     * Indicates from what position to start playback. Must be a positive number. Passing in a position that is greater than the length of the track will cause the player to start playing the next song.
     */
    #[Api('position_ms', optional: true)]
    public ?int $positionMs;

    /**
     * Optional. A JSON array of the Spotify track URIs to play.
     * For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh", "spotify:track:1301WleyT98MSxVHPZCA6M"]}`.
     *
     * @var list<string>|null $uris
     */
    #[Api(list: 'string', optional: true)]
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
     * @param array<string, mixed> $offset
     * @param list<string> $uris
     */
    public static function with(
        ?string $deviceID = null,
        ?string $contextUri = null,
        ?array $offset = null,
        ?int $positionMs = null,
        ?array $uris = null,
    ): self {
        $obj = new self;

        null !== $deviceID && $obj->deviceID = $deviceID;
        null !== $contextUri && $obj->contextUri = $contextUri;
        null !== $offset && $obj->offset = $offset;
        null !== $positionMs && $obj->positionMs = $positionMs;
        null !== $uris && $obj->uris = $uris;

        return $obj;
    }

    /**
     * The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     */
    public function withDeviceID(string $deviceID): self
    {
        $obj = clone $this;
        $obj->deviceID = $deviceID;

        return $obj;
    }

    /**
     * Optional. Spotify URI of the context to play.
     * Valid contexts are albums, artists & playlists.
     * `{context_uri:"spotify:album:1Je1IMUlBXcx1Fz0WE7oPT"}`.
     */
    public function withContextUri(string $contextUri): self
    {
        $obj = clone $this;
        $obj->contextUri = $contextUri;

        return $obj;
    }

    /**
     * Optional. Indicates from where in the context playback should start. Only available when context_uri corresponds to an album or playlist object
     * "position" is zero based and can’t be negative. Example: `"offset": {"position": 5}`
     * "uri" is a string representing the uri of the item to start at. Example: `"offset": {"uri": "spotify:track:1301WleyT98MSxVHPZCA6M"}`.
     *
     * @param array<string, mixed> $offset
     */
    public function withOffset(array $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }

    /**
     * Indicates from what position to start playback. Must be a positive number. Passing in a position that is greater than the length of the track will cause the player to start playing the next song.
     */
    public function withPositionMs(int $positionMs): self
    {
        $obj = clone $this;
        $obj->positionMs = $positionMs;

        return $obj;
    }

    /**
     * Optional. A JSON array of the Spotify track URIs to play.
     * For example: `{"uris": ["spotify:track:4iV5W9uYEdYUVa79Axb7Rh", "spotify:track:1301WleyT98MSxVHPZCA6M"]}`.
     *
     * @param list<string> $uris
     */
    public function withUris(array $uris): self
    {
        $obj = clone $this;
        $obj->uris = $uris;

        return $obj;
    }
}
