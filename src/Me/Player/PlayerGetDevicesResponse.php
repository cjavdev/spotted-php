<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DeviceObjectShape from \Spotted\Me\Player\DeviceObject
 *
 * @phpstan-type PlayerGetDevicesResponseShape = array{
 *   devices: list<DeviceObjectShape>
 * }
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
     * @param list<DeviceObjectShape> $devices
     */
    public static function with(array $devices): self
    {
        $self = new self;

        $self['devices'] = $devices;

        return $self;
    }

    /**
     * @param list<DeviceObjectShape> $devices
     */
    public function withDevices(array $devices): self
    {
        $self = clone $this;
        $self['devices'] = $devices;

        return $self;
    }
}
