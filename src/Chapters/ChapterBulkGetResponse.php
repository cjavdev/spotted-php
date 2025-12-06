<?php

declare(strict_types=1);

namespace Spotted\Chapters;

use Spotted\AudiobookBase;
use Spotted\ChapterRestrictionObject;
use Spotted\Chapters\ChapterBulkGetResponse\Chapter;
use Spotted\Chapters\ChapterBulkGetResponse\Chapter\ReleaseDatePrecision;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\ResumePointObject;

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
     * @param list<Chapter|array{
     *   id: string,
     *   audio_preview_url: string|null,
     *   audiobook: AudiobookBase,
     *   chapter_number: int,
     *   description: string,
     *   duration_ms: int,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   is_playable: bool,
     *   languages: list<string>,
     *   name: string,
     *   release_date: string,
     *   release_date_precision: value-of<ReleaseDatePrecision>,
     *   type: 'episode',
     *   uri: string,
     *   available_markets?: list<string>|null,
     *   restrictions?: ChapterRestrictionObject|null,
     *   resume_point?: ResumePointObject|null,
     * }> $chapters
     */
    public static function with(array $chapters): self
    {
        $obj = new self;

        $obj['chapters'] = $chapters;

        return $obj;
    }

    /**
     * @param list<Chapter|array{
     *   id: string,
     *   audio_preview_url: string|null,
     *   audiobook: AudiobookBase,
     *   chapter_number: int,
     *   description: string,
     *   duration_ms: int,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   is_playable: bool,
     *   languages: list<string>,
     *   name: string,
     *   release_date: string,
     *   release_date_precision: value-of<ReleaseDatePrecision>,
     *   type: 'episode',
     *   uri: string,
     *   available_markets?: list<string>|null,
     *   restrictions?: ChapterRestrictionObject|null,
     *   resume_point?: ResumePointObject|null,
     * }> $chapters
     */
    public function withChapters(array $chapters): self
    {
        $obj = clone $this;
        $obj['chapters'] = $chapters;

        return $obj;
    }
}
