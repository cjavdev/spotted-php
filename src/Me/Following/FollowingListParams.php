<?php

declare(strict_types=1);

namespace Spotted\Me\Following;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Me\Following\FollowingListParams\Type;

/**
 * Get the current user's followed artists.
 *
 * @see Spotted\Me\Following->list
 *
 * @phpstan-type FollowingListParamsShape = array{
 *   type: Type|value-of<Type>, after?: string, limit?: int
 * }
 */
final class FollowingListParams implements BaseModel
{
    /** @use SdkModel<FollowingListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID type: currently only `artist` is supported.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * The last artist ID retrieved from the previous request.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * `new FollowingListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FollowingListParams::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FollowingListParams)->withType(...)
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
     */
    public static function with(
        Type|string $type,
        ?string $after = null,
        ?int $limit = null
    ): self {
        $obj = new self;

        $obj['type'] = $type;

        null !== $after && $obj->after = $after;
        null !== $limit && $obj->limit = $limit;

        return $obj;
    }

    /**
     * The ID type: currently only `artist` is supported.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The last artist ID retrieved from the previous request.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

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
