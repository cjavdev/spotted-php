<?php

declare(strict_types=1);

namespace Spotted\Chapters;

use Spotted\Chapters\ChapterBulkGetResponse\Chapter;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ChapterShape from \Spotted\Chapters\ChapterBulkGetResponse\Chapter
 *
 * @phpstan-type ChapterBulkGetResponseShape = array{chapters: list<ChapterShape>}
 */
final class ChapterBulkGetResponse implements BaseModel
{
    /** @use SdkModel<ChapterBulkGetResponseShape> */
    use SdkModel;

    /** @var list<Chapter> $chapters */
    #[Required(list: Chapter::class)]
    public array $chapters;

    /**
     * `new ChapterBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChapterBulkGetResponse::with(chapters: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChapterBulkGetResponse)->withChapters(...)
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
     * @param list<ChapterShape> $chapters
     */
    public static function with(array $chapters): self
    {
        $self = new self;

        $self['chapters'] = $chapters;

        return $self;
    }

    /**
     * @param list<ChapterShape> $chapters
     */
    public function withChapters(array $chapters): self
    {
        $self = clone $this;
        $self['chapters'] = $chapters;

        return $self;
    }
}
