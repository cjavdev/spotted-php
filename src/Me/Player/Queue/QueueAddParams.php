<?php

declare(strict_types=1);

namespace Spotted\Me\Player\Queue;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Add an item to be played next in the user's current playback queue. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
 *
 * @see Spotted\Services\Me\Player\QueueService::add()
 *
 * @phpstan-type QueueAddParamsShape = array{uri: string, deviceID?: string}
 */
final class QueueAddParams implements BaseModel
{
    /** @use SdkModel<QueueAddParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The uri of the item to add to the queue. Must be a track or an episode uri.
     */
    #[Required]
    public string $uri;

    /**
     * The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     */
    #[Optional]
    public ?string $deviceID;

    /**
     * `new QueueAddParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueueAddParams::with(uri: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QueueAddParams)->withUri(...)
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
    public static function with(string $uri, ?string $deviceID = null): self
    {
        $self = new self;

        $self['uri'] = $uri;

        null !== $deviceID && $self['deviceID'] = $deviceID;

        return $self;
    }

    /**
     * The uri of the item to add to the queue. Must be a track or an episode uri.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }

    /**
     * The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     */
    public function withDeviceID(string $deviceID): self
    {
        $self = clone $this;
        $self['deviceID'] = $deviceID;

        return $self;
    }
}
