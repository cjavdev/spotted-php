<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Set the repeat mode for the user's playback. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
 *
 * @see Spotted\Services\Me\PlayerService::setRepeatMode()
 *
 * @phpstan-type PlayerSetRepeatModeParamsShape = array{
 *   state: string, deviceID?: string
 * }
 */
final class PlayerSetRepeatModeParams implements BaseModel
{
    /** @use SdkModel<PlayerSetRepeatModeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * **track**, **context** or **off**.<br/>
     * **track** will repeat the current track.<br/>
     * **context** will repeat the current context.<br/>
     * **off** will turn repeat off.
     */
    #[Required]
    public string $state;

    /**
     * The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     */
    #[Optional]
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
        $self = new self;

        $self['state'] = $state;

        null !== $deviceID && $self['deviceID'] = $deviceID;

        return $self;
    }

    /**
     * **track**, **context** or **off**.<br/>
     * **track** will repeat the current track.<br/>
     * **context** will repeat the current context.<br/>
     * **off** will turn repeat off.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     */
    public function withDeviceID(string $deviceID): self
    {
        $self = clone $this;
        $self['deviceID'] = $deviceID;

        return $self;
    }
}
