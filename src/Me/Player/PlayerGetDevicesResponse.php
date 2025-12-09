<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Required;
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
    #[Required(list: DeviceObject::class)]
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
     *   isActive?: bool|null,
     *   isPrivateSession?: bool|null,
     *   isRestricted?: bool|null,
     *   name?: string|null,
     *   supportsVolume?: bool|null,
     *   type?: string|null,
     *   volumePercent?: int|null,
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
     *   isActive?: bool|null,
     *   isPrivateSession?: bool|null,
     *   isRestricted?: bool|null,
     *   name?: string|null,
     *   supportsVolume?: bool|null,
     *   type?: string|null,
     *   volumePercent?: int|null,
     * }> $devices
     */
    public function withDevices(array $devices): self
    {
        $obj = clone $this;
        $obj['devices'] = $devices;

        return $obj;
    }
}
