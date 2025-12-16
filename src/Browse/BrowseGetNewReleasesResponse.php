<?php

declare(strict_types=1);

namespace Spotted\Browse;

use Spotted\Browse\BrowseGetNewReleasesResponse\Albums;
use Spotted\Browse\BrowseGetNewReleasesResponse\Albums\Item;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type BrowseGetNewReleasesResponseShape = array{albums: Albums}
 */
final class BrowseGetNewReleasesResponse implements BaseModel
{
    /** @use SdkModel<BrowseGetNewReleasesResponseShape> */
    use SdkModel;

    #[Required]
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
     *   published?: bool|null,
     * } $albums
     */
    public static function with(Albums|array $albums): self
    {
        $self = new self;

        $self['albums'] = $albums;

        return $self;
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
     *   published?: bool|null,
     * } $albums
     */
    public function withAlbums(Albums|array $albums): self
    {
        $self = clone $this;
        $self['albums'] = $albums;

        return $self;
    }
}
