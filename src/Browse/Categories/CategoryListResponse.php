<?php

declare(strict_types=1);

namespace Spotted\Browse\Categories;

use Spotted\Browse\Categories\CategoryListResponse\Categories;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CategoriesShape from \Spotted\Browse\Categories\CategoryListResponse\Categories
 *
 * @phpstan-type CategoryListResponseShape = array{
 *   categories: Categories|CategoriesShape
 * }
 */
final class CategoryListResponse implements BaseModel
{
    /** @use SdkModel<CategoryListResponseShape> */
    use SdkModel;

    #[Required]
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
     *
     * @param Categories|CategoriesShape $categories
     */
    public static function with(Categories|array $categories): self
    {
        $self = new self;

        $self['categories'] = $categories;

        return $self;
    }

    /**
     * @param Categories|CategoriesShape $categories
     */
    public function withCategories(Categories|array $categories): self
    {
        $self = clone $this;
        $self['categories'] = $categories;

        return $self;
    }
}
