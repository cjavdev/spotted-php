<?php

declare(strict_types=1);

namespace Spotted\Me\Albums\AlbumListResponse;

use Spotted\AlbumRestrictionObject;
use Spotted\AlbumRestrictionObject\Reason;
use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalIDObject;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\Me\Albums\AlbumListResponse\Album\AlbumType;
use Spotted\Me\Albums\AlbumListResponse\Album\ReleaseDatePrecision;
use Spotted\Me\Albums\AlbumListResponse\Album\Tracks;
use Spotted\SimplifiedArtistObject;
use Spotted\SimplifiedArtistObject\Type;
use Spotted\SimplifiedTrackObject;

/**
 * Information about the album.
 *
 * @phpstan-type AlbumShape = array{
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
 *   type?: 'album',
 *   uri: string,
 *   artists?: list<SimplifiedArtistObject>|null,
 *   copyrights?: list<CopyrightObject>|null,
 *   externalIDs?: ExternalIDObject|null,
 *   genres?: list<string>|null,
 *   label?: string|null,
 *   popularity?: int|null,
 *   restrictions?: AlbumRestrictionObject|null,
 *   tracks?: Tracks|null,
 * }
 */
final class Album implements BaseModel
{
    /** @use SdkModel<AlbumShape> */
    use SdkModel;

    /**
     * The object type.
     *
     * @var 'album' $type
     */
    #[Required]
    public string $type = 'album';

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    #[Required]
    public string $id;

    /**
     * The type of the album.
     *
     * @var value-of<AlbumType> $albumType
     */
    #[Required('album_type', enum: AlbumType::class)]
    public string $albumType;

    /**
     * The markets in which the album is available: [ISO 3166-1 alpha-2 country codes](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). _**NOTE**: an album is considered available in a market when at least 1 of its tracks is available in that market._.
     *
     * @var list<string> $availableMarkets
     */
    #[Required('available_markets', list: 'string')]
    public array $availableMarkets;

    /**
     * Known external URLs for this album.
     */
    #[Required('external_urls')]
    public ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the album.
     */
    #[Required]
    public string $href;

    /**
     * The cover art for the album in various sizes, widest first.
     *
     * @var list<ImageObject> $images
     */
    #[Required(list: ImageObject::class)]
    public array $images;

    /**
     * The name of the album. In case of an album takedown, the value may be an empty string.
     */
    #[Required]
    public string $name;

    /**
     * The date the album was first released.
     */
    #[Required('release_date')]
    public string $releaseDate;

    /**
     * The precision with which `release_date` value is known.
     *
     * @var value-of<ReleaseDatePrecision> $releaseDatePrecision
     */
    #[Required('release_date_precision', enum: ReleaseDatePrecision::class)]
    public string $releaseDatePrecision;

    /**
     * The number of tracks in the album.
     */
    #[Required('total_tracks')]
    public int $totalTracks;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    #[Required]
    public string $uri;

    /**
     * The artists of the album. Each artist object includes a link in `href` to more detailed information about the artist.
     *
     * @var list<SimplifiedArtistObject>|null $artists
     */
    #[Optional(list: SimplifiedArtistObject::class)]
    public ?array $artists;

    /**
     * The copyright statements of the album.
     *
     * @var list<CopyrightObject>|null $copyrights
     */
    #[Optional(list: CopyrightObject::class)]
    public ?array $copyrights;

    /**
     * Known external IDs for the album.
     */
    #[Optional('external_ids')]
    public ?ExternalIDObject $externalIDs;

    /**
     * @deprecated
     *
     * **Deprecated** The array is always empty
     *
     * @var list<string>|null $genres
     */
    #[Optional(list: 'string')]
    public ?array $genres;

    /**
     * The label associated with the album.
     */
    #[Optional]
    public ?string $label;

