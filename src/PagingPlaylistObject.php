<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\SimplifiedPlaylistObject\Owner;

/**
 * @phpstan-type PagingPlaylistObjectShape = array{
 *   href: string,
 *   limit: int,
 *   next: string|null,
 *   offset: int,
 *   previous: string|null,
 *   total: int,
 *   items?: list<SimplifiedPlaylistObject>|null,
 * }
 */
final class PagingPlaylistObject implements BaseModel
{
    /** @use SdkModel<PagingPlaylistObjectShape> */
    use SdkModel;

    /**
     * A link to the Web API endpoint returning the full result of the request.
     */
    #[Required]
    public string $href;

    /**
     * The maximum number of items in the response (as set in the query or by default).
     */
    #[Required]
    public int $limit;

    /**
     * URL to the next page of items. ( `null` if none).
     */
    #[Required]
    public ?string $next;

    /**
     * The offset of the items returned (as set in the query or by default).
     */
    #[Required]
    public int $offset;

    /**
     * URL to the previous page of items. ( `null` if none).
     */
    #[Required]
    public ?string $previous;

    /**
     * The total number of items available to return.
     */
    #[Required]
    public int $total;

    /** @var list<SimplifiedPlaylistObject>|null $items */
    #[Optional(list: SimplifiedPlaylistObject::class)]
    public ?array $items;

    /**
     * `new PagingPlaylistObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PagingPlaylistObject::with(
     *   href: ..., limit: ..., next: ..., offset: ..., previous: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PagingPlaylistObject)
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
     * @param list<SimplifiedPlaylistObject|array{
     *   id?: string|null,
     *   collaborative?: bool|null,
     *   description?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   images?: list<ImageObject>|null,
     *   name?: string|null,
     *   owner?: Owner|null,
     *   published?: bool|null,
     *   snapshotID?: string|null,
     *   tracks?: PlaylistTracksRefObject|null,
     *   type?: string|null,
     *   uri?: string|null,
     * }> $items
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

        $obj['href'] = $href;
        $obj['limit'] = $limit;
        $obj['next'] = $next;
        $obj['offset'] = $offset;
        $obj['previous'] = $previous;
        $obj['total'] = $total;

        null !== $items && $obj['items'] = $items;

        return $obj;
    }

    /**
     * A link to the Web API endpoint returning the full result of the request.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * The maximum number of items in the response (as set in the query or by default).
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * URL to the next page of items. ( `null` if none).
     */
    public function withNext(?string $next): self
    {
        $obj = clone $this;
        $obj['next'] = $next;

        return $obj;
    }

    /**
     * The offset of the items returned (as set in the query or by default).
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj['offset'] = $offset;

        return $obj;
    }

    /**
     * URL to the previous page of items. ( `null` if none).
     */
    public function withPrevious(?string $previous): self
    {
        $obj = clone $this;
        $obj['previous'] = $previous;

        return $obj;
    }

    /**
     * The total number of items available to return.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * @param list<SimplifiedPlaylistObject|array{
     *   id?: string|null,
     *   collaborative?: bool|null,
     *   description?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   images?: list<ImageObject>|null,
     *   name?: string|null,
     *   owner?: Owner|null,
     *   published?: bool|null,
     *   snapshotID?: string|null,
     *   tracks?: PlaylistTracksRefObject|null,
     *   type?: string|null,
     *   uri?: string|null,
     * }> $items
     */
    public function withItems(array $items): self
    {
        $obj = clone $this;
        $obj['items'] = $items;

        return $obj;
    }
}
