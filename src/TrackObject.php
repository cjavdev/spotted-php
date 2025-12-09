<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\TrackObject\Album;
use Spotted\TrackObject\Album\AlbumType;
use Spotted\TrackObject\Album\ReleaseDatePrecision;
use Spotted\TrackObject\Type;

/**
 * @phpstan-type TrackObjectShape = array{
 *   id?: string|null,
 *   album?: Album|null,
 *   artists?: list<SimplifiedArtistObject>|null,
 *   availableMarkets?: list<string>|null,
 *   discNumber?: int|null,
 *   durationMs?: int|null,
 *   explicit?: bool|null,
 *   externalIDs?: ExternalIDObject|null,
 *   externalURLs?: ExternalURLObject|null,
 *   href?: string|null,
 *   isLocal?: bool|null,
 *   isPlayable?: bool|null,
 *   linkedFrom?: LinkedTrackObject|null,
 *   name?: string|null,
 *   popularity?: int|null,
 *   previewURL?: string|null,
 *   restrictions?: TrackRestrictionObject|null,
 *   trackNumber?: int|null,
 *   type?: value-of<Type>|null,
 *   uri?: string|null,
 * }
 */
final class TrackObject implements BaseModel
{
    /** @use SdkModel<TrackObjectShape> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    #[Optional]
    public ?string $id;

    /**
     * The album on which the track appears. The album object includes a link in `href` to full information about the album.
     */
    #[Optional]
    public ?Album $album;

    /**
     * The artists who performed the track. Each artist object includes a link in `href` to more detailed information about the artist.
     *
     * @var list<SimplifiedArtistObject>|null $artists
     */
    #[Optional(list: SimplifiedArtistObject::class)]
    public ?array $artists;

    /**
     * A list of the countries in which the track can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @var list<string>|null $availableMarkets
     */
    #[Optional('available_markets', list: 'string')]
    public ?array $availableMarkets;

    /**
     * The disc number (usually `1` unless the album consists of more than one disc).
     */
    #[Optional('disc_number')]
    public ?int $discNumber;

    /**
     * The track length in milliseconds.
     */
    #[Optional('duration_ms')]
    public ?int $durationMs;

    /**
     * Whether or not the track has explicit lyrics ( `true` = yes it does; `false` = no it does not OR unknown).
     */
    #[Optional]
    public ?bool $explicit;

    /**
     * Known external IDs for the track.
     */
    #[Optional('external_ids')]
    public ?ExternalIDObject $externalIDs;

    /**
     * Known external URLs for this track.
     */
    #[Optional('external_urls')]
    public ?ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    #[Optional]
    public ?string $href;

