<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type FollowersObjectShape = array{href?: string|null, total?: int|null}
 */
final class FollowersObject implements BaseModel
{
    /** @use SdkModel<FollowersObjectShape> */
    use SdkModel;

    /**
     * This will always be set to null, as the Web API does not support it at the moment.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $href;

    /**
     * The total number of followers.
     */
    #[Api(optional: true)]
    public ?int $total;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $href = null, ?int $total = null): self
    {
        $obj = new self;

        null !== $href && $obj['href'] = $href;
        null !== $total && $obj['total'] = $total;

        return $obj;
    }

    /**
     * This will always be set to null, as the Web API does not support it at the moment.
     */
    public function withHref(?string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * The total number of followers.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }
}
