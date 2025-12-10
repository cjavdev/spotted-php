<?php

declare(strict_types=1);

namespace Spotted\Chapters;

use Spotted\AudiobookBase;
use Spotted\ChapterRestrictionObject;
use Spotted\Chapters\ChapterBulkGetResponse\Chapter;
use Spotted\Chapters\ChapterBulkGetResponse\Chapter\ReleaseDatePrecision;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\ResumePointObject;

/**
 * @phpstan-type ChapterBulkGetResponseShape = array{chapters: list<Chapter>}
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
     * @param list<Chapter|array{
     *   id: string,
     *   audioPreviewURL: string|null,
     *   audiobook: AudiobookBase,
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
     * }> $chapters
     */
    public static function with(array $chapters): self
    {
        $self = new self;

        $self['chapters'] = $chapters;

        return $self;
    }

    /**
     * @param list<Chapter|array{
     *   id: string,
     *   audioPreviewURL: string|null,
     *   audiobook: AudiobookBase,
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
     * }> $chapters
     */
    public function withChapters(array $chapters): self
    {
        $self = clone $this;
        $self['chapters'] = $chapters;

        return $self;
    }
}
