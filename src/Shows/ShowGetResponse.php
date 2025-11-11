<?php

declare(strict_types=1);

namespace Spotted\Shows;

use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\Shows\ShowGetResponse\Episodes;

/**
 * @phpstan-type ShowGetResponseShape = array{
 *   id: string,
 *   availableMarkets: list<string>,
 *   copyrights: list<CopyrightObject>,
 *   description: string,
 *   explicit: bool,
 *   externalURLs: ExternalURLObject,
 *   href: string,
 *   htmlDescription: string,
 *   images: list<ImageObject>,
 *   isExternallyHosted: bool,
 *   languages: list<string>,
 *   mediaType: string,
 *   name: string,
 *   publisher: string,
 *   totalEpisodes: int,
 *   type: string,
 *   uri: string,
 *   episodes: Episodes,
 * }
 */
final class ShowGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ShowGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The object type.
     */
    #[Api]
    public string $type = 'show';

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the show.
     */
    #[Api]
    public string $id;

    /**
     * A list of the countries in which the show can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @var list<string> $availableMarkets
     */
    #[Api('available_markets', list: 'string')]
    public array $availableMarkets;

    /**
     * The copyright statements of the show.
     *
     * @var list<CopyrightObject> $copyrights
     */
    #[Api(list: CopyrightObject::class)]
    public array $copyrights;

    /**
     * A description of the show. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    #[Api]
    public string $description;

    /**
     * Whether or not the show has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    #[Api]
    public bool $explicit;

    #[Api('external_urls')]
    public ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the show.
     */
    #[Api]
    public string $href;

    /**
     * A description of the show. This field may contain HTML tags.
     */
    #[Api('html_description')]
    public string $htmlDescription;

    /**
     * The cover art for the show in various sizes, widest first.
     *
     * @var list<ImageObject> $images
     */
    #[Api(list: ImageObject::class)]
    public array $images;

    /**
     * True if all of the shows episodes are hosted outside of Spotify's CDN. This field might be `null` in some cases.
     */
    #[Api('is_externally_hosted')]
    public bool $isExternallyHosted;

    /**
     * A list of the languages used in the show, identified by their [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @var list<string> $languages
     */
    #[Api(list: 'string')]
    public array $languages;

    /**
     * The media type of the show.
     */
    #[Api('media_type')]
    public string $mediaType;

    /**
     * The name of the episode.
     */
    #[Api]
    public string $name;

    /**
     * The publisher of the show.
     */
    #[Api]
    public string $publisher;

    /**
     * The total number of episodes in the show.
     */
    #[Api('total_episodes')]
    public int $totalEpisodes;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the show.
     */
    #[Api]
    public string $uri;

    /**
     * The episodes of the show.
     */
    #[Api]
    public Episodes $episodes;

    /**
     * `new ShowGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ShowGetResponse::with(
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
     *   episodes: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ShowGetResponse)
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
     *   ->withEpisodes(...)
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
     * @param list<CopyrightObject> $copyrights
     * @param list<ImageObject> $images
     * @param list<string> $languages
     */
    public static function with(
        string $id,
        array $availableMarkets,
        array $copyrights,
        string $description,
        bool $explicit,
        ExternalURLObject $externalURLs,
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
        Episodes $episodes,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->availableMarkets = $availableMarkets;
        $obj->copyrights = $copyrights;
        $obj->description = $description;
        $obj->explicit = $explicit;
        $obj->externalURLs = $externalURLs;
        $obj->href = $href;
        $obj->htmlDescription = $htmlDescription;
        $obj->images = $images;
        $obj->isExternallyHosted = $isExternallyHosted;
        $obj->languages = $languages;
        $obj->mediaType = $mediaType;
        $obj->name = $name;
        $obj->publisher = $publisher;
        $obj->totalEpisodes = $totalEpisodes;
        $obj->uri = $uri;
        $obj->episodes = $episodes;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the show.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * A list of the countries in which the show can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
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
     * The copyright statements of the show.
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
     * A description of the show. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Whether or not the show has explicit content (true = yes it does; false = no it does not OR unknown).
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
     * A link to the Web API endpoint providing full details of the show.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * A description of the show. This field may contain HTML tags.
     */
    public function withHTMLDescription(string $htmlDescription): self
    {
        $obj = clone $this;
        $obj->htmlDescription = $htmlDescription;

        return $obj;
    }

    /**
     * The cover art for the show in various sizes, widest first.
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
     * True if all of the shows episodes are hosted outside of Spotify's CDN. This field might be `null` in some cases.
     */
    public function withIsExternallyHosted(bool $isExternallyHosted): self
    {
        $obj = clone $this;
        $obj->isExternallyHosted = $isExternallyHosted;

        return $obj;
    }

    /**
     * A list of the languages used in the show, identified by their [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code.
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
     * The media type of the show.
     */
    public function withMediaType(string $mediaType): self
    {
        $obj = clone $this;
        $obj->mediaType = $mediaType;

        return $obj;
    }

    /**
     * The name of the episode.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The publisher of the show.
     */
    public function withPublisher(string $publisher): self
    {
        $obj = clone $this;
        $obj->publisher = $publisher;

        return $obj;
    }

    /**
     * The total number of episodes in the show.
     */
    public function withTotalEpisodes(int $totalEpisodes): self
    {
        $obj = clone $this;
        $obj->totalEpisodes = $totalEpisodes;

        return $obj;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the show.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }

    /**
     * The episodes of the show.
     */
    public function withEpisodes(Episodes $episodes): self
    {
        $obj = clone $this;
        $obj->episodes = $episodes;

        return $obj;
    }
}
