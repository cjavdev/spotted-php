<?php

declare(strict_types=1);

namespace Spotted\Audiobooks\AudiobookBulkGetResponse\Audiobook;

use Spotted\Audiobooks\SimplifiedChapterObject;
use Spotted\Audiobooks\SimplifiedChapterObject\ReleaseDatePrecision;
use Spotted\ChapterRestrictionObject;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\ResumePointObject;

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
 *   items?: list<SimplifiedChapterObject>|null,
 * }
 */
final class Chapters implements BaseModel
{
    /** @use SdkModel<ChaptersShape> */
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

    /** @var list<SimplifiedChapterObject>|null $items */
    #[Optional(list: SimplifiedChapterObject::class)]
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
     * @param list<SimplifiedChapterObject|array{
     *   id: string,
     *   audioPreviewURL: string|null,
     *   chapterNumber: int,
     *   description: string,
     *   durationMs: int,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isPlayable: bool,
     *   languages: list<string>,
     *   name: string,
     *   releaseDate: string,
     *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
     *   type?: 'episode',
     *   uri: string,
     *   availableMarkets?: list<string>|null,
     *   restrictions?: ChapterRestrictionObject|null,
     *   resumePoint?: ResumePointObject|null,
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
     * @param list<SimplifiedChapterObject|array{
     *   id: string,
     *   audioPreviewURL: string|null,
     *   chapterNumber: int,
     *   description: string,
     *   durationMs: int,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isPlayable: bool,
     *   languages: list<string>,
     *   name: string,
     *   releaseDate: string,
     *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
     *   type?: 'episode',
     *   uri: string,
     *   availableMarkets?: list<string>|null,
     *   restrictions?: ChapterRestrictionObject|null,
     *   resumePoint?: ResumePointObject|null,
     * }> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }
}
