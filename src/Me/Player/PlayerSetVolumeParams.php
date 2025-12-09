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
 *   volume_percent: int, device_id?: string
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
    public int $volume_percent;

    /**
     * The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     */
    #[Optional]
    public ?string $device_id;

    /**
     * `new PlayerSetVolumeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlayerSetVolumeParams::with(volume_percent: ...)
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
        int $volume_percent,
        ?string $device_id = null
    ): self {
        $obj = new self;

        $obj['volume_percent'] = $volume_percent;

        null !== $device_id && $obj['device_id'] = $device_id;

        return $obj;
    }

    /**
     * The volume to set. Must be a value from 0 to 100 inclusive.
     */
    public function withVolumePercent(int $volumePercent): self
    {
        $obj = clone $this;
        $obj['volume_percent'] = $volumePercent;

        return $obj;
    }

    /**
     * The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     */
    public function withDeviceID(string $deviceID): self
    {
        $obj = clone $this;
        $obj['device_id'] = $deviceID;

        return $obj;
    }
}
