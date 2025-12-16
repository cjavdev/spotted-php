<?php

declare(strict_types=1);

namespace Spotted\Audiobooks;

use Spotted\Audiobooks\AudiobookBulkGetResponse\Audiobook;
use Spotted\Audiobooks\AudiobookBulkGetResponse\Audiobook\Chapters;
use Spotted\AuthorObject;
use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\NarratorObject;

/**
 * @phpstan-type AudiobookBulkGetResponseShape = array{audiobooks: list<Audiobook>}
 */
final class AudiobookBulkGetResponse implements BaseModel
{
    /** @use SdkModel<AudiobookBulkGetResponseShape> */
    use SdkModel;

    /** @var list<Audiobook> $audiobooks */
    #[Required(list: Audiobook::class)]
    public array $audiobooks;

    /**
     * `new AudiobookBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudiobookBulkGetResponse::with(audiobooks: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AudiobookBulkGetResponse)->withAudiobooks(...)
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
     * @param list<Audiobook|array{
     *   id: string,
     *   authors: list<AuthorObject>,
     *   availableMarkets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   languages: list<string>,
     *   mediaType: string,
     *   name: string,
     *   narrators: list<NarratorObject>,
     *   publisher: string,
     *   totalChapters: int,
     *   type?: 'audiobook',
     *   uri: string,
     *   edition?: string|null,
     *   published?: bool|null,
     *   chapters: Chapters,
     * }> $audiobooks
     */
    public static function with(array $audiobooks): self
    {
        $self = new self;

        $self['audiobooks'] = $audiobooks;

        return $self;
    }

    /**
     * @param list<Audiobook|array{
     *   id: string,
     *   authors: list<AuthorObject>,
     *   availableMarkets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   languages: list<string>,
     *   mediaType: string,
     *   name: string,
     *   narrators: list<NarratorObject>,
     *   publisher: string,
     *   totalChapters: int,
     *   type?: 'audiobook',
     *   uri: string,
     *   edition?: string|null,
     *   published?: bool|null,
     *   chapters: Chapters,
     * }> $audiobooks
     */
    public function withAudiobooks(array $audiobooks): self
    {
        $self = clone $this;
        $self['audiobooks'] = $audiobooks;

        return $self;
    }
}
