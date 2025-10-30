<?php

declare(strict_types=1);

namespace Spotted\Me\Audiobooks\AudiobookListResponse;

use Spotted\AudiobookBase\Type;
use Spotted\AuthorObject;
use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\Me\Audiobooks\AudiobookListResponse\Audiobook\Chapters;
use Spotted\NarratorObject;

/**
 * Information about the audiobook.
 *
 * @phpstan-type AudiobookShape = array{
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
 *   type: value-of<Type>,
 *   uri: string,
 *   edition?: string,
 *   chapters: Chapters,
 * }
 */
final class Audiobook implements BaseModel
{
    /** @use SdkModel<AudiobookShape> */
    use SdkModel;

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
     * @var list<string> $availableMarkets
     */
    #[Api('available_markets', list: 'string')]
    public array $availableMarkets;

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

    #[Api('external_urls')]
    public ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the audiobook.
     */
    #[Api]
    public string $href;

    /**
     * A description of the audiobook. This field may contain HTML tags.
     */
    #[Api('html_description')]
    public string $htmlDescription;

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
    #[Api('media_type')]
    public string $mediaType;

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
    #[Api('total_chapters')]
    public int $totalChapters;

    /**
     * The object type.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

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
     * `new Audiobook()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Audiobook::with(
     *   id: ...,
     *   authors: ...,
     *   availableMarkets: ...,
     *   copyrights: ...,
     *   description: ...,
     *   explicit: ...,
     *   externalURLs: ...,
     *   href: ...,
     *   htmlDescription: ...,
     *   images: ...,
     *   languages: ...,
     *   mediaType: ...,
     *   name: ...,
     *   narrators: ...,
     *   publisher: ...,
     *   totalChapters: ...,
     *   type: ...,
     *   uri: ...,
     *   chapters: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Audiobook)
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
     *   ->withType(...)
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
     * @param list<string> $availableMarkets
     * @param list<CopyrightObject> $copyrights
     * @param list<ImageObject> $images
     * @param list<string> $languages
     * @param list<NarratorObject> $narrators
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        array $authors,
        array $availableMarkets,
        array $copyrights,
        string $description,
        bool $explicit,
        ExternalURLObject $externalURLs,
        string $href,
        string $htmlDescription,
        array $images,
        array $languages,
        string $mediaType,
        string $name,
        array $narrators,
        string $publisher,
        int $totalChapters,
        Type|string $type,
        string $uri,
        Chapters $chapters,
        ?string $edition = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->authors = $authors;
        $obj->availableMarkets = $availableMarkets;
        $obj->copyrights = $copyrights;
        $obj->description = $description;
        $obj->explicit = $explicit;
        $obj->externalURLs = $externalURLs;
        $obj->href = $href;
        $obj->htmlDescription = $htmlDescription;
        $obj->images = $images;
        $obj->languages = $languages;
        $obj->mediaType = $mediaType;
        $obj->name = $name;
        $obj->narrators = $narrators;
        $obj->publisher = $publisher;
        $obj->totalChapters = $totalChapters;
        $obj['type'] = $type;
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
        $obj->availableMarkets = $availableMarkets;

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
        $obj->externalURLs = $externalURLs;

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
        $obj->htmlDescription = $htmlDescription;

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
        $obj->mediaType = $mediaType;

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
        $obj->totalChapters = $totalChapters;

        return $obj;
    }

    /**
     * The object type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

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
