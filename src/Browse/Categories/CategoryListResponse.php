<?php

declare(strict_types=1);

namespace Spotted\Browse\Categories;

use Spotted\Browse\Categories\CategoryListResponse\Categories;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CategoryListResponseShape = array{categories: Categories}
 */
final class CategoryListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CategoryListResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public Categories $categories;

    /**
     * `new CategoryListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CategoryListResponse::with(categories: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CategoryListResponse)->withCategories(...)
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
    public static function with(Categories $categories): self
    {
        $obj = new self;

        $obj->categories = $categories;

        return $obj;
    }

    public function withCategories(Categories $categories): self
    {
        $obj = clone $this;
        $obj->categories = $categories;

        return $obj;
    }
}
