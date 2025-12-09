<?php

declare(strict_types=1);

namespace Spotted\Artists;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalIDObject;
use Spotted\ExternalURLObject;
use Spotted\LinkedTrackObject;
use Spotted\SimplifiedArtistObject;
use Spotted\TrackObject;
use Spotted\TrackObject\Album;
use Spotted\TrackObject\Type;
use Spotted\TrackRestrictionObject;

/**
 * @phpstan-type ArtistTopTracksResponseShape = array{tracks: list<TrackObject>}
 */
final class ArtistTopTracksResponse implements BaseModel
{
    /** @use SdkModel<ArtistTopTracksResponseShape> */
    use SdkModel;

    /** @var list<TrackObject> $tracks */
    #[Api(list: TrackObject::class)]
    public array $tracks;

    /**
     * `new ArtistTopTracksResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArtistTopTracksResponse::with(tracks: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArtistTopTracksResponse)->withTracks(...)
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
     * @param list<TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   available_markets?: list<string>|null,
     *   disc_number?: int|null,
     *   duration_ms?: int|null,
     *   explicit?: bool|null,
     *   external_ids?: ExternalIDObject|null,
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   is_local?: bool|null,
     *   is_playable?: bool|null,
     *   linked_from?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   preview_url?: string|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   track_number?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }> $tracks
     */
    public static function with(array $tracks): self
    {
        $obj = new self;

        $obj['tracks'] = $tracks;

        return $obj;
    }

    /**
     * @param list<TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   available_markets?: list<string>|null,
     *   disc_number?: int|null,
     *   duration_ms?: int|null,
     *   explicit?: bool|null,
     *   external_ids?: ExternalIDObject|null,
     *   external_urls?: ExternalURLObject|null,
     *   href?: string|null,
     *   is_local?: bool|null,
     *   is_playable?: bool|null,
     *   linked_from?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   preview_url?: string|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   track_number?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }> $tracks
     */
    public function withTracks(array $tracks): self
    {
        $obj = clone $this;
        $obj['tracks'] = $tracks;

        return $obj;
    }
}
