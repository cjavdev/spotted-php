<?php

declare(strict_types=1);

namespace Spotted\Me\Albums\AlbumListResponse;

use Spotted\AlbumRestrictionObject;
use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalIDObject;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\Me\Albums\AlbumListResponse\Album\AlbumType;
use Spotted\Me\Albums\AlbumListResponse\Album\ReleaseDatePrecision;
use Spotted\Me\Albums\AlbumListResponse\Album\Tracks;
use Spotted\Me\Albums\AlbumListResponse\Album\Type;
use Spotted\SimplifiedArtistObject;

/**
 * Information about the album.
 *
 * @phpstan-type album_alias = array{
 *   id: string,
 *   albumType: value-of<AlbumType>,
 *   availableMarkets: list<string>,
 *   externalURLs: ExternalURLObject,
 *   href: string,
 *   images: list<ImageObject>,
 *   name: string,
 *   releaseDate: string,
 *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
 *   totalTracks: int,
 *   type: value-of<Type>,
 *   uri: string,
 *   artists?: list<SimplifiedArtistObject>,
 *   copyrights?: list<CopyrightObject>,
 *   externalIDs?: ExternalIDObject,
 *   genres?: list<string>,
 *   label?: string,
 *   popularity?: int,
 *   restrictions?: AlbumRestrictionObject,
 *   tracks?: Tracks,
 * }
 */
final class Album implements BaseModel
{
    /** @use SdkModel<album_alias> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    #[Api]
    public string $id;

    /**
     * The type of the album.
     *
     * @var value-of<AlbumType> $albumType
     */
    #[Api('album_type', enum: AlbumType::class)]
    public string $albumType;

    /**
     * The markets in which the album is available: [ISO 3166-1 alpha-2 country codes](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). _**NOTE**: an album is considered available in a market when at least 1 of its tracks is available in that market._.
     *
     * @var list<string> $availableMarkets
     */
    #[Api('available_markets', list: 'string')]
    public array $availableMarkets;

    /**
     * Known external URLs for this album.
     */
    #[Api('external_urls')]
    public ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the album.
     */
    #[Api]
    public string $href;

    /**
     * The cover art for the album in various sizes, widest first.
     *
     * @var list<ImageObject> $images
     */
    #[Api(list: ImageObject::class)]
    public array $images;

    /**
     * The name of the album. In case of an album takedown, the value may be an empty string.
     */
    #[Api]
    public string $name;

    /**
     * The date the album was first released.
     */
    #[Api('release_date')]
    public string $releaseDate;

    /**
     * The precision with which `release_date` value is known.
     *
     * @var value-of<ReleaseDatePrecision> $releaseDatePrecision
     */
    #[Api('release_date_precision', enum: ReleaseDatePrecision::class)]
    public string $releaseDatePrecision;

    /**
     * The number of tracks in the album.
     */
    #[Api('total_tracks')]
    public int $totalTracks;

    /**
     * The object type.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    #[Api]
    public string $uri;

    /**
     * The artists of the album. Each artist object includes a link in `href` to more detailed information about the artist.
     *
     * @var list<SimplifiedArtistObject>|null $artists
     */
    #[Api(list: SimplifiedArtistObject::class, optional: true)]
    public ?array $artists;

    /**
     * The copyright statements of the album.
     *
     * @var list<CopyrightObject>|null $copyrights
     */
    #[Api(list: CopyrightObject::class, optional: true)]
    public ?array $copyrights;

    /**
     * Known external IDs for the album.
     */
    #[Api('external_ids', optional: true)]
    public ?ExternalIDObject $externalIDs;

    /**
     * @deprecated
     *
     * **Deprecated** The array is always empty
     *
     * @var list<string>|null $genres
     */
    #[Api(list: 'string', optional: true)]
    public ?array $genres;

    /**
     * The label associated with the album.
     */
    #[Api(optional: true)]
    public ?string $label;

