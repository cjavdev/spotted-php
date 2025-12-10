<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
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
    #[Optional(nullable: true)]
    public ?string $href;

    /**
     * The total number of followers.
     */
    #[Optional]
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
        $self = new self;

        null !== $href && $self['href'] = $href;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * This will always be set to null, as the Web API does not support it at the moment.
     */
    public function withHref(?string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    /**
     * The total number of followers.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
