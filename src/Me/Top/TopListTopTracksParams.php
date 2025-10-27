<?php

declare(strict_types=1);

namespace Spotted\Me\Top;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get the current user's top tracks based on calculated affinity.
 *
 * @see Spotted\Me\Top->listTopTracks
 *
 * @phpstan-type top_list_top_tracks_params = array{
 *   limit?: int, offset?: int, timeRange?: string
 * }
 */
final class TopListTopTracksParams implements BaseModel
{
    /** @use SdkModel<top_list_top_tracks_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     */
    #[Api(optional: true)]
    public ?int $offset;

    /**
     * Over what time frame the affinities are computed. Valid values: `long_term` (calculated from ~1 year of data and including all new data as it becomes available), `medium_term` (approximately last 6 months), `short_term` (approximately last 4 weeks). Default: `medium_term`.
     */
    #[Api(optional: true)]
    public ?string $timeRange;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $limit = null,
        ?int $offset = null,
        ?string $timeRange = null
    ): self {
        $obj = new self;

        null !== $limit && $obj->limit = $limit;
        null !== $offset && $obj->offset = $offset;
        null !== $timeRange && $obj->timeRange = $timeRange;

        return $obj;
    }

    /**
     * The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }

    /**
     * Over what time frame the affinities are computed. Valid values: `long_term` (calculated from ~1 year of data and including all new data as it becomes available), `medium_term` (approximately last 6 months), `short_term` (approximately last 4 weeks). Default: `medium_term`.
     */
    public function withTimeRange(string $timeRange): self
    {
        $obj = clone $this;
        $obj->timeRange = $timeRange;

        return $obj;
    }
}
