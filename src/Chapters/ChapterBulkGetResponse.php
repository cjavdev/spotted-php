<?php

declare(strict_types=1);

namespace Spotted\Chapters;

use Spotted\Chapters\ChapterBulkGetResponse\Chapter;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ChapterBulkGetResponseShape = array{chapters: list<Chapter>}
 */
final class ChapterBulkGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ChapterBulkGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Chapter> $chapters */
    #[Api(list: Chapter::class)]
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
     * @param list<Chapter> $chapters
     */
    public static function with(array $chapters): self
    {
        $obj = new self;

        $obj->chapters = $chapters;

        return $obj;
    }

    /**
     * @param list<Chapter> $chapters
     */
    public function withChapters(array $chapters): self
    {
        $obj = clone $this;
        $obj->chapters = $chapters;

        return $obj;
    }
}
