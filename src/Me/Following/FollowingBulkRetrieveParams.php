<?php

declare(strict_types=1);

namespace Spotted\Me\Following;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get the current user's followed artists.
 *
 * @see Spotted\Me\Following->bulkRetrieve
 *
 * @phpstan-type FollowingBulkRetrieveParamsShape = array{
 *   type: string, after?: string, limit?: int
 * }
 */
final class FollowingBulkRetrieveParams implements BaseModel
{
    /** @use SdkModel<FollowingBulkRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID type: currently only `artist` is supported.
     */
    #[Api]
    public string $type = 'artist';

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
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $limit && $obj->limit = $limit;

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
