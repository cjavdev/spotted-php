<?php

declare(strict_types=1);

namespace Spotted\Browse\Categories;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get a list of Spotify playlists tagged with a particular category.
 *
 * @deprecated
 * @see Spotted\Browse\Categories->getPlaylists
 *
 * @phpstan-type CategoryGetPlaylistsParamsShape = array{limit?: int, offset?: int}
 */
final class CategoryGetPlaylistsParams implements BaseModel
{
    /** @use SdkModel<CategoryGetPlaylistsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     */
    #[Api(optional: true)]
    public ?int $offset;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $limit = null, ?int $offset = null): self
    {
        $obj = new self;

        null !== $limit && $obj->limit = $limit;
        null !== $offset && $obj->offset = $offset;

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

    /**
     * The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }
}
