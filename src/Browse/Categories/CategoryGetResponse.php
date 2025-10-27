<?php

declare(strict_types=1);

namespace Spotted\Browse\Categories;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\ImageObject;

/**
 * @phpstan-type category_get_response = array{
 *   id: string, href: string, icons: list<ImageObject>, name: string
 * }
 */
final class CategoryGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<category_get_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * The [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) of the category.
     */
    #[Api]
    public string $id;

    /**
     * A link to the Web API endpoint returning full details of the category.
     */
    #[Api]
    public string $href;

    /**
     * The category icon, in various sizes.
     *
     * @var list<ImageObject> $icons
     */
    #[Api(list: ImageObject::class)]
    public array $icons;

    /**
     * The name of the category.
     */
    #[Api]
    public string $name;

    /**
     * `new CategoryGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CategoryGetResponse::with(id: ..., href: ..., icons: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CategoryGetResponse)
     *   ->withID(...)
     *   ->withHref(...)
     *   ->withIcons(...)
     *   ->withName(...)
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
     * @param list<ImageObject> $icons
     */
    public static function with(
        string $id,
        string $href,
        array $icons,
        string $name
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->href = $href;
        $obj->icons = $icons;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) of the category.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * A link to the Web API endpoint returning full details of the category.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * The category icon, in various sizes.
     *
     * @param list<ImageObject> $icons
     */
    public function withIcons(array $icons): self
    {
        $obj = clone $this;
        $obj->icons = $icons;

        return $obj;
    }

    /**
     * The name of the category.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
