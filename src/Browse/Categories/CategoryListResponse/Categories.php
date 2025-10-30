<?php

declare(strict_types=1);

namespace Spotted\Browse\Categories\CategoryListResponse;

use Spotted\Browse\Categories\CategoryListResponse\Categories\Item;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type CategoriesShape = array{
 *   href: string,
 *   items: list<Item>,
 *   limit: int,
 *   next: string|null,
 *   offset: int,
 *   previous: string|null,
 *   total: int,
 * }
 */
final class Categories implements BaseModel
{
    /** @use SdkModel<CategoriesShape> */
    use SdkModel;

    /**
     * A link to the Web API endpoint returning the full result of the request.
     */
    #[Api]
    public string $href;

    /** @var list<Item> $items */
    #[Api(list: Item::class)]
    public array $items;

    /**
     * The maximum number of items in the response (as set in the query or by default).
     */
    #[Api]
    public int $limit;

    /**
     * URL to the next page of items. ( `null` if none).
     */
    #[Api]
    public ?string $next;

    /**
     * The offset of the items returned (as set in the query or by default).
     */
    #[Api]
    public int $offset;

    /**
     * URL to the previous page of items. ( `null` if none).
     */
    #[Api]
    public ?string $previous;

    /**
     * The total number of items available to return.
     */
    #[Api]
    public int $total;

    /**
     * `new Categories()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Categories::with(
     *   href: ...,
     *   items: ...,
     *   limit: ...,
     *   next: ...,
     *   offset: ...,
     *   previous: ...,
     *   total: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Categories)
     *   ->withHref(...)
     *   ->withItems(...)
     *   ->withLimit(...)
     *   ->withNext(...)
     *   ->withOffset(...)
     *   ->withPrevious(...)
     *   ->withTotal(...)
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
     * @param list<Item> $items
     */
    public static function with(
        string $href,
        array $items,
        int $limit,
        ?string $next,
        int $offset,
        ?string $previous,
        int $total,
    ): self {
        $obj = new self;

        $obj->href = $href;
        $obj->items = $items;
        $obj->limit = $limit;
        $obj->next = $next;
        $obj->offset = $offset;
        $obj->previous = $previous;
        $obj->total = $total;

        return $obj;
    }

    /**
     * A link to the Web API endpoint returning the full result of the request.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * @param list<Item> $items
     */
    public function withItems(array $items): self
    {
        $obj = clone $this;
        $obj->items = $items;

        return $obj;
    }

    /**
     * The maximum number of items in the response (as set in the query or by default).
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * URL to the next page of items. ( `null` if none).
     */
    public function withNext(?string $next): self
    {
        $obj = clone $this;
        $obj->next = $next;

        return $obj;
    }

    /**
     * The offset of the items returned (as set in the query or by default).
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }

    /**
     * URL to the previous page of items. ( `null` if none).
     */
    public function withPrevious(?string $previous): self
    {
        $obj = clone $this;
        $obj->previous = $previous;

        return $obj;
    }

    /**
     * The total number of items available to return.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }
}
