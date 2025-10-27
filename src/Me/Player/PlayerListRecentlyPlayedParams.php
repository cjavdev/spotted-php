<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get tracks from the current user's recently played tracks.
 * _**Note**: Currently doesn't support podcast episodes._.
 *
 * @see Spotted\Me\Player->listRecentlyPlayed
 *
 * @phpstan-type player_list_recently_played_params = array{
 *   after?: int, before?: int, limit?: int
 * }
 */
final class PlayerListRecentlyPlayedParams implements BaseModel
{
    /** @use SdkModel<player_list_recently_played_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A Unix timestamp in milliseconds. Returns all items
     * after (but not including) this cursor position. If `after` is specified, `before`
     * must not be specified.
     */
    #[Api(optional: true)]
    public ?int $after;

    /**
     * A Unix timestamp in milliseconds. Returns all items
     * before (but not including) this cursor position. If `before` is specified,
     * `after` must not be specified.
     */
    #[Api(optional: true)]
    public ?int $before;

    /**
     * The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $before && $obj->before = $before;
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    /**
     * A Unix timestamp in milliseconds. Returns all items
     * after (but not including) this cursor position. If `after` is specified, `before`
     * must not be specified.
     */
    public function withAfter(int $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * A Unix timestamp in milliseconds. Returns all items
     * before (but not including) this cursor position. If `before` is specified,
     * `after` must not be specified.
     */
    public function withBefore(int $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

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
}
