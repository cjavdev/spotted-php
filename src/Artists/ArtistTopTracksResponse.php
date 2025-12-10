<?php

declare(strict_types=1);

namespace Spotted\Artists;

use Spotted\Core\Attributes\Required;
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
    #[Required(list: TrackObject::class)]
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
     * }> $tracks
     */
    public static function with(array $tracks): self
    {
        $self = new self;

        $self['tracks'] = $tracks;

        return $self;
    }

    /**
     * @param list<TrackObject|array{
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
     * }> $tracks
     */
    public function withTracks(array $tracks): self
    {
        $self = clone $this;
        $self['tracks'] = $tracks;

        return $self;
    }
}
