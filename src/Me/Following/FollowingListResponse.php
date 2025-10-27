<?php

declare(strict_types=1);

namespace Spotted\Me\Following;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\Me\Following\FollowingListResponse\Artists;

/**
 * @phpstan-type following_list_response = array{artists: Artists}
 */
final class FollowingListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<following_list_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public Artists $artists;

    /**
     * `new FollowingListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FollowingListResponse::with(artists: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FollowingListResponse)->withArtists(...)
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
