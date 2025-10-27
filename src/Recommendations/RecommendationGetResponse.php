<?php

declare(strict_types=1);

namespace Spotted\Recommendations;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\Recommendations\RecommendationGetResponse\Seed;
use Spotted\TrackObject;

/**
 * @phpstan-type recommendation_get_response = array{
 *   seeds: list<Seed>, tracks: list<TrackObject>
 * }
 */
final class RecommendationGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<recommendation_get_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * An array of recommendation seed objects.
     *
     * @var list<Seed> $seeds
     */
    #[Api(list: Seed::class)]
    public array $seeds;

    /**
     * An array of track objects ordered according to the parameters supplied.
     *
     * @var list<TrackObject> $tracks
     */
    #[Api(list: TrackObject::class)]
    public array $tracks;

    /**
     * `new RecommendationGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecommendationGetResponse::with(seeds: ..., tracks: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecommendationGetResponse)->withSeeds(...)->withTracks(...)
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
     * @param list<Seed> $seeds
     * @param list<TrackObject> $tracks
     */
    public static function with(array $seeds, array $tracks): self
    {
        $obj = new self;

        $obj->seeds = $seeds;
        $obj->tracks = $tracks;

        return $obj;
    }

    /**
     * An array of recommendation seed objects.
     *
     * @param list<Seed> $seeds
     */
    public function withSeeds(array $seeds): self
    {
        $obj = clone $this;
        $obj->seeds = $seeds;

        return $obj;
    }

    /**
     * An array of track objects ordered according to the parameters supplied.
     *
     * @param list<TrackObject> $tracks
     */
    public function withTracks(array $tracks): self
    {
        $obj = clone $this;
        $obj->tracks = $tracks;

        return $obj;
    }
}
