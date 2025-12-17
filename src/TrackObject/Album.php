<?php

declare(strict_types=1);

namespace Spotted\TrackObject;

use Spotted\AlbumRestrictionObject;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\SimplifiedArtistObject;
use Spotted\TrackObject\Album\AlbumType;
use Spotted\TrackObject\Album\ReleaseDatePrecision;

/**
 * The album on which the track appears. The album object includes a link in `href` to full information about the album.
 *
 * @phpstan-import-type SimplifiedArtistObjectShape from \Spotted\SimplifiedArtistObject
 * @phpstan-import-type ExternalURLObjectShape from \Spotted\ExternalURLObject
 * @phpstan-import-type ImageObjectShape from \Spotted\ImageObject
 * @phpstan-import-type AlbumRestrictionObjectShape from \Spotted\AlbumRestrictionObject
 *
 * @phpstan-type AlbumShape = array{
 *   id: string,
 *   albumType: AlbumType|value-of<AlbumType>,
 *   artists: list<SimplifiedArtistObjectShape>,
 *   availableMarkets: list<string>,
 *   externalURLs: ExternalURLObject|ExternalURLObjectShape,
 *   href: string,
 *   images: list<ImageObjectShape>,
 *   name: string,
 *   releaseDate: string,
 *   releaseDatePrecision: ReleaseDatePrecision|value-of<ReleaseDatePrecision>,
 *   totalTracks: int,
 *   type: 'album',
 *   uri: string,
 *   published?: bool|null,
 *   restrictions?: null|AlbumRestrictionObject|AlbumRestrictionObjectShape,
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
     * The artists of the album. Each artist object includes a link in `href` to more detailed information about the artist.
     *
     * @var list<SimplifiedArtistObject> $artists
     */
    #[Required(list: SimplifiedArtistObject::class)]
    public array $artists;

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
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Optional]
    public ?AlbumRestrictionObject $restrictions;

    /**
     * `new Album()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Album::with(
     *   id: ...,
     *   albumType: ...,
     *   artists: ...,
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
     * @param AlbumType|value-of<AlbumType> $albumType
     * @param list<SimplifiedArtistObjectShape> $artists
     * @param list<string> $availableMarkets
     * @param ExternalURLObjectShape $externalURLs
     * @param list<ImageObjectShape> $images
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     * @param AlbumRestrictionObjectShape $restrictions
     */
    public static function with(
        string $id,
        AlbumType|string $albumType,
        array $artists,
        array $availableMarkets,
        ExternalURLObject|array $externalURLs,
        string $href,
        array $images,
        string $name,
        string $releaseDate,
        ReleaseDatePrecision|string $releaseDatePrecision,
        int $totalTracks,
        string $uri,
        ?bool $published = null,
        AlbumRestrictionObject|array|null $restrictions = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['albumType'] = $albumType;
        $self['artists'] = $artists;
        $self['availableMarkets'] = $availableMarkets;
        $self['externalURLs'] = $externalURLs;
        $self['href'] = $href;
        $self['images'] = $images;
        $self['name'] = $name;
        $self['releaseDate'] = $releaseDate;
        $self['releaseDatePrecision'] = $releaseDatePrecision;
        $self['totalTracks'] = $totalTracks;
        $self['uri'] = $uri;

        null !== $published && $self['published'] = $published;
        null !== $restrictions && $self['restrictions'] = $restrictions;

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
     * The artists of the album. Each artist object includes a link in `href` to more detailed information about the artist.
     *
     * @param list<SimplifiedArtistObjectShape> $artists
     */
    public function withArtists(array $artists): self
    {
        $self = clone $this;
        $self['artists'] = $artists;

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
     * @param ExternalURLObjectShape $externalURLs
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
     * @param list<ImageObjectShape> $images
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
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }

    /**
     * Included in the response when a content restriction is applied.
     *
     * @param AlbumRestrictionObjectShape $restrictions
     */
    public function withRestrictions(
        AlbumRestrictionObject|array $restrictions
    ): self {
        $self = clone $this;
        $self['restrictions'] = $restrictions;

        return $self;
    }
}
