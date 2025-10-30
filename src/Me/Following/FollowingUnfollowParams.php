<?php

declare(strict_types=1);

namespace Spotted\Me\Following;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Me\Following\FollowingUnfollowParams\Type;

/**
 * Remove the current user as a follower of one or more artists or other Spotify users.
 *
 * @see Spotted\Me\Following->unfollow
 *
 * @phpstan-type FollowingUnfollowParamsShape = array{
 *   ids?: list<string>, type: Type|value-of<Type>
 * }
 */
final class FollowingUnfollowParams implements BaseModel
{
    /** @use SdkModel<FollowingUnfollowParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._.
     *
     * @var list<string>|null $ids
     */
    #[Api(list: 'string', optional: true)]
    public ?array $ids;

    /**
     * The ID type: either `artist` or `user`.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new FollowingUnfollowParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FollowingUnfollowParams::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FollowingUnfollowParams)->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param list<string> $ids
     */
    public static function with(Type|string $type, ?array $ids = null): self
    {
        $obj = new self;

        $obj['type'] = $type;

        null !== $ids && $obj->ids = $ids;

        return $obj;
    }

    /**
     * A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._.
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
     * The ID type: either `artist` or `user`.
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
