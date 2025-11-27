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
 *   available_markets: list<string>,
 *   copyrights: list<CopyrightObject>,
 *   description: string,
 *   explicit: bool,
 *   external_urls: ExternalURLObject,
 *   href: string,
 *   html_description: string,
 *   images: list<ImageObject>,
 *   is_externally_hosted: bool,
 *   languages: list<string>,
 *   media_type: string,
 *   name: string,
 *   publisher: string,
 *   total_episodes: int,
 *   type: 'show',
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
     *
     * @var 'show' $type
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
     * @var list<string> $available_markets
     */
    #[Api(list: 'string')]
    public array $available_markets;

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

    #[Api]
    public ExternalURLObject $external_urls;

    /**
     * A link to the Web API endpoint providing full details of the show.
     */
    #[Api]
    public string $href;

    /**
     * A description of the show. This field may contain HTML tags.
     */
    #[Api]
    public string $html_description;

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
    #[Api]
    public bool $is_externally_hosted;

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
    #[Api]
    public string $media_type;

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
    #[Api]
    public int $total_episodes;

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
     *   available_markets: ...,
     *   copyrights: ...,
     *   description: ...,
     *   explicit: ...,
     *   external_urls: ...,
     *   href: ...,
     *   html_description: ...,
     *   images: ...,
     *   is_externally_hosted: ...,
     *   languages: ...,
     *   media_type: ...,
     *   name: ...,
     *   publisher: ...,
     *   total_episodes: ...,
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
     * @param list<string> $available_markets
     * @param list<CopyrightObject> $copyrights
     * @param list<ImageObject> $images
     * @param list<string> $languages
     */
    public static function with(
        string $id,
        array $available_markets,
        array $copyrights,
        string $description,
        bool $explicit,
        ExternalURLObject $external_urls,
        string $href,
        string $html_description,
        array $images,
        bool $is_externally_hosted,
        array $languages,
        string $media_type,
        string $name,
        string $publisher,
        int $total_episodes,
        string $uri,
        Episodes $episodes,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->available_markets = $available_markets;
        $obj->copyrights = $copyrights;
        $obj->description = $description;
        $obj->explicit = $explicit;
        $obj->external_urls = $external_urls;
        $obj->href = $href;
        $obj->html_description = $html_description;
        $obj->images = $images;
        $obj->is_externally_hosted = $is_externally_hosted;
        $obj->languages = $languages;
        $obj->media_type = $media_type;
        $obj->name = $name;
        $obj->publisher = $publisher;
        $obj->total_episodes = $total_episodes;
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
        $obj->available_markets = $availableMarkets;

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
        $obj->external_urls = $externalURLs;

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
        $obj->html_description = $htmlDescription;

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
        $obj->is_externally_hosted = $isExternallyHosted;

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
        $obj->media_type = $mediaType;

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
        $obj->total_episodes = $totalEpisodes;

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
