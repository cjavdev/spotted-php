<?php

declare(strict_types=1);

namespace Spotted\Me\Following\FollowingBulkGetResponse\Artists;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * The cursors used to find the next set of items.
 *
 * @phpstan-type CursorsShape = array{after?: string, before?: string}
 */
final class Cursors implements BaseModel
{
    /** @use SdkModel<CursorsShape> */
    use SdkModel;

    /**
     * The cursor to use as key to find the next page of items.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * The cursor to use as key to find the previous page of items.
     */
    #[Api(optional: true)]
    public ?string $before;

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
        ?string $after = null,
        ?string $before = null
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $before && $obj->before = $before;

        return $obj;
    }

    /**
     * The cursor to use as key to find the next page of items.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * The cursor to use as key to find the previous page of items.
     */
    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }
}