    /**
     * Whether or not the track is from a local file.
     */
    #[Optional('is_local')]
    public ?bool $isLocal;

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking) is applied. If `true`, the track is playable in the given market. Otherwise `false`.
     */
    #[Optional('is_playable')]
    public ?bool $isPlayable;

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking) is applied, and the requested track has been replaced with different track. The track in the `linked_from` object contains information about the originally requested track.
     */
    #[Optional('linked_from')]
    public ?LinkedTrackObject $linkedFrom;

    /**
     * The name of the track.
     */
    #[Optional]
    public ?string $name;

    /**
     * The popularity of the track. The value will be between 0 and 100, with 100 being the most popular.<br/>The popularity of a track is a value between 0 and 100, with 100 being the most popular. The popularity is calculated by algorithm and is based, in the most part, on the total number of plays the track has had and how recent those plays are.<br/>Generally speaking, songs that are being played a lot now will have a higher popularity than songs that were played a lot in the past. Duplicate tracks (e.g. the same track from a single and an album) are rated independently. Artist and album popularity is derived mathematically from track popularity. _**Note**: the popularity value may lag actual popularity by a few days: the value is not updated in real time._.
     */
    #[Optional]
    public ?int $popularity;

    /**
     * @deprecated
     *
     * A link to a 30 second preview (MP3 format) of the track. Can be `null`
     */
    #[Optional('preview_url', nullable: true)]
    public ?string $previewURL;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Optional]
    public ?TrackRestrictionObject $restrictions;

    /**
     * The number of the track. If an album has several discs, the track number is the number on the specified disc.
     */
    #[Optional('track_number')]
    public ?int $trackNumber;

    /**
     * The object type: "track".
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    #[Optional]
    public ?string $uri;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Album|array{
     *   id: string,
     *   albumType: value-of<AlbumType>,
     *   artists: list<SimplifiedArtistObject>,
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
     *   restrictions?: AlbumRestrictionObject|null,
     * } $album
     * @param list<SimplifiedArtistObject|array{
     *   id?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   name?: string|null,
     *   type?: value-of<SimplifiedArtistObject\Type>|null,
     *   uri?: string|null,
     * }> $artists
     * @param list<string> $availableMarkets
     * @param ExternalIDObject|array{
     *   ean?: string|null, isrc?: string|null, upc?: string|null
     * } $externalIDs
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     * @param LinkedTrackObject|array{
     *   id?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: string|null,
     *   uri?: string|null,
     * } $linkedFrom
     * @param TrackRestrictionObject|array{reason?: string|null} $restrictions
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        Album|array|null $album = null,
        ?array $artists = null,
        ?array $availableMarkets = null,
        ?int $discNumber = null,
        ?int $durationMs = null,
        ?bool $explicit = null,
        ExternalIDObject|array|null $externalIDs = null,
        ExternalURLObject|array|null $externalURLs = null,
        ?string $href = null,
        ?bool $isLocal = null,
        ?bool $isPlayable = null,
        LinkedTrackObject|array|null $linkedFrom = null,
        ?string $name = null,
        ?int $popularity = null,
        ?string $previewURL = null,
        TrackRestrictionObject|array|null $restrictions = null,
        ?int $trackNumber = null,
        Type|string|null $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $album && $obj['album'] = $album;
        null !== $artists && $obj['artists'] = $artists;
        null !== $availableMarkets && $obj['availableMarkets'] = $availableMarkets;
        null !== $discNumber && $obj['discNumber'] = $discNumber;
        null !== $durationMs && $obj['durationMs'] = $durationMs;
        null !== $explicit && $obj['explicit'] = $explicit;
        null !== $externalIDs && $obj['externalIDs'] = $externalIDs;
        null !== $externalURLs && $obj['externalURLs'] = $externalURLs;
        null !== $href && $obj['href'] = $href;
        null !== $isLocal && $obj['isLocal'] = $isLocal;
        null !== $isPlayable && $obj['isPlayable'] = $isPlayable;
        null !== $linkedFrom && $obj['linkedFrom'] = $linkedFrom;
        null !== $name && $obj['name'] = $name;
        null !== $popularity && $obj['popularity'] = $popularity;
        null !== $previewURL && $obj['previewURL'] = $previewURL;
        null !== $restrictions && $obj['restrictions'] = $restrictions;
        null !== $trackNumber && $obj['trackNumber'] = $trackNumber;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The album on which the track appears. The album object includes a link in `href` to full information about the album.
     *
     * @param Album|array{
     *   id: string,
     *   albumType: value-of<AlbumType>,
     *   artists: list<SimplifiedArtistObject>,
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
     *   restrictions?: AlbumRestrictionObject|null,
     * } $album
     */
    public function withAlbum(Album|array $album): self
    {
        $obj = clone $this;
        $obj['album'] = $album;

        return $obj;
    }

    /**
     * The artists who performed the track. Each artist object includes a link in `href` to more detailed information about the artist.
     *
     * @param list<SimplifiedArtistObject|array{
     *   id?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   name?: string|null,
     *   type?: value-of<SimplifiedArtistObject\Type>|null,
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
     * A list of the countries in which the track can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
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
     * The disc number (usually `1` unless the album consists of more than one disc).
     */
    public function withDiscNumber(int $discNumber): self
    {
        $obj = clone $this;
        $obj['discNumber'] = $discNumber;

        return $obj;
    }

    /**
     * The track length in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $obj = clone $this;
        $obj['durationMs'] = $durationMs;

        return $obj;
    }

    /**
     * Whether or not the track has explicit lyrics ( `true` = yes it does; `false` = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $obj = clone $this;
        $obj['explicit'] = $explicit;

        return $obj;
    }

    /**
     * Known external IDs for the track.
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
     * Known external URLs for this track.
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
     * A link to the Web API endpoint providing full details of the track.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * Whether or not the track is from a local file.
     */
    public function withIsLocal(bool $isLocal): self
    {
        $obj = clone $this;
        $obj['isLocal'] = $isLocal;

        return $obj;
    }

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking) is applied. If `true`, the track is playable in the given market. Otherwise `false`.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $obj = clone $this;
        $obj['isPlayable'] = $isPlayable;

        return $obj;
    }

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking) is applied, and the requested track has been replaced with different track. The track in the `linked_from` object contains information about the originally requested track.
     *
     * @param LinkedTrackObject|array{
     *   id?: string|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: string|null,
     *   uri?: string|null,
     * } $linkedFrom
     */
    public function withLinkedFrom(LinkedTrackObject|array $linkedFrom): self
    {
        $obj = clone $this;
        $obj['linkedFrom'] = $linkedFrom;

        return $obj;
    }

    /**
     * The name of the track.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The popularity of the track. The value will be between 0 and 100, with 100 being the most popular.<br/>The popularity of a track is a value between 0 and 100, with 100 being the most popular. The popularity is calculated by algorithm and is based, in the most part, on the total number of plays the track has had and how recent those plays are.<br/>Generally speaking, songs that are being played a lot now will have a higher popularity than songs that were played a lot in the past. Duplicate tracks (e.g. the same track from a single and an album) are rated independently. Artist and album popularity is derived mathematically from track popularity. _**Note**: the popularity value may lag actual popularity by a few days: the value is not updated in real time._.
     */
    public function withPopularity(int $popularity): self
    {
        $obj = clone $this;
        $obj['popularity'] = $popularity;

        return $obj;
    }

    /**
     * A link to a 30 second preview (MP3 format) of the track. Can be `null`.
     */
    public function withPreviewURL(?string $previewURL): self
    {
        $obj = clone $this;
        $obj['previewURL'] = $previewURL;

        return $obj;
    }

    /**
     * Included in the response when a content restriction is applied.
     *
     * @param TrackRestrictionObject|array{reason?: string|null} $restrictions
     */
    public function withRestrictions(
        TrackRestrictionObject|array $restrictions
    ): self {
        $obj = clone $this;
        $obj['restrictions'] = $restrictions;

        return $obj;
    }

    /**
     * The number of the track. If an album has several discs, the track number is the number on the specified disc.
     */
    public function withTrackNumber(int $trackNumber): self
    {
        $obj = clone $this;
        $obj['trackNumber'] = $trackNumber;

        return $obj;
    }

    /**
     * The object type: "track".
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
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
