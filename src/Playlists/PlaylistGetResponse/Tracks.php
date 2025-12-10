<?php

declare(strict_types=1);

namespace Spotted\Playlists\PlaylistGetResponse;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\EpisodeObject;
use Spotted\PlaylistTrackObject;
use Spotted\PlaylistUserObject;
use Spotted\TrackObject;

/**
 * The tracks of the playlist.
 *
 * @phpstan-type TracksShape = array{
 *   href: string,
 *   limit: int,
 *   next: string|null,
 *   offset: int,
 *   previous: string|null,
 *   total: int,
 *   items?: list<PlaylistTrackObject>|null,
 * }
 */
final class Tracks implements BaseModel
{
    /** @use SdkModel<TracksShape> */
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

    /** @var list<PlaylistTrackObject>|null $items */
    #[Optional(list: PlaylistTrackObject::class)]
    public ?array $items;

    /**
     * `new Tracks()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Tracks::with(
     *   href: ..., limit: ..., next: ..., offset: ..., previous: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Tracks)
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
     * @param list<PlaylistTrackObject|array{
     *   addedAt?: \DateTimeInterface|null,
     *   addedBy?: PlaylistUserObject|null,
     *   isLocal?: bool|null,
     *   track?: TrackObject|EpisodeObject|null,
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
        $self = new self;

        $self['href'] = $href;
        $self['limit'] = $limit;
        $self['next'] = $next;
        $self['offset'] = $offset;
        $self['previous'] = $previous;
        $self['total'] = $total;

        null !== $items && $self['items'] = $items;

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
    public function withNext(?string $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }

    /**
     * The offset of the items returned (as set in the query or by default).
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * URL to the previous page of items. ( `null` if none).
     */
    public function withPrevious(?string $previous): self
    {
        $self = clone $this;
        $self['previous'] = $previous;

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

    /**
     * @param list<PlaylistTrackObject|array{
     *   addedAt?: \DateTimeInterface|null,
     *   addedBy?: PlaylistUserObject|null,
     *   isLocal?: bool|null,
     *   track?: TrackObject|EpisodeObject|null,
     * }> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }
}
