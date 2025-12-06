<?php

declare(strict_types=1);

namespace Spotted\Me\Audiobooks;

use Spotted\AuthorObject;
use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\Me\Audiobooks\AudiobookListResponse\Audiobook;
use Spotted\Me\Audiobooks\AudiobookListResponse\Audiobook\Chapters;
use Spotted\NarratorObject;

/**
 * @phpstan-type AudiobookListResponseShape = array{
 *   added_at?: \DateTimeInterface|null, audiobook?: Audiobook|null
 * }
 */
final class AudiobookListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AudiobookListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The date and time the audiobook was saved
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $added_at;

    /**
     * Information about the audiobook.
     */
    #[Api(optional: true)]
    public ?Audiobook $audiobook;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Audiobook|array{
     *   id: string,
     *   authors: list<AuthorObject>,
     *   available_markets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   languages: list<string>,
     *   media_type: string,
     *   name: string,
     *   narrators: list<NarratorObject>,
     *   publisher: string,
     *   total_chapters: int,
     *   type: 'audiobook',
     *   uri: string,
     *   edition?: string|null,
     *   chapters: Chapters,
     * } $audiobook
     */
    public static function with(
        ?\DateTimeInterface $added_at = null,
        Audiobook|array|null $audiobook = null
    ): self {
        $obj = new self;

        null !== $added_at && $obj['added_at'] = $added_at;
        null !== $audiobook && $obj['audiobook'] = $audiobook;

        return $obj;
    }

    /**
     * The date and time the audiobook was saved
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj['added_at'] = $addedAt;

        return $obj;
    }

    /**
     * Information about the audiobook.
     *
     * @param Audiobook|array{
     *   id: string,
     *   authors: list<AuthorObject>,
     *   available_markets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   languages: list<string>,
     *   media_type: string,
     *   name: string,
     *   narrators: list<NarratorObject>,
     *   publisher: string,
     *   total_chapters: int,
     *   type: 'audiobook',
     *   uri: string,
     *   edition?: string|null,
     *   chapters: Chapters,
     * } $audiobook
     */
    public function withAudiobook(Audiobook|array $audiobook): self
    {
        $obj = clone $this;
        $obj['audiobook'] = $audiobook;

        return $obj;
    }
}
