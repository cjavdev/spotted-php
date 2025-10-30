<?php

declare(strict_types=1);

namespace Spotted\Browse;

use Spotted\Browse\BrowseGetNewReleasesResponse\Albums;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type BrowseGetNewReleasesResponseShape = array{albums: Albums}
 */
final class BrowseGetNewReleasesResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<BrowseGetNewReleasesResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public Albums $albums;

    /**
     * `new BrowseGetNewReleasesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrowseGetNewReleasesResponse::with(albums: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrowseGetNewReleasesResponse)->withAlbums(...)
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
    public static function with(Albums $albums): self
    {
        $obj = new self;

        $obj->albums = $albums;

        return $obj;
    }

    public function withAlbums(Albums $albums): self
    {
        $obj = clone $this;
        $obj->albums = $albums;

        return $obj;
    }
}
