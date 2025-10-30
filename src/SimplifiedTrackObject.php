<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimplifiedTrackObjectShape = array{
 *   id?: string,
 *   artists?: list<SimplifiedArtistObject>,
 *   availableMarkets?: list<string>,
 *   discNumber?: int,
 *   durationMs?: int,
 *   explicit?: bool,
 *   externalURLs?: ExternalURLObject,
 *   href?: string,
 *   isLocal?: bool,
 *   isPlayable?: bool,
 *   linkedFrom?: LinkedTrackObject,
 *   name?: string,
 *   previewURL?: string|null,
 *   restrictions?: TrackRestrictionObject,
 *   trackNumber?: int,
 *   type?: string,
 *   uri?: string,
 * }
 */
final class SimplifiedTrackObject implements BaseModel
{
    /** @use SdkModel<SimplifiedTrackObjectShape> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    #[Api(optional: true)]
    public ?string $id;

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
     * External URLs for this track.
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
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking/) is applied. If `true`, the track is playable in the given market. Otherwise `false`.
     */
    #[Api('is_playable', optional: true)]
    public ?bool $isPlayable;

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking/) is applied and is only part of the response if the track linking, in fact, exists. The requested track has been replaced with a different track. The track in the `linked_from` object contains information about the originally requested track.
     */
    #[Api('linked_from', optional: true)]
    public ?LinkedTrackObject $linkedFrom;

    /**
     * The name of the track.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * @deprecated
     *
     * A URL to a 30 second preview (MP3 format) of the track
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
     */
    #[Api(optional: true)]
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
     */
    public static function with(
        ?string $id = null,
        ?array $artists = null,
        ?array $availableMarkets = null,
        ?int $discNumber = null,
        ?int $durationMs = null,
        ?bool $explicit = null,
        ?ExternalURLObject $externalURLs = null,
        ?string $href = null,
        ?bool $isLocal = null,
        ?bool $isPlayable = null,
        ?LinkedTrackObject $linkedFrom = null,
        ?string $name = null,
        ?string $previewURL = null,
        ?TrackRestrictionObject $restrictions = null,
        ?int $trackNumber = null,
        ?string $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $artists && $obj->artists = $artists;
        null !== $availableMarkets && $obj->availableMarkets = $availableMarkets;
        null !== $discNumber && $obj->discNumber = $discNumber;
        null !== $durationMs && $obj->durationMs = $durationMs;
        null !== $explicit && $obj->explicit = $explicit;
        null !== $externalURLs && $obj->externalURLs = $externalURLs;
        null !== $href && $obj->href = $href;
        null !== $isLocal && $obj->isLocal = $isLocal;
        null !== $isPlayable && $obj->isPlayable = $isPlayable;
        null !== $linkedFrom && $obj->linkedFrom = $linkedFrom;
        null !== $name && $obj->name = $name;
        null !== $previewURL && $obj->previewURL = $previewURL;
        null !== $restrictions && $obj->restrictions = $restrictions;
        null !== $trackNumber && $obj->trackNumber = $trackNumber;
        null !== $type && $obj->type = $type;
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
     * External URLs for this track.
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
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking/) is applied. If `true`, the track is playable in the given market. Otherwise `false`.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $obj = clone $this;
        $obj->isPlayable = $isPlayable;

        return $obj;
    }

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking/) is applied and is only part of the response if the track linking, in fact, exists. The requested track has been replaced with a different track. The track in the `linked_from` object contains information about the originally requested track.
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
     * A URL to a 30 second preview (MP3 format) of the track.
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
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

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
