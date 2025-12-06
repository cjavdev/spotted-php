<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Seeks to the given position in the user’s currently playing track. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
 *
 * @see Spotted\Services\Me\PlayerService::seekToPosition()
 *
 * @phpstan-type PlayerSeekToPositionParamsShape = array{
 *   position_ms: int, device_id?: string
 * }
 */
final class PlayerSeekToPositionParams implements BaseModel
{
    /** @use SdkModel<PlayerSeekToPositionParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The position in milliseconds to seek to. Must be a
     * positive number. Passing in a position that is greater than the length of
     * the track will cause the player to start playing the next song.
     */
    #[Api]
    public int $position_ms;

    /**
     * The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     */
    #[Api(optional: true)]
    public ?string $device_id;

    /**
     * `new PlayerSeekToPositionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlayerSeekToPositionParams::with(position_ms: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlayerSeekToPositionParams)->withPositionMs(...)
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
        int $position_ms,
        ?string $device_id = null
    ): self {
        $obj = new self;

        $obj['position_ms'] = $position_ms;

        null !== $device_id && $obj['device_id'] = $device_id;

        return $obj;
    }

    /**
     * The position in milliseconds to seek to. Must be a
     * positive number. Passing in a position that is greater than the length of
     * the track will cause the player to start playing the next song.
     */
    public function withPositionMs(int $positionMs): self
    {
        $obj = clone $this;
        $obj['position_ms'] = $positionMs;

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
