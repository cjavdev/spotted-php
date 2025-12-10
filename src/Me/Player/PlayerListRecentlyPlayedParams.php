<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get tracks from the current user's recently played tracks.
 * _**Note**: Currently doesn't support podcast episodes._.
 *
 * @see Spotted\Services\Me\PlayerService::listRecentlyPlayed()
 *
 * @phpstan-type PlayerListRecentlyPlayedParamsShape = array{
 *   after?: int, before?: int, limit?: int
 * }
 */
final class PlayerListRecentlyPlayedParams implements BaseModel
{
    /** @use SdkModel<PlayerListRecentlyPlayedParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A Unix timestamp in milliseconds. Returns all items
     * after (but not including) this cursor position. If `after` is specified, `before`
     * must not be specified.
     */
    #[Optional]
    public ?int $after;

    /**
     * A Unix timestamp in milliseconds. Returns all items
     * before (but not including) this cursor position. If `before` is specified,
     * `after` must not be specified.
     */
    #[Optional]
    public ?int $before;

    /**
     * The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     */
    #[Optional]
    public ?int $limit;

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
        ?int $after = null,
        ?int $before = null,
        ?int $limit = null
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $before && $self['before'] = $before;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    /**
     * A Unix timestamp in milliseconds. Returns all items
     * after (but not including) this cursor position. If `after` is specified, `before`
     * must not be specified.
     */
    public function withAfter(int $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * A Unix timestamp in milliseconds. Returns all items
     * before (but not including) this cursor position. If `before` is specified,
     * `after` must not be specified.
     */
    public function withBefore(int $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

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
}
