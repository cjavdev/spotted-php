<?php

declare(strict_types=1);

namespace Spotted\Audiobooks;

use Spotted\Audiobooks\AudiobookGetResponse\Chapters;
use Spotted\AuthorObject;
use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\NarratorObject;

/**
 * @phpstan-import-type AuthorObjectShape from \Spotted\AuthorObject
 * @phpstan-import-type CopyrightObjectShape from \Spotted\CopyrightObject
 * @phpstan-import-type ExternalURLObjectShape from \Spotted\ExternalURLObject
 * @phpstan-import-type ImageObjectShape from \Spotted\ImageObject
 * @phpstan-import-type NarratorObjectShape from \Spotted\NarratorObject
 * @phpstan-import-type ChaptersShape from \Spotted\Audiobooks\AudiobookGetResponse\Chapters
 *
 * @phpstan-type AudiobookGetResponseShape = array{
 *   id: string,
 *   authors: list<AuthorObject|AuthorObjectShape>,
 *   availableMarkets: list<string>,
 *   copyrights: list<CopyrightObject|CopyrightObjectShape>,
 *   description: string,
 *   explicit: bool,
 *   externalURLs: ExternalURLObject|ExternalURLObjectShape,
 *   href: string,
 *   htmlDescription: string,
 *   images: list<ImageObject|ImageObjectShape>,
 *   languages: list<string>,
 *   mediaType: string,
 *   name: string,
 *   narrators: list<NarratorObject|NarratorObjectShape>,
 *   publisher: string,
 *   totalChapters: int,
 *   type: 'audiobook',
 *   uri: string,
 *   edition?: string|null,
 *   published?: bool|null,
 *   chapters: Chapters|ChaptersShape,
 * }
 */
final class AudiobookGetResponse implements BaseModel
{
    /** @use SdkModel<AudiobookGetResponseShape> */
    use SdkModel;

    /**
     * The object type.
     *
     * @var 'audiobook' $type
     */
    #[Required]
    public string $type = 'audiobook';

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the audiobook.
     */
    #[Required]
    public string $id;

    /**
     * The author(s) for the audiobook.
     *
     * @var list<AuthorObject> $authors
     */
    #[Required(list: AuthorObject::class)]
    public array $authors;

    /**
     * A list of the countries in which the audiobook can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @var list<string> $availableMarkets
     */
    #[Required('available_markets', list: 'string')]
    public array $availableMarkets;

    /**
     * The copyright statements of the audiobook.
     *
     * @var list<CopyrightObject> $copyrights
     */
    #[Required(list: CopyrightObject::class)]
    public array $copyrights;

    /**
     * A description of the audiobook. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    #[Required]
    public string $description;

    /**
     * Whether or not the audiobook has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    #[Required]
    public bool $explicit;

    #[Required('external_urls')]
    public ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the audiobook.
     */
    #[Required]
    public string $href;

    /**
     * A description of the audiobook. This field may contain HTML tags.
     */
    #[Required('html_description')]
    public string $htmlDescription;

    /**
     * The cover art for the audiobook in various sizes, widest first.
     *
     * @var list<ImageObject> $images
     */
    #[Required(list: ImageObject::class)]
    public array $images;

    /**
     * A list of the languages used in the audiobook, identified by their [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @var list<string> $languages
     */
    #[Required(list: 'string')]
    public array $languages;

    /**
     * The media type of the audiobook.
     */
    #[Required('media_type')]
    public string $mediaType;

    /**
     * The name of the audiobook.
     */
    #[Required]
    public string $name;

    /**
     * The narrator(s) for the audiobook.
     *
     * @var list<NarratorObject> $narrators
     */
    #[Required(list: NarratorObject::class)]
    public array $narrators;

    /**
     * The publisher of the audiobook.
     */
    #[Required]
    public string $publisher;

    /**
     * The number of chapters in this audiobook.
     */
    #[Required('total_chapters')]
    public int $totalChapters;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the audiobook.
     */
    #[Required]
    public string $uri;

    /**
     * The edition of the audiobook.
     */
    #[Optional]
    public ?string $edition;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * The chapters of the audiobook.
     */
    #[Required]
    public Chapters $chapters;

