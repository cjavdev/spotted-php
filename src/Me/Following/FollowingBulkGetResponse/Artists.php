<?php

declare(strict_types=1);

namespace Spotted\Me\Following\FollowingBulkGetResponse;

use Spotted\ArtistObject;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Me\Following\FollowingBulkGetResponse\Artists\Cursors;

/**
 * @phpstan-import-type CursorsShape from \Spotted\Me\Following\FollowingBulkGetResponse\Artists\Cursors
 * @phpstan-import-type ArtistObjectShape from \Spotted\ArtistObject
 *
 * @phpstan-type ArtistsShape = array{
 *   cursors?: null|Cursors|CursorsShape,
 *   href?: string|null,
 *   items?: list<ArtistObject|ArtistObjectShape>|null,
 *   limit?: int|null,
 *   next?: string|null,
 *   published?: bool|null,
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
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

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
     * @param Cursors|CursorsShape|null $cursors
     * @param list<ArtistObject|ArtistObjectShape>|null $items
     */
    public static function with(
        Cursors|array|null $cursors = null,
        ?string $href = null,
        ?array $items = null,
        ?int $limit = null,
        ?string $next = null,
        ?bool $published = null,
        ?int $total = null,
    ): self {
        $self = new self;

        null !== $cursors && $self['cursors'] = $cursors;
        null !== $href && $self['href'] = $href;
        null !== $items && $self['items'] = $items;
        null !== $limit && $self['limit'] = $limit;
        null !== $next && $self['next'] = $next;
        null !== $published && $self['published'] = $published;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * The cursors used to find the next set of items.
     *
     * @param Cursors|CursorsShape $cursors
     */
    public function withCursors(Cursors|array $cursors): self
    {
        $self = clone $this;
        $self['cursors'] = $cursors;

        return $self;
    }

    /**
     * A link to the Web API endpoint returning the full result of the request.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    /**
     * @param list<ArtistObject|ArtistObjectShape> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }

    /**
     * The maximum number of items in the response (as set in the query or by default).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * URL to the next page of items. ( `null` if none).
     */
    public function withNext(string $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }

    /**
     * The total number of items available to return.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
