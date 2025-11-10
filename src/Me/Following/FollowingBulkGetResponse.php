<?php

declare(strict_types=1);

namespace Spotted\Me\Following;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\Me\Following\FollowingBulkGetResponse\Artists;

/**
 * @phpstan-type FollowingBulkGetResponseShape = array{artists: Artists}
 */
final class FollowingBulkGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<FollowingBulkGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public Artists $artists;

    /**
     * `new FollowingBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FollowingBulkGetResponse::with(artists: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FollowingBulkGetResponse)->withArtists(...)
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
     */
    public static function with(Artists $artists): self
    {
        $obj = new self;

        $obj->artists = $artists;

        return $obj;
    }

    public function withArtists(Artists $artists): self
    {
        $obj = clone $this;
        $obj->artists = $artists;

        return $obj;
    }
}
