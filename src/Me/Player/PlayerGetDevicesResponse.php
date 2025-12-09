<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type PlayerGetDevicesResponseShape = array{devices: list<DeviceObject>}
 */
final class PlayerGetDevicesResponse implements BaseModel
{
    /** @use SdkModel<PlayerGetDevicesResponseShape> */
    use SdkModel;

    /** @var list<DeviceObject> $devices */
    #[Api(list: DeviceObject::class)]
    public array $devices;

    /**
     * `new PlayerGetDevicesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlayerGetDevicesResponse::with(devices: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlayerGetDevicesResponse)->withDevices(...)
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
     *
     * @param list<DeviceObject|array{
     *   id?: string|null,
     *   is_active?: bool|null,
     *   is_private_session?: bool|null,
     *   is_restricted?: bool|null,
     *   name?: string|null,
     *   supports_volume?: bool|null,
     *   type?: string|null,
     *   volume_percent?: int|null,
     * }> $devices
     */
    public static function with(array $devices): self
    {
        $obj = new self;

        $obj['devices'] = $devices;

        return $obj;
    }

    /**
     * @param list<DeviceObject|array{
     *   id?: string|null,
     *   is_active?: bool|null,
     *   is_private_session?: bool|null,
     *   is_restricted?: bool|null,
     *   name?: string|null,
     *   supports_volume?: bool|null,
     *   type?: string|null,
     *   volume_percent?: int|null,
     * }> $devices
     */
    public function withDevices(array $devices): self
    {
        $obj = clone $this;
        $obj['devices'] = $devices;

        return $obj;
    }
}
