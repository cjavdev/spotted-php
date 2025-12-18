<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CopyrightObjectShape from \Spotted\CopyrightObject
 * @phpstan-import-type ExternalURLObjectShape from \Spotted\ExternalURLObject
 * @phpstan-import-type ImageObjectShape from \Spotted\ImageObject
 *
 * @phpstan-type ShowBaseShape = array{
 *   id: string,
 *   availableMarkets: list<string>,
 *   copyrights: list<CopyrightObjectShape>,
 *   description: string,
 *   explicit: bool,
 *   externalURLs: ExternalURLObject|ExternalURLObjectShape,
 *   href: string,
 *   htmlDescription: string,
 *   images: list<ImageObjectShape>,
 *   isExternallyHosted: bool,
 *   languages: list<string>,
 *   mediaType: string,
 *   name: string,
 *   publisher: string,
 *   totalEpisodes: int,
 *   type: 'show',
 *   uri: string,
 *   published?: bool|null,
 * }
 */
final class ShowBase implements BaseModel
{
    /** @use SdkModel<ShowBaseShape> */
    use SdkModel;

    /**
     * The object type.
     *
     * @var 'show' $type
     */
    #[Required]
    public string $type = 'show';

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the show.
     */
    #[Required]
    public string $id;

    /**
     * A list of the countries in which the show can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @var list<string> $availableMarkets
     */
    #[Required('available_markets', list: 'string')]
    public array $availableMarkets;

    /**
     * The copyright statements of the show.
     *
     * @var list<CopyrightObject> $copyrights
     */
    #[Required(list: CopyrightObject::class)]
    public array $copyrights;

    /**
     * A description of the show. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    #[Required]
    public string $description;

    /**
     * Whether or not the show has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    #[Required]
    public bool $explicit;

    /**
     * External URLs for this show.
     */
    #[Required('external_urls')]
    public ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the show.
     */
    #[Required]
    public string $href;

    /**
     * A description of the show. This field may contain HTML tags.
     */
    #[Required('html_description')]
    public string $htmlDescription;

    /**
     * The cover art for the show in various sizes, widest first.
     *
     * @var list<ImageObject> $images
     */
    #[Required(list: ImageObject::class)]
    public array $images;

    /**
     * True if all of the shows episodes are hosted outside of Spotify's CDN. This field might be `null` in some cases.
     */
    #[Required('is_externally_hosted')]
    public bool $isExternallyHosted;

    /**
     * A list of the languages used in the show, identified by their [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @var list<string> $languages
     */
    #[Required(list: 'string')]
    public array $languages;

    /**
     * The media type of the show.
     */
    #[Required('media_type')]
    public string $mediaType;

    /**
     * The name of the episode.
     */
    #[Required]
    public string $name;

    /**
     * The publisher of the show.
     */
    #[Required]
    public string $publisher;

    /**
     * The total number of episodes in the show.
     */
    #[Required('total_episodes')]
    public int $totalEpisodes;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the show.
     */
    #[Required]
    public string $uri;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * `new ShowBase()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ShowBase::with(
     *   id: ...,
     *   availableMarkets: ...,
     *   copyrights: ...,
     *   description: ...,
     *   explicit: ...,
     *   externalURLs: ...,
     *   href: ...,
     *   htmlDescription: ...,
     *   images: ...,
     *   isExternallyHosted: ...,
     *   languages: ...,
     *   mediaType: ...,
     *   name: ...,
     *   publisher: ...,
     *   totalEpisodes: ...,
     *   uri: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ShowBase)
     *   ->withID(...)
     *   ->withAvailableMarkets(...)
     *   ->withCopyrights(...)
     *   ->withDescription(...)
     *   ->withExplicit(...)
     *   ->withExternalURLs(...)
     *   ->withHref(...)
     *   ->withHTMLDescription(...)
     *   ->withImages(...)
     *   ->withIsExternallyHosted(...)
     *   ->withLanguages(...)
     *   ->withMediaType(...)
     *   ->withName(...)
     *   ->withPublisher(...)
     *   ->withTotalEpisodes(...)
     *   ->withUri(...)
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
     * @param list<string> $availableMarkets
     * @param list<CopyrightObjectShape> $copyrights
     * @param ExternalURLObject|ExternalURLObjectShape $externalURLs
     * @param list<ImageObjectShape> $images
     * @param list<string> $languages
     */
    public static function with(
        string $id,
        array $availableMarkets,
        array $copyrights,
        string $description,
        bool $explicit,
        ExternalURLObject|array $externalURLs,
        string $href,
        string $htmlDescription,
        array $images,
        bool $isExternallyHosted,
        array $languages,
        string $mediaType,
        string $name,
        string $publisher,
        int $totalEpisodes,
        string $uri,
        ?bool $published = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['availableMarkets'] = $availableMarkets;
        $self['copyrights'] = $copyrights;
        $self['description'] = $description;
        $self['explicit'] = $explicit;
        $self['externalURLs'] = $externalURLs;
        $self['href'] = $href;
        $self['htmlDescription'] = $htmlDescription;
        $self['images'] = $images;
        $self['isExternallyHosted'] = $isExternallyHosted;
        $self['languages'] = $languages;
        $self['mediaType'] = $mediaType;
        $self['name'] = $name;
        $self['publisher'] = $publisher;
        $self['totalEpisodes'] = $totalEpisodes;
        $self['uri'] = $uri;

        null !== $published && $self['published'] = $published;

        return $self;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the show.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A list of the countries in which the show can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
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
     * The copyright statements of the show.
     *
     * @param list<CopyrightObjectShape> $copyrights
     */
    public function withCopyrights(array $copyrights): self
    {
        $self = clone $this;
        $self['copyrights'] = $copyrights;

        return $self;
    }

    /**
     * A description of the show. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Whether or not the show has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $self = clone $this;
        $self['explicit'] = $explicit;

        return $self;
    }

    /**
     * External URLs for this show.
     *
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
     * A link to the Web API endpoint providing full details of the show.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    /**
     * A description of the show. This field may contain HTML tags.
     */
    public function withHTMLDescription(string $htmlDescription): self
    {
        $self = clone $this;
        $self['htmlDescription'] = $htmlDescription;

        return $self;
    }

    /**
     * The cover art for the show in various sizes, widest first.
     *
     * @param list<ImageObjectShape> $images
     */
    public function withImages(array $images): self
    {
        $self = clone $this;
        $self['images'] = $images;

        return $self;
    }

    /**
     * True if all of the shows episodes are hosted outside of Spotify's CDN. This field might be `null` in some cases.
     */
    public function withIsExternallyHosted(bool $isExternallyHosted): self
    {
        $self = clone $this;
        $self['isExternallyHosted'] = $isExternallyHosted;

        return $self;
    }

    /**
     * A list of the languages used in the show, identified by their [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code.
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
     * The media type of the show.
     */
    public function withMediaType(string $mediaType): self
    {
        $self = clone $this;
        $self['mediaType'] = $mediaType;

        return $self;
    }

    /**
     * The name of the episode.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The publisher of the show.
     */
    public function withPublisher(string $publisher): self
    {
        $self = clone $this;
        $self['publisher'] = $publisher;

        return $self;
    }

    /**
     * The total number of episodes in the show.
     */
    public function withTotalEpisodes(int $totalEpisodes): self
    {
        $self = clone $this;
        $self['totalEpisodes'] = $totalEpisodes;

        return $self;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the show.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

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
}
