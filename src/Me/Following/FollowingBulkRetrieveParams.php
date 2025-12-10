<?php

declare(strict_types=1);

namespace Spotted\Me\Following;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get the current user's followed artists.
 *
 * @see Spotted\Services\Me\FollowingService::bulkRetrieve()
 *
 * @phpstan-type FollowingBulkRetrieveParamsShape = array{
 *   type: 'artist', after?: string, limit?: int
 * }
 */
final class FollowingBulkRetrieveParams implements BaseModel
{
    /** @use SdkModel<FollowingBulkRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID type: currently only `artist` is supported.
     *
     * @var 'artist' $type
     */
    #[Required]
    public string $type = 'artist';

    /**
     * The last artist ID retrieved from the previous request.
     */
    #[Optional]
    public ?string $after;

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
    public static function with(?string $after = null, ?int $limit = null): self
    {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    /**
     * The last artist ID retrieved from the previous request.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

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
