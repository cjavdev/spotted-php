<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type DeviceObjectShape = array{
 *   id?: string|null,
 *   isActive?: bool|null,
 *   isPrivateSession?: bool|null,
 *   isRestricted?: bool|null,
 *   name?: string|null,
 *   supportsVolume?: bool|null,
 *   type?: string|null,
 *   volumePercent?: int|null,
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
    #[Optional('is_active')]
    public ?bool $isActive;

    /**
     * If this device is currently in a private session.
     */
    #[Optional('is_private_session')]
    public ?bool $isPrivateSession;

    /**
     * Whether controlling this device is restricted. At present if this is "true" then no Web API commands will be accepted by this device.
     */
    #[Optional('is_restricted')]
    public ?bool $isRestricted;

    /**
     * A human-readable name for the device. Some devices have a name that the user can configure (e.g. \"Loudest speaker\") and some devices have a generic name associated with the manufacturer or device model.
     */
    #[Optional]
    public ?string $name;

    /**
     * If this device can be used to set the volume.
     */
    #[Optional('supports_volume')]
    public ?bool $supportsVolume;

    /**
     * Device type, such as "computer", "smartphone" or "speaker".
     */
    #[Optional]
    public ?string $type;

    /**
     * The current volume in percent.
     */
    #[Optional('volume_percent', nullable: true)]
    public ?int $volumePercent;

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
        ?bool $isActive = null,
        ?bool $isPrivateSession = null,
        ?bool $isRestricted = null,
        ?string $name = null,
        ?bool $supportsVolume = null,
        ?string $type = null,
        ?int $volumePercent = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $isActive && $obj['isActive'] = $isActive;
        null !== $isPrivateSession && $obj['isPrivateSession'] = $isPrivateSession;
        null !== $isRestricted && $obj['isRestricted'] = $isRestricted;
        null !== $name && $obj['name'] = $name;
        null !== $supportsVolume && $obj['supportsVolume'] = $supportsVolume;
        null !== $type && $obj['type'] = $type;
        null !== $volumePercent && $obj['volumePercent'] = $volumePercent;

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
        $obj['isActive'] = $isActive;

        return $obj;
    }

    /**
     * If this device is currently in a private session.
     */
    public function withIsPrivateSession(bool $isPrivateSession): self
    {
        $obj = clone $this;
        $obj['isPrivateSession'] = $isPrivateSession;

        return $obj;
    }

    /**
     * Whether controlling this device is restricted. At present if this is "true" then no Web API commands will be accepted by this device.
     */
    public function withIsRestricted(bool $isRestricted): self
    {
        $obj = clone $this;
        $obj['isRestricted'] = $isRestricted;

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
        $obj['supportsVolume'] = $supportsVolume;

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
        $obj['volumePercent'] = $volumePercent;

        return $obj;
    }
}
