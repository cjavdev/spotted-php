<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Skips to previous track in the user’s queue. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
 *
 * @see Spotted\Services\Me\PlayerService::skipPrevious()
 *
 * @phpstan-type PlayerSkipPreviousParamsShape = array{device_id?: string}
 */
final class PlayerSkipPreviousParams implements BaseModel
{
    /** @use SdkModel<PlayerSkipPreviousParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     */
    #[Api(optional: true)]
    public ?string $device_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $device_id = null): self
    {
        $obj = new self;

        null !== $device_id && $obj['device_id'] = $device_id;

        return $obj;
    }

    /**
     * The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     */
    public function withDeviceID(string $deviceID): self
    {
        $obj = clone $this;
        $obj['device_id'] = $deviceID;

        return $obj;
    }
}
