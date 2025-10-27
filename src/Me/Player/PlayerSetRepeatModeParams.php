<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Set the repeat mode for the user's playback. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
 *
 * @see Spotted\Me\Player->setRepeatMode
 *
 * @phpstan-type player_set_repeat_mode_params = array{
 *   state: string, deviceID?: string
 * }
 */
final class PlayerSetRepeatModeParams implements BaseModel
{
    /** @use SdkModel<player_set_repeat_mode_params> */
    use SdkModel;
    use SdkParams;

    /**
     * **track**, **context** or **off**.<br/>
     * **track** will repeat the current track.<br/>
     * **context** will repeat the current context.<br/>
     * **off** will turn repeat off.
     */
    #[Api]
    public string $state;

    /**
     * The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     */
    #[Api(optional: true)]
    public ?string $deviceID;

    /**
     * `new PlayerSetRepeatModeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlayerSetRepeatModeParams::with(state: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlayerSetRepeatModeParams)->withState(...)
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
    public static function with(string $state, ?string $deviceID = null): self
    {
        $obj = new self;

        $obj->state = $state;

        null !== $deviceID && $obj->deviceID = $deviceID;

        return $obj;
    }

    /**
     * **track**, **context** or **off**.<br/>
     * **track** will repeat the current track.<br/>
     * **context** will repeat the current context.<br/>
     * **off** will turn repeat off.
     */
    public function withState(string $state): self
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
        $obj->deviceID = $deviceID;

        return $obj;
    }
}