    /**
     * The popularity of the album. The value will be between 0 and 100, with 100 being the most popular.
     */
    #[Api(optional: true)]
    public ?int $popularity;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Api(optional: true)]
    public ?AlbumRestrictionObject $restrictions;

    /**
     * The tracks of the album.
     */
    #[Api(optional: true)]
    public ?Tracks $tracks;

    /**
     * `new Album()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Album::with(
     *   id: ...,
     *   albumType: ...,
     *   availableMarkets: ...,
     *   externalURLs: ...,
     *   href: ...,
     *   images: ...,
     *   name: ...,
     *   releaseDate: ...,
     *   releaseDatePrecision: ...,
     *   totalTracks: ...,
     *   type: ...,
     *   uri: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Album)
     *   ->withID(...)
     *   ->withAlbumType(...)
     *   ->withAvailableMarkets(...)
     *   ->withExternalURLs(...)
     *   ->withHref(...)
     *   ->withImages(...)
     *   ->withName(...)
     *   ->withReleaseDate(...)
     *   ->withReleaseDatePrecision(...)
     *   ->withTotalTracks(...)
     *   ->withType(...)
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
     * @param AlbumType|value-of<AlbumType> $albumType
     * @param list<string> $availableMarkets
     * @param list<ImageObject> $images
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     * @param Type|value-of<Type> $type
     * @param list<SimplifiedArtistObject> $artists
     * @param list<CopyrightObject> $copyrights
     * @param list<string> $genres
     */
    public static function with(
        string $id,
        AlbumType|string $albumType,
        array $availableMarkets,
        ExternalURLObject $externalURLs,
        string $href,
        array $images,
        string $name,
        string $releaseDate,
        ReleaseDatePrecision|string $releaseDatePrecision,
        int $totalTracks,
        Type|string $type,
        string $uri,
        ?array $artists = null,
        ?array $copyrights = null,
        ?ExternalIDObject $externalIDs = null,
        ?array $genres = null,
        ?string $label = null,
        ?int $popularity = null,
        ?AlbumRestrictionObject $restrictions = null,
        ?Tracks $tracks = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj['albumType'] = $albumType;
        $obj->availableMarkets = $availableMarkets;
        $obj->externalURLs = $externalURLs;
        $obj->href = $href;
        $obj->images = $images;
        $obj->name = $name;
        $obj->releaseDate = $releaseDate;
        $obj['releaseDatePrecision'] = $releaseDatePrecision;
        $obj->totalTracks = $totalTracks;
        $obj['type'] = $type;
        $obj->uri = $uri;

        null !== $artists && $obj->artists = $artists;
        null !== $copyrights && $obj->copyrights = $copyrights;
        null !== $externalIDs && $obj->externalIDs = $externalIDs;
        null !== $genres && $obj->genres = $genres;
        null !== $label && $obj->label = $label;
        null !== $popularity && $obj->popularity = $popularity;
        null !== $restrictions && $obj->restrictions = $restrictions;
        null !== $tracks && $obj->tracks = $tracks;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The type of the album.
     *
     * @param AlbumType|value-of<AlbumType> $albumType
     */
    public function withAlbumType(AlbumType|string $albumType): self
    {
        $obj = clone $this;
        $obj['albumType'] = $albumType;

        return $obj;
    }

    /**
     * The markets in which the album is available: [ISO 3166-1 alpha-2 country codes](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). _**NOTE**: an album is considered available in a market when at least 1 of its tracks is available in that market._.
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
     * Known external URLs for this album.
     */
    public function withExternalURLs(ExternalURLObject $externalURLs): self
    {
        $obj = clone $this;
        $obj->externalURLs = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the album.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * The cover art for the album in various sizes, widest first.
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
     * The name of the album. In case of an album takedown, the value may be an empty string.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The date the album was first released.
     */
    public function withReleaseDate(string $releaseDate): self
    {
        $obj = clone $this;
        $obj->releaseDate = $releaseDate;

        return $obj;
    }

    /**
     * The precision with which `release_date` value is known.
     *
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     */
    public function withReleaseDatePrecision(
        ReleaseDatePrecision|string $releaseDatePrecision
    ): self {
        $obj = clone $this;
        $obj['releaseDatePrecision'] = $releaseDatePrecision;

        return $obj;
    }

    /**
     * The number of tracks in the album.
     */
    public function withTotalTracks(int $totalTracks): self
    {
        $obj = clone $this;
        $obj->totalTracks = $totalTracks;

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
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }

    /**
     * The artists of the album. Each artist object includes a link in `href` to more detailed information about the artist.
     *
     * @param list<SimplifiedArtistObject> $artists
     */
    public function withArtists(array $artists): self
    {
        $obj = clone $this;
        $obj->artists = $artists;

        return $obj;
    }

    /**
     * The copyright statements of the album.
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
     * Known external IDs for the album.
     */
    public function withExternalIDs(ExternalIDObject $externalIDs): self
    {
        $obj = clone $this;
        $obj->externalIDs = $externalIDs;

        return $obj;
    }

    /**
     * **Deprecated** The array is always empty.
     *
     * @param list<string> $genres
     */
    public function withGenres(array $genres): self
    {
        $obj = clone $this;
        $obj->genres = $genres;

        return $obj;
    }

    /**
     * The label associated with the album.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * The popularity of the album. The value will be between 0 and 100, with 100 being the most popular.
     */
    public function withPopularity(int $popularity): self
    {
        $obj = clone $this;
        $obj->popularity = $popularity;

        return $obj;
    }

    /**
     * Included in the response when a content restriction is applied.
     */
    public function withRestrictions(AlbumRestrictionObject $restrictions): self
    {
        $obj = clone $this;
        $obj->restrictions = $restrictions;

        return $obj;
    }

    /**
     * The tracks of the album.
     */
    public function withTracks(Tracks $tracks): self
    {
        $obj = clone $this;
        $obj->tracks = $tracks;

        return $obj;
    }
}
