<?php

declare(strict_types=1);

namespace Spotted\Albums;

use Spotted\AlbumRestrictionObject;
use Spotted\AlbumRestrictionObject\Reason;
use Spotted\Albums\AlbumGetResponse\AlbumType;
use Spotted\Albums\AlbumGetResponse\ReleaseDatePrecision;
use Spotted\Albums\AlbumGetResponse\Tracks;
use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalIDObject;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\SimplifiedArtistObject;
use Spotted\SimplifiedArtistObject\Type;
use Spotted\SimplifiedTrackObject;

/**
 * @phpstan-type AlbumGetResponseShape = array{
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
final class AlbumGetResponse implements BaseModel
{
    /** @use SdkModel<AlbumGetResponseShape> */
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
     * `new AlbumGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AlbumGetResponse::with(
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
     * (new AlbumGetResponse)
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
        $self = new self;

        $self['id'] = $id;
        $self['albumType'] = $albumType;
        $self['availableMarkets'] = $availableMarkets;
        $self['externalURLs'] = $externalURLs;
        $self['href'] = $href;
        $self['images'] = $images;
        $self['name'] = $name;
        $self['releaseDate'] = $releaseDate;
        $self['releaseDatePrecision'] = $releaseDatePrecision;
        $self['totalTracks'] = $totalTracks;
        $self['uri'] = $uri;

        null !== $artists && $self['artists'] = $artists;
        null !== $copyrights && $self['copyrights'] = $copyrights;
        null !== $externalIDs && $self['externalIDs'] = $externalIDs;
        null !== $genres && $self['genres'] = $genres;
        null !== $label && $self['label'] = $label;
        null !== $popularity && $self['popularity'] = $popularity;
        null !== $restrictions && $self['restrictions'] = $restrictions;
        null !== $tracks && $self['tracks'] = $tracks;

        return $self;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The type of the album.
     *
     * @param AlbumType|value-of<AlbumType> $albumType
     */
    public function withAlbumType(AlbumType|string $albumType): self
    {
        $self = clone $this;
        $self['albumType'] = $albumType;

        return $self;
    }

    /**
     * The markets in which the album is available: [ISO 3166-1 alpha-2 country codes](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). _**NOTE**: an album is considered available in a market when at least 1 of its tracks is available in that market._.
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
     * Known external URLs for this album.
     *
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     */
    public function withExternalURLs(
        ExternalURLObject|array $externalURLs
    ): self {
        $self = clone $this;
        $self['externalURLs'] = $externalURLs;

        return $self;
    }

    /**
     * A link to the Web API endpoint providing full details of the album.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
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
        $self = clone $this;
        $self['images'] = $images;

        return $self;
    }

    /**
     * The name of the album. In case of an album takedown, the value may be an empty string.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The date the album was first released.
     */
    public function withReleaseDate(string $releaseDate): self
    {
        $self = clone $this;
        $self['releaseDate'] = $releaseDate;

        return $self;
    }

    /**
     * The precision with which `release_date` value is known.
     *
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     */
    public function withReleaseDatePrecision(
        ReleaseDatePrecision|string $releaseDatePrecision
    ): self {
        $self = clone $this;
        $self['releaseDatePrecision'] = $releaseDatePrecision;

        return $self;
    }

    /**
     * The number of tracks in the album.
     */
    public function withTotalTracks(int $totalTracks): self
    {
        $self = clone $this;
        $self['totalTracks'] = $totalTracks;

        return $self;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
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
        $self = clone $this;
        $self['artists'] = $artists;

        return $self;
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
        $self = clone $this;
        $self['copyrights'] = $copyrights;

        return $self;
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
        $self = clone $this;
        $self['externalIDs'] = $externalIDs;

        return $self;
    }

    /**
     * **Deprecated** The array is always empty.
     *
     * @param list<string> $genres
     */
    public function withGenres(array $genres): self
    {
        $self = clone $this;
        $self['genres'] = $genres;

        return $self;
    }

    /**
     * The label associated with the album.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The popularity of the album. The value will be between 0 and 100, with 100 being the most popular.
     */
    public function withPopularity(int $popularity): self
    {
        $self = clone $this;
        $self['popularity'] = $popularity;

        return $self;
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
        $self = clone $this;
        $self['restrictions'] = $restrictions;

        return $self;
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
        $self = clone $this;
        $self['tracks'] = $tracks;

        return $self;
    }
}