    /**
     * The popularity of the album. The value will be between 0 and 100, with 100 being the most popular.
     */
    #[Optional]
    public ?int $popularity;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Optional]
    public ?AlbumRestrictionObject $restrictions;

    /**
     * The tracks of the album.
     */
    #[Optional]
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
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $images
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     * @param list<SimplifiedArtistObject|array{
     *   id?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   name?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }> $artists
     * @param list<CopyrightObject|array{
     *   text?: string|null, type?: string|null
     * }> $copyrights
     * @param ExternalIDObject|array{
     *   ean?: string|null, isrc?: string|null, upc?: string|null
     * } $externalIDs
     * @param list<string> $genres
     * @param AlbumRestrictionObject|array{
     *   reason?: value-of<Reason>|null
     * } $restrictions
     * @param Tracks|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<SimplifiedTrackObject>|null,
     * } $tracks
     */
    public static function with(
        string $id,
        AlbumType|string $albumType,
        array $availableMarkets,
        ExternalURLObject|array $externalURLs,
        string $href,
        array $images,
        string $name,
        string $releaseDate,
        ReleaseDatePrecision|string $releaseDatePrecision,
        int $totalTracks,
        string $uri,
        ?array $artists = null,
        ?array $copyrights = null,
        ExternalIDObject|array|null $externalIDs = null,
        ?array $genres = null,
        ?string $label = null,
        ?int $popularity = null,
        AlbumRestrictionObject|array|null $restrictions = null,
        Tracks|array|null $tracks = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['albumType'] = $albumType;
        $obj['availableMarkets'] = $availableMarkets;
        $obj['externalURLs'] = $externalURLs;
        $obj['href'] = $href;
        $obj['images'] = $images;
        $obj['name'] = $name;
        $obj['releaseDate'] = $releaseDate;
        $obj['releaseDatePrecision'] = $releaseDatePrecision;
        $obj['totalTracks'] = $totalTracks;
        $obj['uri'] = $uri;

        null !== $artists && $obj['artists'] = $artists;
        null !== $copyrights && $obj['copyrights'] = $copyrights;
        null !== $externalIDs && $obj['externalIDs'] = $externalIDs;
        null !== $genres && $obj['genres'] = $genres;
        null !== $label && $obj['label'] = $label;
        null !== $popularity && $obj['popularity'] = $popularity;
        null !== $restrictions && $obj['restrictions'] = $restrictions;
        null !== $tracks && $obj['tracks'] = $tracks;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
        $obj['availableMarkets'] = $availableMarkets;

        return $obj;
    }

    /**
     * Known external URLs for this album.
     *
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     */
    public function withExternalURLs(
        ExternalURLObject|array $externalURLs
    ): self {
        $obj = clone $this;
        $obj['externalURLs'] = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the album.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * The cover art for the album in various sizes, widest first.
     *
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $images
     */
    public function withImages(array $images): self
    {
        $obj = clone $this;
        $obj['images'] = $images;

        return $obj;
    }

    /**
     * The name of the album. In case of an album takedown, the value may be an empty string.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The date the album was first released.
     */
    public function withReleaseDate(string $releaseDate): self
    {
        $obj = clone $this;
        $obj['releaseDate'] = $releaseDate;

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
        $obj['totalTracks'] = $totalTracks;

        return $obj;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The artists of the album. Each artist object includes a link in `href` to more detailed information about the artist.
     *
     * @param list<SimplifiedArtistObject|array{
     *   id?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   name?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }> $artists
     */
    public function withArtists(array $artists): self
    {
        $obj = clone $this;
        $obj['artists'] = $artists;

        return $obj;
    }

    /**
     * The copyright statements of the album.
     *
     * @param list<CopyrightObject|array{
     *   text?: string|null, type?: string|null
     * }> $copyrights
     */
    public function withCopyrights(array $copyrights): self
    {
        $obj = clone $this;
        $obj['copyrights'] = $copyrights;

        return $obj;
    }

    /**
     * Known external IDs for the album.
     *
     * @param ExternalIDObject|array{
     *   ean?: string|null, isrc?: string|null, upc?: string|null
     * } $externalIDs
     */
    public function withExternalIDs(ExternalIDObject|array $externalIDs): self
    {
        $obj = clone $this;
        $obj['externalIDs'] = $externalIDs;

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
        $obj['genres'] = $genres;

        return $obj;
    }

    /**
     * The label associated with the album.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * The popularity of the album. The value will be between 0 and 100, with 100 being the most popular.
     */
    public function withPopularity(int $popularity): self
    {
        $obj = clone $this;
        $obj['popularity'] = $popularity;

        return $obj;
    }

    /**
     * Included in the response when a content restriction is applied.
     *
     * @param AlbumRestrictionObject|array{
     *   reason?: value-of<Reason>|null
     * } $restrictions
     */
    public function withRestrictions(
        AlbumRestrictionObject|array $restrictions
    ): self {
        $obj = clone $this;
        $obj['restrictions'] = $restrictions;

        return $obj;
    }

    /**
     * The tracks of the album.
     *
     * @param Tracks|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<SimplifiedTrackObject>|null,
     * } $tracks
     */
    public function withTracks(Tracks|array $tracks): self
    {
        $obj = clone $this;
        $obj['tracks'] = $tracks;

        return $obj;
    }
}
