<?php

declare(strict_types=1);

namespace Spotted\Me\Top;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get the current user's top tracks based on calculated affinity.
 *
 * @see Spotted\Services\Me\TopService::listTopTracks()
 *
 * @phpstan-type TopListTopTracksParamsShape = array{
 *   limit?: int|null, offset?: int|null, timeRange?: string|null
 * }
 */
final class TopListTopTracksParams implements BaseModel
{
    /** @use SdkModel<TopListTopTracksParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Over what time frame the affinities are computed. Valid values: `long_term` (calculated from ~1 year of data and including all new data as it becomes available), `medium_term` (approximately last 6 months), `short_term` (approximately last 4 weeks). Default: `medium_term`.
     */
    #[Optional]
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
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $timeRange && $self['timeRange'] = $timeRange;

        return $self;
    }

    /**
     * The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Over what time frame the affinities are computed. Valid values: `long_term` (calculated from ~1 year of data and including all new data as it becomes available), `medium_term` (approximately last 6 months), `short_term` (approximately last 4 weeks). Default: `medium_term`.
     */
    public function withTimeRange(string $timeRange): self
    {
        $self = clone $this;
        $self['timeRange'] = $timeRange;

        return $self;
    }
}
