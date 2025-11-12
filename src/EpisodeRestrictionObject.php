<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type EpisodeRestrictionObjectShape = array{reason?: string|null}
 */
final class EpisodeRestrictionObject implements BaseModel
{
    /** @use SdkModel<EpisodeRestrictionObjectShape> */
    use SdkModel;

    /**
     * The reason for the restriction. Supported values:
     * - `market` - The content item is not available in the given market.
     * - `product` - The content item is not available for the user's subscription type.
     * - `explicit` - The content item is explicit and the user's account is set to not play explicit content.
     *
     * Additional reasons may be added in the future.
     * **Note**: If you use this field, make sure that your application safely handles unknown values.
     */
    #[Api(optional: true)]
    public ?string $reason;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $reason = null): self
    {
        $obj = new self;

        null !== $reason && $obj->reason = $reason;

        return $obj;
    }

    /**
     * The reason for the restriction. Supported values:
     * - `market` - The content item is not available in the given market.
     * - `product` - The content item is not available for the user's subscription type.
     * - `explicit` - The content item is explicit and the user's account is set to not play explicit content.
     *
     * Additional reasons may be added in the future.
     * **Note**: If you use this field, make sure that your application safely handles unknown values.
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }
}
