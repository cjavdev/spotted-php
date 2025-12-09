<?php

declare(strict_types=1);

namespace Spotted\Me\Following\FollowingBulkGetResponse;

use Spotted\ArtistObject;
use Spotted\ArtistObject\Type;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\FollowersObject;
use Spotted\ImageObject;
use Spotted\Me\Following\FollowingBulkGetResponse\Artists\Cursors;

/**
 * @phpstan-type ArtistsShape = array{
 *   cursors?: Cursors|null,
 *   href?: string|null,
 *   items?: list<ArtistObject>|null,
 *   limit?: int|null,
 *   next?: string|null,
 *   total?: int|null,
 * }
 */
final class Artists implements BaseModel
{
    /** @use SdkModel<ArtistsShape> */
    use SdkModel;

    /**
     * The cursors used to find the next set of items.
     */
    #[Optional]
    public ?Cursors $cursors;

    /**
     * A link to the Web API endpoint returning the full result of the request.
     */
    #[Optional]
    public ?string $href;

    /** @var list<ArtistObject>|null $items */
    #[Optional(list: ArtistObject::class)]
    public ?array $items;

    /**
     * The maximum number of items in the response (as set in the query or by default).
     */
    #[Optional]
    public ?int $limit;

    /**
     * URL to the next page of items. ( `null` if none).
     */
    #[Optional]
    public ?string $next;

    /**
     * The total number of items available to return.
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
     *
     * @param Cursors|array{after?: string|null, before?: string|null} $cursors
     * @param list<ArtistObject|array{
     *   id?: string|null,
     *   external_urls?: ExternalURLObject|null,
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
        Cursors|array|null $cursors = null,
        ?string $href = null,
        ?array $items = null,
        ?int $limit = null,
        ?string $next = null,
        ?int $total = null,
    ): self {
        $obj = new self;

        null !== $cursors && $obj['cursors'] = $cursors;
        null !== $href && $obj['href'] = $href;
        null !== $items && $obj['items'] = $items;
        null !== $limit && $obj['limit'] = $limit;
        null !== $next && $obj['next'] = $next;
        null !== $total && $obj['total'] = $total;

        return $obj;
    }

    /**
     * The cursors used to find the next set of items.
     *
     * @param Cursors|array{after?: string|null, before?: string|null} $cursors
     */
    public function withCursors(Cursors|array $cursors): self
    {
        $obj = clone $this;
        $obj['cursors'] = $cursors;

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
     * @param list<ArtistObject|array{
     *   id?: string|null,
     *   external_urls?: ExternalURLObject|null,
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
    public function withNext(string $next): self
    {
        $obj = clone $this;
        $obj['next'] = $next;

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
}
