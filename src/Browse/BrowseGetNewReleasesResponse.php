<?php

declare(strict_types=1);

namespace Spotted\Browse;

use Spotted\Browse\BrowseGetNewReleasesResponse\Albums;
use Spotted\Browse\BrowseGetNewReleasesResponse\Albums\Item;
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
     *
     * @param Albums|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<Item>|null,
     * } $albums
     */
    public static function with(Albums|array $albums): self
    {
        $obj = new self;

        $obj['albums'] = $albums;

        return $obj;
    }

    /**
     * @param Albums|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<Item>|null,
     * } $albums
     */
    public function withAlbums(Albums|array $albums): self
    {
        $obj = clone $this;
        $obj['albums'] = $albums;

        return $obj;
    }
}
