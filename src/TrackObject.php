<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\TrackObject\Album;
use Spotted\TrackObject\Type;

/**
 * @phpstan-type TrackObjectShape = array{
 *   id?: string,
 *   album?: Album,
 *   artists?: list<SimplifiedArtistObject>,
 *   availableMarkets?: list<string>,
 *   discNumber?: int,
 *   durationMs?: int,
 *   explicit?: bool,
 *   externalIDs?: ExternalIDObject,
 *   externalURLs?: ExternalURLObject,
 *   href?: string,
 *   isLocal?: bool,
 *   isPlayable?: bool,
 *   linkedFrom?: LinkedTrackObject,
 *   name?: string,
 *   popularity?: int,
 *   previewURL?: string|null,
 *   restrictions?: TrackRestrictionObject,
 *   trackNumber?: int,
 *   type?: value-of<Type>,
 *   uri?: string,
 * }
 */
final class TrackObject implements BaseModel
{
    /** @use SdkModel<TrackObjectShape> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The album on which the track appears. The album object includes a link in `href` to full information about the album.
     */
    #[Api(optional: true)]
    public ?Album $album;

    /**
     * The artists who performed the track. Each artist object includes a link in `href` to more detailed information about the artist.
     *
     * @var list<SimplifiedArtistObject>|null $artists
     */
    #[Api(list: SimplifiedArtistObject::class, optional: true)]
    public ?array $artists;

    /**
     * A list of the countries in which the track can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @var list<string>|null $availableMarkets
     */
    #[Api('available_markets', list: 'string', optional: true)]
    public ?array $availableMarkets;

    /**
     * The disc number (usually `1` unless the album consists of more than one disc).
     */
    #[Api('disc_number', optional: true)]
    public ?int $discNumber;

    /**
     * The track length in milliseconds.
     */
    #[Api('duration_ms', optional: true)]
    public ?int $durationMs;

    /**
     * Whether or not the track has explicit lyrics ( `true` = yes it does; `false` = no it does not OR unknown).
     */
    #[Api(optional: true)]
    public ?bool $explicit;

    /**
     * Known external IDs for the track.
     */
    #[Api('external_ids', optional: true)]
    public ?ExternalIDObject $externalIDs;

    /**
     * Known external URLs for this track.
     */
    #[Api('external_urls', optional: true)]
    public ?ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    #[Api(optional: true)]
    public ?string $href;

