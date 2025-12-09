<?php

declare(strict_types=1);

namespace Spotted\Search\SearchQueryResponse;

use Spotted\ArtistObject;
use Spotted\ArtistObject\Type;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\FollowersObject;
use Spotted\ImageObject;

/**
 * @phpstan-type ArtistsShape = array{
 *   href: string,
 *   limit: int,
 *   next: string|null,
 *   offset: int,
 *   previous: string|null,
 *   total: int,
 *   items?: list<ArtistObject>|null,
 * }
 */
final class Artists implements BaseModel
{
    /** @use SdkModel<ArtistsShape> */
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

    /** @var list<ArtistObject>|null $items */
    #[Optional(list: ArtistObject::class)]
    public ?array $items;

    /**
     * `new Artists()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Artists::with(
     *   href: ..., limit: ..., next: ..., offset: ..., previous: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Artists)
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
     * @param list<ArtistObject|array{
     *   id?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   followers?: FollowersObject|null,
     *   genres?: list<string>|null,
     *   href?: string|null,
     *   images?: list<ImageObject>|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   type?: value-of<Type>|null,
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
     * @param list<ArtistObject|array{
     *   id?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   followers?: FollowersObject|null,
     *   genres?: list<string>|null,
     *   href?: string|null,
     *   images?: list<ImageObject>|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   type?: value-of<Type>|null,
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
