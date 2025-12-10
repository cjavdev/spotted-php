<?php

declare(strict_types=1);

namespace Spotted\Me\Following;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Me\Following\FollowingCheckParams\Type;

/**
 * Check to see if the current user is following one or more artists or other Spotify users.
 *
 * @see Spotted\Services\Me\FollowingService::check()
 *
 * @phpstan-type FollowingCheckParamsShape = array{
 *   ids: string, type: Type|value-of<Type>
 * }
 */
final class FollowingCheckParams implements BaseModel
{
    /** @use SdkModel<FollowingCheckParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A comma-separated list of the artist or the user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) to check. For example: `ids=74ASZWbe4lXaubB36ztrGX,08td7MxkoHQkXnWAYD8d6Q`. A maximum of 50 IDs can be sent in one request.
     */
    #[Required]
    public string $ids;

    /**
     * The ID type: either `artist` or `user`.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new FollowingCheckParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FollowingCheckParams::with(ids: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FollowingCheckParams)->withIDs(...)->withType(...)
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
    public static function with(string $ids, Type|string $type): self
    {
        $self = new self;

        $self['ids'] = $ids;
        $self['type'] = $type;

        return $self;
    }

    /**
     * A comma-separated list of the artist or the user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) to check. For example: `ids=74ASZWbe4lXaubB36ztrGX,08td7MxkoHQkXnWAYD8d6Q`. A maximum of 50 IDs can be sent in one request.
     */
    public function withIDs(string $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

        return $self;
    }

    /**
     * The ID type: either `artist` or `user`.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
