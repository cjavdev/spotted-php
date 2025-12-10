<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Transfer playback to a new device and optionally begin playback. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
 *
 * @see Spotted\Services\Me\PlayerService::transfer()
 *
 * @phpstan-type PlayerTransferParamsShape = array{
 *   deviceIDs: list<string>, play?: bool
 * }
 */
final class PlayerTransferParams implements BaseModel
{
    /** @use SdkModel<PlayerTransferParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A JSON array containing the ID of the device on which playback should be started/transferred.<br/>For example:`{device_ids:["74ASZWbe4lXaubB36ztrGX"]}`<br/>_**Note**: Although an array is accepted, only a single device_id is currently supported. Supplying more than one will return `400 Bad Request`_.
     *
     * @var list<string> $deviceIDs
     */
    #[Required('device_ids', list: 'string')]
    public array $deviceIDs;

    /**
     * **true**: ensure playback happens on new device.<br/>**false** or not provided: keep the current playback state.
     */
    #[Optional]
    public ?bool $play;

    /**
     * `new PlayerTransferParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PlayerTransferParams::with(deviceIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PlayerTransferParams)->withDeviceIDs(...)
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
     * @param list<string> $deviceIDs
     */
    public static function with(array $deviceIDs, ?bool $play = null): self
    {
        $self = new self;

        $self['deviceIDs'] = $deviceIDs;

        null !== $play && $self['play'] = $play;

        return $self;
    }

    /**
     * A JSON array containing the ID of the device on which playback should be started/transferred.<br/>For example:`{device_ids:["74ASZWbe4lXaubB36ztrGX"]}`<br/>_**Note**: Although an array is accepted, only a single device_id is currently supported. Supplying more than one will return `400 Bad Request`_.
     *
     * @param list<string> $deviceIDs
     */
    public function withDeviceIDs(array $deviceIDs): self
    {
        $self = clone $this;
        $self['deviceIDs'] = $deviceIDs;

        return $self;
    }

    /**
     * **true**: ensure playback happens on new device.<br/>**false** or not provided: keep the current playback state.
     */
    public function withPlay(bool $play): self
    {
        $self = clone $this;
        $self['play'] = $play;

        return $self;
    }
}
