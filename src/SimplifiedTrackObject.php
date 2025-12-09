<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\SimplifiedArtistObject\Type;

/**
 * @phpstan-type SimplifiedTrackObjectShape = array{
 *   id?: string|null,
 *   artists?: list<SimplifiedArtistObject>|null,
 *   available_markets?: list<string>|null,
 *   disc_number?: int|null,
 *   duration_ms?: int|null,
 *   explicit?: bool|null,
 *   external_urls?: ExternalURLObject|null,
 *   href?: string|null,
 *   is_local?: bool|null,
 *   is_playable?: bool|null,
 *   linked_from?: LinkedTrackObject|null,
 *   name?: string|null,
 *   preview_url?: string|null,
 *   restrictions?: TrackRestrictionObject|null,
 *   track_number?: int|null,
 *   type?: string|null,
 *   uri?: string|null,
 * }
 */
final class SimplifiedTrackObject implements BaseModel
{
    /** @use SdkModel<SimplifiedTrackObjectShape> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    #[Optional]
    public ?string $id;

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
     * @var list<string>|null $available_markets
     */
    #[Optional(list: 'string')]
    public ?array $available_markets;

    /**
     * The disc number (usually `1` unless the album consists of more than one disc).
     */
    #[Optional]
    public ?int $disc_number;

    /**
     * The track length in milliseconds.
     */
    #[Optional]
    public ?int $duration_ms;

    /**
     * Whether or not the track has explicit lyrics ( `true` = yes it does; `false` = no it does not OR unknown).
     */
    #[Optional]
    public ?bool $explicit;

    /**
     * External URLs for this track.
     */
    #[Optional]
    public ?ExternalURLObject $external_urls;

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    #[Optional]
    public ?string $href;

    /**
     * Whether or not the track is from a local file.
     */
    #[Optional]
    public ?bool $is_local;

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking/) is applied. If `true`, the track is playable in the given market. Otherwise `false`.
     */
    #[Optional]
    public ?bool $is_playable;

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking/) is applied and is only part of the response if the track linking, in fact, exists. The requested track has been replaced with a different track. The track in the `linked_from` object contains information about the originally requested track.
     */
    #[Optional]
    public ?LinkedTrackObject $linked_from;

    /**
     * The name of the track.
     */
    #[Optional]
    public ?string $name;

    /**
     * @deprecated
     *
     * A URL to a 30 second preview (MP3 format) of the track
     */
    #[Optional(nullable: true)]
    public ?string $preview_url;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Optional]
    public ?TrackRestrictionObject $restrictions;

    /**
     * The number of the track. If an album has several discs, the track number is the number on the specified disc.
     */
    #[Optional]
    public ?int $track_number;

    /**
     * The object type: "track".
     */
    #[Optional]
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
     * @param LinkedTrackObject|array{
     *   id?: string|null,
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: string|null,
     *   uri?: string|null,
     * } $linked_from
     * @param TrackRestrictionObject|array{reason?: string|null} $restrictions
     */
    public static function with(
        ?string $id = null,
        ?array $artists = null,
        ?array $available_markets = null,
        ?int $disc_number = null,
        ?int $duration_ms = null,
        ?bool $explicit = null,
        ExternalURLObject|array|null $external_urls = null,
        ?string $href = null,
        ?bool $is_local = null,
        ?bool $is_playable = null,
        LinkedTrackObject|array|null $linked_from = null,
        ?string $name = null,
        ?string $preview_url = null,
        TrackRestrictionObject|array|null $restrictions = null,
        ?int $track_number = null,
        ?string $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $artists && $obj['artists'] = $artists;
        null !== $available_markets && $obj['available_markets'] = $available_markets;
        null !== $disc_number && $obj['disc_number'] = $disc_number;
        null !== $duration_ms && $obj['duration_ms'] = $duration_ms;
        null !== $explicit && $obj['explicit'] = $explicit;
        null !== $external_urls && $obj['external_urls'] = $external_urls;
        null !== $href && $obj['href'] = $href;
        null !== $is_local && $obj['is_local'] = $is_local;
        null !== $is_playable && $obj['is_playable'] = $is_playable;
        null !== $linked_from && $obj['linked_from'] = $linked_from;
        null !== $name && $obj['name'] = $name;
        null !== $preview_url && $obj['preview_url'] = $preview_url;
        null !== $restrictions && $obj['restrictions'] = $restrictions;
        null !== $track_number && $obj['track_number'] = $track_number;
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
     * The artists who performed the track. Each artist object includes a link in `href` to more detailed information about the artist.
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
     * A list of the countries in which the track can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
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
     * The disc number (usually `1` unless the album consists of more than one disc).
     */
    public function withDiscNumber(int $discNumber): self
    {
        $obj = clone $this;
        $obj['disc_number'] = $discNumber;

        return $obj;
    }

    /**
     * The track length in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $obj = clone $this;
        $obj['duration_ms'] = $durationMs;

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
     * External URLs for this track.
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
        $obj['is_local'] = $isLocal;

        return $obj;
    }

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking/) is applied. If `true`, the track is playable in the given market. Otherwise `false`.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $obj = clone $this;
        $obj['is_playable'] = $isPlayable;

        return $obj;
    }

    /**
     * Part of the response when [Track Relinking](/documentation/web-api/concepts/track-relinking/) is applied and is only part of the response if the track linking, in fact, exists. The requested track has been replaced with a different track. The track in the `linked_from` object contains information about the originally requested track.
     *
     * @param LinkedTrackObject|array{
     *   id?: string|null,
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   type?: string|null,
     *   uri?: string|null,
     * } $linkedFrom
     */
    public function withLinkedFrom(LinkedTrackObject|array $linkedFrom): self
    {
        $obj = clone $this;
        $obj['linked_from'] = $linkedFrom;

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
     * A URL to a 30 second preview (MP3 format) of the track.
     */
    public function withPreviewURL(?string $previewURL): self
    {
        $obj = clone $this;
        $obj['preview_url'] = $previewURL;

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
        $obj['track_number'] = $trackNumber;

        return $obj;
    }

    /**
     * The object type: "track".
     */
    public function withType(string $type): self
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
