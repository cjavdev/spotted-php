<?php

declare(strict_types=1);

namespace Spotted\Artists;

use Spotted\AlbumRestrictionObject;
use Spotted\AlbumRestrictionObject\Reason;
use Spotted\Artists\ArtistListAlbumsResponse\AlbumGroup;
use Spotted\Artists\ArtistListAlbumsResponse\AlbumType;
use Spotted\Artists\ArtistListAlbumsResponse\ReleaseDatePrecision;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\SimplifiedArtistObject;
use Spotted\SimplifiedArtistObject\Type;

/**
 * @phpstan-type ArtistListAlbumsResponseShape = array{
 *   id: string,
 *   album_group: value-of<AlbumGroup>,
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
 *   type?: 'album',
 *   uri: string,
 *   restrictions?: AlbumRestrictionObject|null,
 * }
 */
final class ArtistListAlbumsResponse implements BaseModel
{
    /** @use SdkModel<ArtistListAlbumsResponseShape> */
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
     * This field describes the relationship between the artist and the album.
     *
     * @var value-of<AlbumGroup> $album_group
     */
    #[Required(enum: AlbumGroup::class)]
    public string $album_group;

    /**
     * The type of the album.
     *
     * @var value-of<AlbumType> $album_type
     */
    #[Required(enum: AlbumType::class)]
    public string $album_type;

    /**
     * The artists of the album. Each artist object includes a link in `href` to more detailed information about the artist.
     *
     * @var list<SimplifiedArtistObject> $artists
     */
    #[Required(list: SimplifiedArtistObject::class)]
    public array $artists;

    /**
     * The markets in which the album is available: [ISO 3166-1 alpha-2 country codes](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). _**NOTE**: an album is considered available in a market when at least 1 of its tracks is available in that market._.
     *
     * @var list<string> $available_markets
     */
    #[Required(list: 'string')]
    public array $available_markets;

    /**
     * Known external URLs for this album.
     */
    #[Required]
    public ExternalURLObject $external_urls;

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
    #[Required]
    public string $release_date;

    /**
     * The precision with which `release_date` value is known.
     *
     * @var value-of<ReleaseDatePrecision> $release_date_precision
     */
    #[Required(enum: ReleaseDatePrecision::class)]
    public string $release_date_precision;

    /**
     * The number of tracks in the album.
     */
    #[Required]
    public int $total_tracks;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the album.
     */
    #[Required]
    public string $uri;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Optional]
    public ?AlbumRestrictionObject $restrictions;

    /**
     * `new ArtistListAlbumsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArtistListAlbumsResponse::with(
     *   id: ...,
     *   album_group: ...,
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
     * (new ArtistListAlbumsResponse)
     *   ->withID(...)
     *   ->withAlbumGroup(...)
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
     * @param AlbumGroup|value-of<AlbumGroup> $album_group
     * @param AlbumType|value-of<AlbumType> $album_type
     * @param list<SimplifiedArtistObject|array{
     *   id?: string|null,
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   name?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }> $artists
     * @param list<string> $available_markets
     * @param ExternalURLObject|array{spotify?: string|null} $external_urls
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $images
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $release_date_precision
     * @param AlbumRestrictionObject|array{
     *   reason?: value-of<Reason>|null
     * } $restrictions
     */
    public static function with(
        string $id,
        AlbumGroup|string $album_group,
        AlbumType|string $album_type,
        array $artists,
        array $available_markets,
        ExternalURLObject|array $external_urls,
        string $href,
        array $images,
        string $name,
        string $release_date,
        ReleaseDatePrecision|string $release_date_precision,
        int $total_tracks,
        string $uri,
        AlbumRestrictionObject|array|null $restrictions = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['album_group'] = $album_group;
        $obj['album_type'] = $album_type;
        $obj['artists'] = $artists;
        $obj['available_markets'] = $available_markets;
        $obj['external_urls'] = $external_urls;
        $obj['href'] = $href;
        $obj['images'] = $images;
        $obj['name'] = $name;
        $obj['release_date'] = $release_date;
        $obj['release_date_precision'] = $release_date_precision;
        $obj['total_tracks'] = $total_tracks;
        $obj['uri'] = $uri;

        null !== $restrictions && $obj['restrictions'] = $restrictions;

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
     * This field describes the relationship between the artist and the album.
     *
     * @param AlbumGroup|value-of<AlbumGroup> $albumGroup
     */
    public function withAlbumGroup(AlbumGroup|string $albumGroup): self
    {
        $obj = clone $this;
        $obj['album_group'] = $albumGroup;

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
     * @param list<SimplifiedArtistObject|array{
     *   id?: string|null,
     *   external_urls?: ExternalURLObject|null,
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
     * The markets in which the album is available: [ISO 3166-1 alpha-2 country codes](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). _**NOTE**: an album is considered available in a market when at least 1 of its tracks is available in that market._.
     *
     * @param list<string> $availableMarkets
     */
    public function withAvailableMarkets(array $availableMarkets): self
    {
        $obj = clone $this;
        $obj['available_markets'] = $availableMarkets;

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
        $obj['external_urls'] = $externalURLs;

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
        $obj['release_date'] = $releaseDate;

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
        $obj['total_tracks'] = $totalTracks;

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
}
