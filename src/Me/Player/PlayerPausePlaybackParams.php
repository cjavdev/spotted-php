<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Pause playback on the user's account. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
 *
 * @see Spotted\Services\Me\PlayerService::pausePlayback()
 *
 * @phpstan-type PlayerPausePlaybackParamsShape = array{deviceID?: string}
 */
final class PlayerPausePlaybackParams implements BaseModel
{
    /** @use SdkModel<PlayerPausePlaybackParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     */
    #[Optional]
    public ?string $deviceID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $deviceID = null): self
    {
        $obj = new self;

        null !== $deviceID && $obj['deviceID'] = $deviceID;

        return $obj;
    }

    /**
     * The id of the device this command is targeting. If not supplied, the user's currently active device is the target.
     */
    public function withDeviceID(string $deviceID): self
    {
        $obj = clone $this;
        $obj['deviceID'] = $deviceID;

        return $obj;
    }
}
