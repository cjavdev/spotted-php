<?php

declare(strict_types=1);

namespace Spotted\Me\Audiobooks\AudiobookListResponse\Audiobook;

use Spotted\Audiobooks\SimplifiedChapterObject;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * The chapters of the audiobook.
 *
 * @phpstan-type ChaptersShape = array{
 *   href: string,
 *   limit: int,
 *   next: string|null,
 *   offset: int,
 *   previous: string|null,
 *   total: int,
 *   items?: list<SimplifiedChapterObject>,
 * }
 */
final class Chapters implements BaseModel
{
    /** @use SdkModel<ChaptersShape> */
    use SdkModel;

    /**
     * A link to the Web API endpoint returning the full result of the request.
     */
    #[Api]
    public string $href;

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

    /** @var list<SimplifiedChapterObject>|null $items */
    #[Api(list: SimplifiedChapterObject::class, optional: true)]
    public ?array $items;

    /**
     * `new Chapters()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Chapters::with(
     *   href: ..., limit: ..., next: ..., offset: ..., previous: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Chapters)
     *   ->withHref(...)
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
     * @param list<SimplifiedChapterObject> $items
     */
    public static function with(
        string $href,
        int $limit,
        ?string $next,
        int $offset,
        ?string $previous,
        int $total,
        ?array $items = null,
    ): self {
        $obj = new self;

        $obj->href = $href;
        $obj->limit = $limit;
        $obj->next = $next;
        $obj->offset = $offset;
        $obj->previous = $previous;
        $obj->total = $total;

        null !== $items && $obj->items = $items;

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

    /**
     * @param list<SimplifiedChapterObject> $items
     */
    public function withItems(array $items): self
    {
        $obj = clone $this;
        $obj->items = $items;

        return $obj;
    }
}
