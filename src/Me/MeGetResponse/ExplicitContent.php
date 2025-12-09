<?php

declare(strict_types=1);

namespace Spotted\Me\MeGetResponse;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * The user's explicit content settings. _This field is only available when the current user has granted access to the [user-read-private](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
 *
 * @phpstan-type ExplicitContentShape = array{
 *   filter_enabled?: bool|null, filter_locked?: bool|null
 * }
 */
final class ExplicitContent implements BaseModel
{
    /** @use SdkModel<ExplicitContentShape> */
    use SdkModel;

    /**
     * When `true`, indicates that explicit content should not be played.
     */
    #[Optional]
    public ?bool $filter_enabled;

    /**
     * When `true`, indicates that the explicit content setting is locked and can't be changed by the user.
     */
    #[Optional]
    public ?bool $filter_locked;

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
        ?bool $filter_enabled = null,
        ?bool $filter_locked = null
    ): self {
        $obj = new self;

        null !== $filter_enabled && $obj['filter_enabled'] = $filter_enabled;
        null !== $filter_locked && $obj['filter_locked'] = $filter_locked;

        return $obj;
    }

    /**
     * When `true`, indicates that explicit content should not be played.
     */
    public function withFilterEnabled(bool $filterEnabled): self
    {
        $obj = clone $this;
        $obj['filter_enabled'] = $filterEnabled;

        return $obj;
    }

    /**
     * When `true`, indicates that the explicit content setting is locked and can't be changed by the user.
     */
    public function withFilterLocked(bool $filterLocked): self
    {
        $obj = clone $this;
        $obj['filter_locked'] = $filterLocked;

        return $obj;
    }
}
