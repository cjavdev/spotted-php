<?php

declare(strict_types=1);

namespace Spotted\Me\Following;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Me\Following\FollowingFollowParams\Type;

/**
 * Add the current user as a follower of one or more artists or other Spotify users.
 *
 * @see Spotted\Me\Following->follow
 *
 * @phpstan-type following_follow_params = array{
 *   ids: list<string>, type: Type|value-of<Type>
 * }
 */
final class FollowingFollowParams implements BaseModel
{
    /** @use SdkModel<following_follow_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids).
     * For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._.
     *
     * @var list<string> $ids
     */
    #[Api(list: 'string')]
    public array $ids;

    /**
     * The ID type.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new FollowingFollowParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FollowingFollowParams::with(ids: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FollowingFollowParams)->withIDs(...)->withType(...)
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
     * @param list<string> $ids
     * @param Type|value-of<Type> $type
     */
    public static function with(array $ids, Type|string $type): self
    {
        $obj = new self;

        $obj->ids = $ids;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids).
     * For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._.
     *
     * @param list<string> $ids
     */
    public function withIDs(array $ids): self
    {
        $obj = clone $this;
        $obj->ids = $ids;

        return $obj;
    }

    /**
     * The ID type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
