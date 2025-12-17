<?php

declare(strict_types=1);

namespace Spotted\Tracks;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\TrackObject;

/**
 * @phpstan-import-type TrackObjectShape from \Spotted\TrackObject
 *
 * @phpstan-type TrackBulkGetResponseShape = array{tracks: list<TrackObjectShape>}
 */
final class TrackBulkGetResponse implements BaseModel
{
    /** @use SdkModel<TrackBulkGetResponseShape> */
    use SdkModel;

    /** @var list<TrackObject> $tracks */
    #[Required(list: TrackObject::class)]
    public array $tracks;

    /**
     * `new TrackBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackBulkGetResponse::with(tracks: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackBulkGetResponse)->withTracks(...)
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
     * @param list<TrackObjectShape> $tracks
     */
    public static function with(array $tracks): self
    {
        $self = new self;

        $self['tracks'] = $tracks;

        return $self;
    }

    /**
     * @param list<TrackObjectShape> $tracks
     */
    public function withTracks(array $tracks): self
    {
        $self = clone $this;
        $self['tracks'] = $tracks;

        return $self;
    }
}
