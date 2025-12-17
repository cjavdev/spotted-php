<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\TrackObject\Album;
use Spotted\TrackObject\Type;

/**
 * @phpstan-import-type AlbumShape from \Spotted\TrackObject\Album
 * @phpstan-import-type SimplifiedArtistObjectShape from \Spotted\SimplifiedArtistObject
 * @phpstan-import-type ExternalIDObjectShape from \Spotted\ExternalIDObject
 * @phpstan-import-type ExternalURLObjectShape from \Spotted\ExternalURLObject
 * @phpstan-import-type LinkedTrackObjectShape from \Spotted\LinkedTrackObject
 * @phpstan-import-type TrackRestrictionObjectShape from \Spotted\TrackRestrictionObject
 *
 * @phpstan-type TrackObjectShape = array{
 *   id?: string|null,
 *   album?: null|Album|AlbumShape,
 *   artists?: list<SimplifiedArtistObjectShape>|null,
 *   availableMarkets?: list<string>|null,
 *   discNumber?: int|null,
 *   durationMs?: int|null,
 *   explicit?: bool|null,
 *   externalIDs?: null|ExternalIDObject|ExternalIDObjectShape,
 *   externalURLs?: null|ExternalURLObject|ExternalURLObjectShape,
 *   href?: string|null,
 *   isLocal?: bool|null,
 *   isPlayable?: bool|null,
 *   linkedFrom?: null|LinkedTrackObject|LinkedTrackObjectShape,
 *   name?: string|null,
 *   popularity?: int|null,
 *   previewURL?: string|null,
 *   published?: bool|null,
 *   restrictions?: null|TrackRestrictionObject|TrackRestrictionObjectShape,
 *   trackNumber?: int|null,
 *   type?: null|Type|value-of<Type>,
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
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

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
     * @param AlbumShape $album
     * @param list<SimplifiedArtistObjectShape> $artists
     * @param list<string> $availableMarkets
     * @param ExternalIDObjectShape $externalIDs
     * @param ExternalURLObjectShape $externalURLs
     * @param LinkedTrackObjectShape $linkedFrom
     * @param TrackRestrictionObjectShape $restrictions
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
        ?bool $published = null,
        TrackRestrictionObject|array|null $restrictions = null,
        ?int $trackNumber = null,
        Type|string|null $type = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $album && $self['album'] = $album;
        null !== $artists && $self['artists'] = $artists;
        null !== $availableMarkets && $self['availableMarkets'] = $availableMarkets;
        null !== $discNumber && $self['discNumber'] = $discNumber;
        null !== $durationMs && $self['durationMs'] = $durationMs;
        null !== $explicit && $self['explicit'] = $explicit;
        null !== $externalIDs && $self['externalIDs'] = $externalIDs;
        null !== $externalURLs && $self['externalURLs'] = $externalURLs;
        null !== $href && $self['href'] = $href;
        null !== $isLocal && $self['isLocal'] = $isLocal;
        null !== $isPlayable && $self['isPlayable'] = $isPlayable;
        null !== $linkedFrom && $self['linkedFrom'] = $linkedFrom;
        null !== $name && $self['name'] = $name;
        null !== $popularity && $self['popularity'] = $popularity;
        null !== $previewURL && $self['previewURL'] = $previewURL;
        null !== $published && $self['published'] = $published;
        null !== $restrictions && $self['restrictions'] = $restrictions;
        null !== $trackNumber && $self['trackNumber'] = $trackNumber;
        null !== $type && $self['type'] = $type;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The album on which the track appears. The album object includes a link in `href` to full information about the album.
     *
     * @param AlbumShape $album
     */
    public function withAlbum(Album|array $album): self
    {
        $self = clone $this;
        $self['album'] = $album;

        return $self;
    }

    /**
     * The artists who performed the track. Each artist object includes a link in `href` to more detailed information about the artist.
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
     * A list of the countries in which the track can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
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
     * The disc number (usually `1` unless the album consists of more than one disc).
     */
    public function withDiscNumber(int $discNumber): self
    {
        $self = clone $this;
        $self['discNumber'] = $discNumber;

        return $self;
    }

    /**
     * The track length in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $self = clone $this;
        $self['durationMs'] = $durationMs;

        return $self;
    }

    /**
     * Whether or not the track has explicit lyrics ( `true` = yes it does; `false` = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $self = clone $this;
        $self['explicit'] = $explicit;

        return $self;
    }

    /**
     * Known external IDs for the track.
     *
     * @param ExternalIDObjectShape $externalIDs
     */
    public function withExternalIDs(ExternalIDObject|array $externalIDs): self
    {
        $self = clone $this;
        $self['externalIDs'] = $externalIDs;

        return $self;
    }

    /**
     * Known external URLs for this track.
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
     * A link to the Web API endpoint providing full details of the track.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    /**
     * Whether or not the track is from a local file.
     */
    public function withIsLocal(bool $isLocal): self
    {
        $self = clone $this;
        $self['isLocal'] = $isLocal;

        return $self;
    }

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking) is applied. If `true`, the track is playable in the given market. Otherwise `false`.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $self = clone $this;
        $self['isPlayable'] = $isPlayable;

        return $self;
    }

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking) is applied, and the requested track has been replaced with different track. The track in the `linked_from` object contains information about the originally requested track.
     *
     * @param LinkedTrackObjectShape $linkedFrom
     */
    public function withLinkedFrom(LinkedTrackObject|array $linkedFrom): self
    {
        $self = clone $this;
        $self['linkedFrom'] = $linkedFrom;

        return $self;
    }

    /**
     * The name of the track.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The popularity of the track. The value will be between 0 and 100, with 100 being the most popular.<br/>The popularity of a track is a value between 0 and 100, with 100 being the most popular. The popularity is calculated by algorithm and is based, in the most part, on the total number of plays the track has had and how recent those plays are.<br/>Generally speaking, songs that are being played a lot now will have a higher popularity than songs that were played a lot in the past. Duplicate tracks (e.g. the same track from a single and an album) are rated independently. Artist and album popularity is derived mathematically from track popularity. _**Note**: the popularity value may lag actual popularity by a few days: the value is not updated in real time._.
     */
    public function withPopularity(int $popularity): self
    {
        $self = clone $this;
        $self['popularity'] = $popularity;

        return $self;
    }

    /**
     * A link to a 30 second preview (MP3 format) of the track. Can be `null`.
     */
    public function withPreviewURL(?string $previewURL): self
    {
        $self = clone $this;
        $self['previewURL'] = $previewURL;

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
     * @param TrackRestrictionObjectShape $restrictions
     */
    public function withRestrictions(
        TrackRestrictionObject|array $restrictions
    ): self {
        $self = clone $this;
        $self['restrictions'] = $restrictions;

        return $self;
    }

    /**
     * The number of the track. If an album has several discs, the track number is the number on the specified disc.
     */
    public function withTrackNumber(int $trackNumber): self
    {
        $self = clone $this;
        $self['trackNumber'] = $trackNumber;

        return $self;
    }

    /**
     * The object type: "track".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
