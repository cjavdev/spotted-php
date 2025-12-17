<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Set the volume for the user’s current playback device. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
 *
 * @see Spotted\Services\Me\PlayerService::setVolume()
 *
 * @phpstan-type PlayerSetVolumeParamsShape = array{
 *   volumePercent: int, deviceID?: string|null
 * }
 */
final class PlayerSetVolumeParams implements BaseModel
{
    /** @use SdkModel<PlayerSetVolumeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The volume to set. Must be a value from 0 to 100 inclusive.
     */
    #[Required]
    public int $volumePercent;

    /**
     * The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     */
    #[Optional]
    public ?string $deviceID;

    /**
     * `new PlayerSetVolumeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlayerSetVolumeParams::with(volumePercent: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlayerSetVolumeParams)->withVolumePercent(...)
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
        int $volumePercent,
        ?string $deviceID = null
    ): self {
        $self = new self;

        $self['volumePercent'] = $volumePercent;

        null !== $deviceID && $self['deviceID'] = $deviceID;

        return $self;
    }

    /**
     * The volume to set. Must be a value from 0 to 100 inclusive.
     */
    public function withVolumePercent(int $volumePercent): self
    {
        $self = clone $this;
        $self['volumePercent'] = $volumePercent;

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
}