    /**
     * `new AudiobookGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudiobookGetResponse::with(
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
     * @param list<AuthorObject|AuthorObjectShape> $authors
     * @param list<string> $availableMarkets
     * @param list<CopyrightObject|CopyrightObjectShape> $copyrights
     * @param ExternalURLObject|ExternalURLObjectShape $externalURLs
     * @param list<ImageObject|ImageObjectShape> $images
     * @param list<string> $languages
     * @param list<NarratorObject|NarratorObjectShape> $narrators
     * @param Chapters|ChaptersShape $chapters
     */
    public static function with(
        string $id,
        array $authors,
        array $availableMarkets,
        array $copyrights,
        string $description,
        bool $explicit,
        ExternalURLObject|array $externalURLs,
        string $href,
        string $htmlDescription,
        array $images,
        array $languages,
        string $mediaType,
        string $name,
        array $narrators,
        string $publisher,
        int $totalChapters,
        string $uri,
        Chapters|array $chapters,
        ?string $edition = null,
        ?bool $published = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['authors'] = $authors;
        $self['availableMarkets'] = $availableMarkets;
        $self['copyrights'] = $copyrights;
        $self['description'] = $description;
        $self['explicit'] = $explicit;
        $self['externalURLs'] = $externalURLs;
        $self['href'] = $href;
        $self['htmlDescription'] = $htmlDescription;
        $self['images'] = $images;
        $self['languages'] = $languages;
        $self['mediaType'] = $mediaType;
        $self['name'] = $name;
        $self['narrators'] = $narrators;
        $self['publisher'] = $publisher;
        $self['totalChapters'] = $totalChapters;
        $self['uri'] = $uri;
        $self['chapters'] = $chapters;

        null !== $edition && $self['edition'] = $edition;
        null !== $published && $self['published'] = $published;

        return $self;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the audiobook.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The author(s) for the audiobook.
     *
     * @param list<AuthorObject|AuthorObjectShape> $authors
     */
    public function withAuthors(array $authors): self
    {
        $self = clone $this;
        $self['authors'] = $authors;

        return $self;
    }

    /**
     * A list of the countries in which the audiobook can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @param list<string> $availableMarkets
     */
    public function withAvailableMarkets(array $availableMarkets): self
    {
        $self = clone $this;
        $self['availableMarkets'] = $availableMarkets;

        return $self;
    }

    /**
     * The copyright statements of the audiobook.
     *
     * @param list<CopyrightObject|CopyrightObjectShape> $copyrights
     */
    public function withCopyrights(array $copyrights): self
    {
        $self = clone $this;
        $self['copyrights'] = $copyrights;

        return $self;
    }

    /**
     * A description of the audiobook. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Whether or not the audiobook has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $self = clone $this;
        $self['explicit'] = $explicit;

        return $self;
    }

    /**
     * @param ExternalURLObject|ExternalURLObjectShape $externalURLs
     */
    public function withExternalURLs(
        ExternalURLObject|array $externalURLs
    ): self {
        $self = clone $this;
        $self['externalURLs'] = $externalURLs;

        return $self;
    }

    /**
     * A link to the Web API endpoint providing full details of the audiobook.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    /**
     * A description of the audiobook. This field may contain HTML tags.
     */
    public function withHTMLDescription(string $htmlDescription): self
    {
        $self = clone $this;
        $self['htmlDescription'] = $htmlDescription;

        return $self;
    }

    /**
     * The cover art for the audiobook in various sizes, widest first.
     *
     * @param list<ImageObject|ImageObjectShape> $images
     */
    public function withImages(array $images): self
    {
        $self = clone $this;
        $self['images'] = $images;

        return $self;
    }

    /**
     * A list of the languages used in the audiobook, identified by their [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @param list<string> $languages
     */
    public function withLanguages(array $languages): self
    {
        $self = clone $this;
        $self['languages'] = $languages;

        return $self;
    }

    /**
     * The media type of the audiobook.
     */
    public function withMediaType(string $mediaType): self
    {
        $self = clone $this;
        $self['mediaType'] = $mediaType;

        return $self;
    }

    /**
     * The name of the audiobook.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The narrator(s) for the audiobook.
     *
     * @param list<NarratorObject|NarratorObjectShape> $narrators
     */
    public function withNarrators(array $narrators): self
    {
        $self = clone $this;
        $self['narrators'] = $narrators;

        return $self;
    }

    /**
     * The publisher of the audiobook.
     */
    public function withPublisher(string $publisher): self
    {
        $self = clone $this;
        $self['publisher'] = $publisher;

        return $self;
    }

    /**
     * The number of chapters in this audiobook.
     */
    public function withTotalChapters(int $totalChapters): self
    {
        $self = clone $this;
        $self['totalChapters'] = $totalChapters;

        return $self;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the audiobook.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }

    /**
     * The edition of the audiobook.
     */
    public function withEdition(string $edition): self
    {
        $self = clone $this;
        $self['edition'] = $edition;

        return $self;
    }

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }

    /**
     * The chapters of the audiobook.
     *
     * @param Chapters|ChaptersShape $chapters
     */
    public function withChapters(Chapters|array $chapters): self
    {
        $self = clone $this;
        $self['chapters'] = $chapters;

        return $self;
    }
}
