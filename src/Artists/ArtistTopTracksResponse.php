<?php

declare(strict_types=1);

namespace Spotted\Artists;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\TrackObject;

/**
 * @phpstan-import-type TrackObjectShape from \Spotted\TrackObject
 *
 * @phpstan-type ArtistTopTracksResponseShape = array{
 *   tracks: list<TrackObject|TrackObjectShape>
 * }
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
     * @param list<TrackObject|TrackObjectShape> $tracks
     */
    public static function with(array $tracks): self
    {
        $self = new self;

        $self['tracks'] = $tracks;

        return $self;
    }

    /**
     * @param list<TrackObject|TrackObjectShape> $tracks
     */
    public function withTracks(array $tracks): self
    {
        $self = clone $this;
        $self['tracks'] = $tracks;

        return $self;
    }
}
