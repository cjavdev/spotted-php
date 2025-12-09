<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type DeviceObjectShape = array{
 *   id?: string|null,
 *   is_active?: bool|null,
 *   is_private_session?: bool|null,
 *   is_restricted?: bool|null,
 *   name?: string|null,
 *   supports_volume?: bool|null,
 *   type?: string|null,
 *   volume_percent?: int|null,
 * }
 */
final class DeviceObject implements BaseModel
{
    /** @use SdkModel<DeviceObjectShape> */
    use SdkModel;

    /**
     * The device ID. This ID is unique and persistent to some extent. However, this is not guaranteed and any cached `device_id` should periodically be cleared out and refetched as necessary.
     */
    #[Optional(nullable: true)]
    public ?string $id;

    /**
     * If this device is the currently active device.
     */
    #[Optional]
    public ?bool $is_active;

    /**
     * If this device is currently in a private session.
     */
    #[Optional]
    public ?bool $is_private_session;

    /**
     * Whether controlling this device is restricted. At present if this is "true" then no Web API commands will be accepted by this device.
     */
    #[Optional]
    public ?bool $is_restricted;

    /**
     * A human-readable name for the device. Some devices have a name that the user can configure (e.g. \"Loudest speaker\") and some devices have a generic name associated with the manufacturer or device model.
     */
    #[Optional]
    public ?string $name;

    /**
     * If this device can be used to set the volume.
     */
    #[Optional]
    public ?bool $supports_volume;

    /**
     * Device type, such as "computer", "smartphone" or "speaker".
     */
    #[Optional]
    public ?string $type;

    /**
     * The current volume in percent.
     */
    #[Optional(nullable: true)]
    public ?int $volume_percent;

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
        ?string $id = null,
        ?bool $is_active = null,
        ?bool $is_private_session = null,
        ?bool $is_restricted = null,
        ?string $name = null,
        ?bool $supports_volume = null,
        ?string $type = null,
        ?int $volume_percent = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $is_active && $obj['is_active'] = $is_active;
        null !== $is_private_session && $obj['is_private_session'] = $is_private_session;
        null !== $is_restricted && $obj['is_restricted'] = $is_restricted;
        null !== $name && $obj['name'] = $name;
        null !== $supports_volume && $obj['supports_volume'] = $supports_volume;
        null !== $type && $obj['type'] = $type;
        null !== $volume_percent && $obj['volume_percent'] = $volume_percent;

        return $obj;
    }

    /**
     * The device ID. This ID is unique and persistent to some extent. However, this is not guaranteed and any cached `device_id` should periodically be cleared out and refetched as necessary.
     */
    public function withID(?string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * If this device is the currently active device.
     */
    public function withIsActive(bool $isActive): self
    {
        $obj = clone $this;
        $obj['is_active'] = $isActive;

        return $obj;
    }

    /**
     * If this device is currently in a private session.
     */
    public function withIsPrivateSession(bool $isPrivateSession): self
    {
        $obj = clone $this;
        $obj['is_private_session'] = $isPrivateSession;

        return $obj;
    }

    /**
     * Whether controlling this device is restricted. At present if this is "true" then no Web API commands will be accepted by this device.
     */
    public function withIsRestricted(bool $isRestricted): self
    {
        $obj = clone $this;
        $obj['is_restricted'] = $isRestricted;

        return $obj;
    }

    /**
     * A human-readable name for the device. Some devices have a name that the user can configure (e.g. \"Loudest speaker\") and some devices have a generic name associated with the manufacturer or device model.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * If this device can be used to set the volume.
     */
    public function withSupportsVolume(bool $supportsVolume): self
    {
        $obj = clone $this;
        $obj['supports_volume'] = $supportsVolume;

        return $obj;
    }

    /**
     * Device type, such as "computer", "smartphone" or "speaker".
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The current volume in percent.
     */
    public function withVolumePercent(?int $volumePercent): self
    {
        $obj = clone $this;
        $obj['volume_percent'] = $volumePercent;

        return $obj;
    }
}
