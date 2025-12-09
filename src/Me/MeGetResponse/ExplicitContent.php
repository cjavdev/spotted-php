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
 *   filterEnabled?: bool|null, filterLocked?: bool|null
 * }
 */
final class ExplicitContent implements BaseModel
{
    /** @use SdkModel<ExplicitContentShape> */
    use SdkModel;

    /**
     * When `true`, indicates that explicit content should not be played.
     */
    #[Optional('filter_enabled')]
    public ?bool $filterEnabled;

    /**
     * When `true`, indicates that the explicit content setting is locked and can't be changed by the user.
     */
    #[Optional('filter_locked')]
    public ?bool $filterLocked;

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
        ?bool $filterEnabled = null,
        ?bool $filterLocked = null
    ): self {
        $obj = new self;

        null !== $filterEnabled && $obj['filterEnabled'] = $filterEnabled;
        null !== $filterLocked && $obj['filterLocked'] = $filterLocked;

        return $obj;
    }

    /**
     * When `true`, indicates that explicit content should not be played.
     */
    public function withFilterEnabled(bool $filterEnabled): self
    {
        $obj = clone $this;
        $obj['filterEnabled'] = $filterEnabled;

        return $obj;
    }

    /**
     * When `true`, indicates that the explicit content setting is locked and can't be changed by the user.
     */
    public function withFilterLocked(bool $filterLocked): self
    {
        $obj = clone $this;
        $obj['filterLocked'] = $filterLocked;

        return $obj;
    }
}
