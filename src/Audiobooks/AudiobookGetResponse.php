<?php

declare(strict_types=1);

namespace Spotted\Audiobooks;

use Spotted\Audiobooks\AudiobookGetResponse\Chapters;
use Spotted\AuthorObject;
use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\NarratorObject;

/**
 * @phpstan-type AudiobookGetResponseShape = array{
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
 *   type: "audiobook",
 *   uri: string,
 *   edition?: string|null,
 *   chapters: Chapters,
 * }
 */
final class AudiobookGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AudiobookGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The object type.
     *
     * @var "audiobook" $type
     */
    #[Api]
    public string $type = 'audiobook';

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the audiobook.
     */
    #[Api]
    public string $id;

    /**
     * The author(s) for the audiobook.
     *
     * @var list<AuthorObject> $authors
     */
    #[Api(list: AuthorObject::class)]
    public array $authors;

    /**
     * A list of the countries in which the audiobook can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @var list<string> $available_markets
     */
    #[Api(list: 'string')]
    public array $available_markets;

    /**
     * The copyright statements of the audiobook.
     *
     * @var list<CopyrightObject> $copyrights
     */
    #[Api(list: CopyrightObject::class)]
    public array $copyrights;

    /**
     * A description of the audiobook. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    #[Api]
    public string $description;

    /**
     * Whether or not the audiobook has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    #[Api]
    public bool $explicit;

    #[Api]
    public ExternalURLObject $external_urls;

    /**
     * A link to the Web API endpoint providing full details of the audiobook.
     */
    #[Api]
    public string $href;

    /**
     * A description of the audiobook. This field may contain HTML tags.
     */
    #[Api]
    public string $html_description;

    /**
     * The cover art for the audiobook in various sizes, widest first.
     *
     * @var list<ImageObject> $images
     */
    #[Api(list: ImageObject::class)]
    public array $images;

    /**
     * A list of the languages used in the audiobook, identified by their [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @var list<string> $languages
     */
    #[Api(list: 'string')]
    public array $languages;

    /**
     * The media type of the audiobook.
     */
    #[Api]
    public string $media_type;

    /**
     * The name of the audiobook.
     */
    #[Api]
    public string $name;

    /**
     * The narrator(s) for the audiobook.
     *
     * @var list<NarratorObject> $narrators
     */
    #[Api(list: NarratorObject::class)]
    public array $narrators;

    /**
     * The publisher of the audiobook.
     */
    #[Api]
    public string $publisher;

    /**
     * The number of chapters in this audiobook.
     */
    #[Api]
    public int $total_chapters;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the audiobook.
     */
    #[Api]
    public string $uri;

    /**
     * The edition of the audiobook.
     */
    #[Api(optional: true)]
    public ?string $edition;

    /**
     * The chapters of the audiobook.
     */
    #[Api]
    public Chapters $chapters;

    /**
     * `new AudiobookGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudiobookGetResponse::with(
     *   id: ...,
     *   authors: ...,
     *   available_markets: ...,
     *   copyrights: ...,
     *   description: ...,
     *   explicit: ...,
     *   external_urls: ...,
     *   href: ...,
     *   html_description: ...,
     *   images: ...,
     *   languages: ...,
     *   media_type: ...,
     *   name: ...,
     *   narrators: ...,
     *   publisher: ...,
     *   total_chapters: ...,
     *   uri: ...,
     *   chapters: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AudiobookGetResponse)
     *   ->withID(...)
     *   ->withAuthors(...)
     *   ->withAvailableMarkets(...)
     *   ->withCopyrights(...)
     *   ->withDescription(...)
     *   ->withExplicit(...)
     *   ->withExternalURLs(...)
     *   ->withHref(...)
     *   ->withHTMLDescription(...)
     *   ->withImages(...)
     *   ->withLanguages(...)
     *   ->withMediaType(...)
     *   ->withName(...)
     *   ->withNarrators(...)
     *   ->withPublisher(...)
     *   ->withTotalChapters(...)
     *   ->withUri(...)
     *   ->withChapters(...)
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
     * @param list<AuthorObject> $authors
     * @param list<string> $available_markets
     * @param list<CopyrightObject> $copyrights
     * @param list<ImageObject> $images
     * @param list<string> $languages
     * @param list<NarratorObject> $narrators
     */
    public static function with(
        string $id,
        array $authors,
        array $available_markets,
        array $copyrights,
        string $description,
        bool $explicit,
        ExternalURLObject $external_urls,
        string $href,
        string $html_description,
        array $images,
        array $languages,
        string $media_type,
        string $name,
        array $narrators,
        string $publisher,
        int $total_chapters,
        string $uri,
        Chapters $chapters,
        ?string $edition = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->authors = $authors;
        $obj->available_markets = $available_markets;
        $obj->copyrights = $copyrights;
        $obj->description = $description;
        $obj->explicit = $explicit;
        $obj->external_urls = $external_urls;
        $obj->href = $href;
        $obj->html_description = $html_description;
        $obj->images = $images;
        $obj->languages = $languages;
        $obj->media_type = $media_type;
        $obj->name = $name;
        $obj->narrators = $narrators;
        $obj->publisher = $publisher;
        $obj->total_chapters = $total_chapters;
        $obj->uri = $uri;
        $obj->chapters = $chapters;

        null !== $edition && $obj->edition = $edition;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the audiobook.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The author(s) for the audiobook.
     *
     * @param list<AuthorObject> $authors
     */
    public function withAuthors(array $authors): self
    {
        $obj = clone $this;
        $obj->authors = $authors;

        return $obj;
    }

    /**
     * A list of the countries in which the audiobook can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @param list<string> $availableMarkets
     */
    public function withAvailableMarkets(array $availableMarkets): self
    {
        $obj = clone $this;
        $obj->available_markets = $availableMarkets;

        return $obj;
    }

    /**
     * The copyright statements of the audiobook.
     *
     * @param list<CopyrightObject> $copyrights
     */
    public function withCopyrights(array $copyrights): self
    {
        $obj = clone $this;
        $obj->copyrights = $copyrights;

        return $obj;
    }

    /**
     * A description of the audiobook. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Whether or not the audiobook has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $obj = clone $this;
        $obj->explicit = $explicit;

        return $obj;
    }

    public function withExternalURLs(ExternalURLObject $externalURLs): self
    {
        $obj = clone $this;
        $obj->external_urls = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the audiobook.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * A description of the audiobook. This field may contain HTML tags.
     */
    public function withHTMLDescription(string $htmlDescription): self
    {
        $obj = clone $this;
        $obj->html_description = $htmlDescription;

        return $obj;
    }

    /**
     * The cover art for the audiobook in various sizes, widest first.
     *
     * @param list<ImageObject> $images
     */
    public function withImages(array $images): self
    {
        $obj = clone $this;
        $obj->images = $images;

        return $obj;
    }

    /**
     * A list of the languages used in the audiobook, identified by their [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @param list<string> $languages
     */
    public function withLanguages(array $languages): self
    {
        $obj = clone $this;
        $obj->languages = $languages;

        return $obj;
    }

    /**
     * The media type of the audiobook.
     */
    public function withMediaType(string $mediaType): self
    {
        $obj = clone $this;
        $obj->media_type = $mediaType;

        return $obj;
    }

    /**
     * The name of the audiobook.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The narrator(s) for the audiobook.
     *
     * @param list<NarratorObject> $narrators
     */
    public function withNarrators(array $narrators): self
    {
        $obj = clone $this;
        $obj->narrators = $narrators;

        return $obj;
    }

    /**
     * The publisher of the audiobook.
     */
    public function withPublisher(string $publisher): self
    {
        $obj = clone $this;
        $obj->publisher = $publisher;

        return $obj;
    }

    /**
     * The number of chapters in this audiobook.
     */
    public function withTotalChapters(int $totalChapters): self
    {
        $obj = clone $this;
        $obj->total_chapters = $totalChapters;

        return $obj;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the audiobook.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }

    /**
     * The edition of the audiobook.
     */
    public function withEdition(string $edition): self
    {
        $obj = clone $this;
        $obj->edition = $edition;

        return $obj;
    }

    /**
     * The chapters of the audiobook.
     */
    public function withChapters(Chapters $chapters): self
    {
        $obj = clone $this;
        $obj->chapters = $chapters;

        return $obj;
    }
}