    /**
     * Whether or not the track is from a local file.
     */
    #[Api('is_local', optional: true)]
    public ?bool $isLocal;

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking) is applied. If `true`, the track is playable in the given market. Otherwise `false`.
     */
    #[Api('is_playable', optional: true)]
    public ?bool $isPlayable;

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking) is applied, and the requested track has been replaced with different track. The track in the `linked_from` object contains information about the originally requested track.
     */
    #[Api('linked_from', optional: true)]
    public ?LinkedTrackObject $linkedFrom;

    /**
     * The name of the track.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The popularity of the track. The value will be between 0 and 100, with 100 being the most popular.<br/>The popularity of a track is a value between 0 and 100, with 100 being the most popular. The popularity is calculated by algorithm and is based, in the most part, on the total number of plays the track has had and how recent those plays are.<br/>Generally speaking, songs that are being played a lot now will have a higher popularity than songs that were played a lot in the past. Duplicate tracks (e.g. the same track from a single and an album) are rated independently. Artist and album popularity is derived mathematically from track popularity. _**Note**: the popularity value may lag actual popularity by a few days: the value is not updated in real time._.
     */
    #[Api(optional: true)]
    public ?int $popularity;

    /**
     * @deprecated
     *
     * A link to a 30 second preview (MP3 format) of the track. Can be `null`
     */
    #[Api('preview_url', nullable: true, optional: true)]
    public ?string $previewURL;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Api(optional: true)]
    public ?TrackRestrictionObject $restrictions;

    /**
     * The number of the track. If an album has several discs, the track number is the number on the specified disc.
     */
    #[Api('track_number', optional: true)]
    public ?int $trackNumber;

    /**
     * The object type: "track".
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    #[Api(optional: true)]
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
     * @param list<SimplifiedArtistObject> $artists
     * @param list<string> $availableMarkets
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?Album $album = null,
        ?array $artists = null,
        ?array $availableMarkets = null,
        ?int $discNumber = null,
        ?int $durationMs = null,
        ?bool $explicit = null,
        ?ExternalIDObject $externalIDs = null,
        ?ExternalURLObject $externalURLs = null,
        ?string $href = null,
        ?bool $isLocal = null,
        ?bool $isPlayable = null,
        ?LinkedTrackObject $linkedFrom = null,
        ?string $name = null,
        ?int $popularity = null,
        ?string $previewURL = null,
        ?TrackRestrictionObject $restrictions = null,
        ?int $trackNumber = null,
        Type|string|null $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $album && $obj->album = $album;
        null !== $artists && $obj->artists = $artists;
        null !== $availableMarkets && $obj->availableMarkets = $availableMarkets;
        null !== $discNumber && $obj->discNumber = $discNumber;
        null !== $durationMs && $obj->durationMs = $durationMs;
        null !== $explicit && $obj->explicit = $explicit;
        null !== $externalIDs && $obj->externalIDs = $externalIDs;
        null !== $externalURLs && $obj->externalURLs = $externalURLs;
        null !== $href && $obj->href = $href;
        null !== $isLocal && $obj->isLocal = $isLocal;
        null !== $isPlayable && $obj->isPlayable = $isPlayable;
        null !== $linkedFrom && $obj->linkedFrom = $linkedFrom;
        null !== $name && $obj->name = $name;
        null !== $popularity && $obj->popularity = $popularity;
        null !== $previewURL && $obj->previewURL = $previewURL;
        null !== $restrictions && $obj->restrictions = $restrictions;
        null !== $trackNumber && $obj->trackNumber = $trackNumber;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The album on which the track appears. The album object includes a link in `href` to full information about the album.
     */
    public function withAlbum(Album $album): self
    {
        $obj = clone $this;
        $obj->album = $album;

        return $obj;
    }

    /**
     * The artists who performed the track. Each artist object includes a link in `href` to more detailed information about the artist.
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
     * A list of the countries in which the track can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
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
     * The disc number (usually `1` unless the album consists of more than one disc).
     */
    public function withDiscNumber(int $discNumber): self
    {
        $obj = clone $this;
        $obj->discNumber = $discNumber;

        return $obj;
    }

    /**
     * The track length in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $obj = clone $this;
        $obj->durationMs = $durationMs;

        return $obj;
    }

    /**
     * Whether or not the track has explicit lyrics ( `true` = yes it does; `false` = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $obj = clone $this;
        $obj->explicit = $explicit;

        return $obj;
    }

    /**
     * Known external IDs for the track.
     */
    public function withExternalIDs(ExternalIDObject $externalIDs): self
    {
        $obj = clone $this;
        $obj->externalIDs = $externalIDs;

        return $obj;
    }

    /**
     * Known external URLs for this track.
     */
    public function withExternalURLs(ExternalURLObject $externalURLs): self
    {
        $obj = clone $this;
        $obj->externalURLs = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * Whether or not the track is from a local file.
     */
    public function withIsLocal(bool $isLocal): self
    {
        $obj = clone $this;
        $obj->isLocal = $isLocal;

        return $obj;
    }

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking) is applied. If `true`, the track is playable in the given market. Otherwise `false`.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $obj = clone $this;
        $obj->isPlayable = $isPlayable;

        return $obj;
    }

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking) is applied, and the requested track has been replaced with different track. The track in the `linked_from` object contains information about the originally requested track.
     */
    public function withLinkedFrom(LinkedTrackObject $linkedFrom): self
    {
        $obj = clone $this;
        $obj->linkedFrom = $linkedFrom;

        return $obj;
    }

    /**
     * The name of the track.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The popularity of the track. The value will be between 0 and 100, with 100 being the most popular.<br/>The popularity of a track is a value between 0 and 100, with 100 being the most popular. The popularity is calculated by algorithm and is based, in the most part, on the total number of plays the track has had and how recent those plays are.<br/>Generally speaking, songs that are being played a lot now will have a higher popularity than songs that were played a lot in the past. Duplicate tracks (e.g. the same track from a single and an album) are rated independently. Artist and album popularity is derived mathematically from track popularity. _**Note**: the popularity value may lag actual popularity by a few days: the value is not updated in real time._.
     */
    public function withPopularity(int $popularity): self
    {
        $obj = clone $this;
        $obj->popularity = $popularity;

        return $obj;
    }

    /**
     * A link to a 30 second preview (MP3 format) of the track. Can be `null`.
     */
    public function withPreviewURL(?string $previewURL): self
    {
        $obj = clone $this;
        $obj->previewURL = $previewURL;

        return $obj;
    }

    /**
     * Included in the response when a content restriction is applied.
     */
    public function withRestrictions(TrackRestrictionObject $restrictions): self
    {
        $obj = clone $this;
        $obj->restrictions = $restrictions;

        return $obj;
    }

    /**
     * The number of the track. If an album has several discs, the track number is the number on the specified disc.
     */
    public function withTrackNumber(int $trackNumber): self
    {
        $obj = clone $this;
        $obj->trackNumber = $trackNumber;

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
        $obj->uri = $uri;

        return $obj;
    }
}
