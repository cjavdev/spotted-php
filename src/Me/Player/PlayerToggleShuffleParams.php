<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Toggle shuffle on or off for user’s playback. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
 *
 * @see Spotted\Services\Me\PlayerService::toggleShuffle()
 *
 * @phpstan-type PlayerToggleShuffleParamsShape = array{
 *   state: bool, device_id?: string
 * }
 */
final class PlayerToggleShuffleParams implements BaseModel
{
    /** @use SdkModel<PlayerToggleShuffleParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * **true** : Shuffle user's playback.<br/>
     * **false** : Do not shuffle user's playback.
     */
    #[Api]
    public bool $state;

    /**
     * The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     */
    #[Api(optional: true)]
    public ?string $device_id;

    /**
     * `new PlayerToggleShuffleParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlayerToggleShuffleParams::with(state: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlayerToggleShuffleParams)->withState(...)
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
    public static function with(bool $state, ?string $device_id = null): self
    {
        $obj = new self;

        $obj->state = $state;

        null !== $device_id && $obj->device_id = $device_id;

        return $obj;
    }

    /**
     * **true** : Shuffle user's playback.<br/>
     * **false** : Do not shuffle user's playback.
     */
    public function withState(bool $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     */
    public function withDeviceID(string $deviceID): self
    {
        $obj = clone $this;
        $obj->device_id = $deviceID;

        return $obj;
    }
}
