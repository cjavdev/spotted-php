<?php

declare(strict_types=1);

namespace Spotted\Search\SearchQueryResponse\Albums;

use Spotted\AlbumRestrictionObject;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\Search\SearchQueryResponse\Albums\Item\AlbumType;
use Spotted\Search\SearchQueryResponse\Albums\Item\ReleaseDatePrecision;
use Spotted\SimplifiedArtistObject;

/**
 * @phpstan-type ItemShape = array{
 *   id: string,
 *   album_type: value-of<AlbumType>,
 *   artists: list<SimplifiedArtistObject>,
 *   available_markets: list<string>,
 *   external_urls: ExternalURLObject,
 *   href: string,
 *   images: list<ImageObject>,
 *   name: string,
 *   release_date: string,
 *   release_date_precision: value-of<ReleaseDatePrecision>,
 *   total_tracks: int,
 *   type: "album",
 *   uri: string,
 *   restrictions?: AlbumRestrictionObject|null,
 * }
 */
final class Item implements BaseModel
{
    /** @use SdkModel<ItemShape> */
    use SdkModel;

    /**
     * The object type.
     *
     * @var "album" $type
     */
    #[Api]
    public string $type = 'album';

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    #[Api]
    public string $id;

    /**
     * The type of the album.
     *
     * @var value-of<AlbumType> $album_type
     */
    #[Api(enum: AlbumType::class)]
    public string $album_type;

    /**
     * The artists of the album. Each artist object includes a link in `href` to more detailed information about the artist.
     *
     * @var list<SimplifiedArtistObject> $artists
     */
    #[Api(list: SimplifiedArtistObject::class)]
    public array $artists;

    /**
     * The markets in which the album is available: [ISO 3166-1 alpha-2 country codes](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). _**NOTE**: an album is considered available in a market when at least 1 of its tracks is available in that market._.
     *
     * @var list<string> $available_markets
     */
    #[Api(list: 'string')]
    public array $available_markets;

    /**
     * Known external URLs for this album.
     */
    #[Api]
    public ExternalURLObject $external_urls;

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
    #[Api]
    public string $release_date;

    /**
     * The precision with which `release_date` value is known.
     *
     * @var value-of<ReleaseDatePrecision> $release_date_precision
     */
    #[Api(enum: ReleaseDatePrecision::class)]
    public string $release_date_precision;

    /**
     * The number of tracks in the album.
     */
    #[Api]
    public int $total_tracks;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    #[Api]
    public string $uri;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Api(optional: true)]
    public ?AlbumRestrictionObject $restrictions;

    /**
     * `new Item()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Item::with(
     *   id: ...,
     *   album_type: ...,
     *   artists: ...,
     *   available_markets: ...,
     *   external_urls: ...,
     *   href: ...,
     *   images: ...,
     *   name: ...,
     *   release_date: ...,
     *   release_date_precision: ...,
     *   total_tracks: ...,
     *   uri: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Item)
     *   ->withID(...)
     *   ->withAlbumType(...)
     *   ->withArtists(...)
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
     * @param AlbumType|value-of<AlbumType> $album_type
     * @param list<SimplifiedArtistObject> $artists
     * @param list<string> $available_markets
     * @param list<ImageObject> $images
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $release_date_precision
     */
    public static function with(
        string $id,
        AlbumType|string $album_type,
        array $artists,
        array $available_markets,
        ExternalURLObject $external_urls,
        string $href,
        array $images,
        string $name,
        string $release_date,
        ReleaseDatePrecision|string $release_date_precision,
        int $total_tracks,
        string $uri,
        ?AlbumRestrictionObject $restrictions = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj['album_type'] = $album_type;
        $obj->artists = $artists;
        $obj->available_markets = $available_markets;
        $obj->external_urls = $external_urls;
        $obj->href = $href;
        $obj->images = $images;
        $obj->name = $name;
        $obj->release_date = $release_date;
        $obj['release_date_precision'] = $release_date_precision;
        $obj->total_tracks = $total_tracks;
        $obj->uri = $uri;

        null !== $restrictions && $obj->restrictions = $restrictions;

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
        $obj['album_type'] = $albumType;

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
     * The markets in which the album is available: [ISO 3166-1 alpha-2 country codes](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). _**NOTE**: an album is considered available in a market when at least 1 of its tracks is available in that market._.
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
     * Known external URLs for this album.
     */
    public function withExternalURLs(ExternalURLObject $externalURLs): self
    {
        $obj = clone $this;
        $obj->external_urls = $externalURLs;

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
        $obj->release_date = $releaseDate;

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
        $obj['release_date_precision'] = $releaseDatePrecision;

        return $obj;
    }

    /**
     * The number of tracks in the album.
     */
    public function withTotalTracks(int $totalTracks): self
    {
        $obj = clone $this;
        $obj->total_tracks = $totalTracks;

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
     * Included in the response when a content restriction is applied.
     */
    public function withRestrictions(AlbumRestrictionObject $restrictions): self
    {
        $obj = clone $this;
        $obj->restrictions = $restrictions;

        return $obj;
    }
}
