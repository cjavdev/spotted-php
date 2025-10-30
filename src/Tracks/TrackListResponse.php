<?php

declare(strict_types=1);

namespace Spotted\Tracks;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\TrackObject;

/**
 * @phpstan-type TrackListResponseShape = array{tracks: list<TrackObject>}
 */
final class TrackListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TrackListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<TrackObject> $tracks */
    #[Api(list: TrackObject::class)]
    public array $tracks;

    /**
     * `new TrackListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackListResponse::with(tracks: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackListResponse)->withTracks(...)
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
     * @param list<TrackObject> $tracks
     */
    public static function with(array $tracks): self
    {
        $obj = new self;

        $obj->tracks = $tracks;

        return $obj;
    }

    /**
     * @param list<TrackObject> $tracks
     */
    public function withTracks(array $tracks): self
    {
        $obj = clone $this;
        $obj->tracks = $tracks;

        return $obj;
    }
}
