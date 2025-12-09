<?php

declare(strict_types=1);

namespace Spotted\Browse\Categories\CategoryListResponse\Categories;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ImageObject;

/**
 * @phpstan-type ItemShape = array{
 *   id: string, href: string, icons: list<ImageObject>, name: string
 * }
 */
final class Item implements BaseModel
{
    /** @use SdkModel<ItemShape> */
    use SdkModel;

    /**
     * The [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) of the category.
     */
    #[Required]
    public string $id;

    /**
     * A link to the Web API endpoint returning full details of the category.
     */
    #[Required]
    public string $href;

    /**
     * The category icon, in various sizes.
     *
     * @var list<ImageObject> $icons
     */
    #[Required(list: ImageObject::class)]
    public array $icons;

    /**
     * The name of the category.
     */
    #[Required]
    public string $name;

    /**
     * `new Item()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Item::with(id: ..., href: ..., icons: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Item)->withID(...)->withHref(...)->withIcons(...)->withName(...)
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
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $icons
     */
    public static function with(
        string $id,
        string $href,
        array $icons,
        string $name
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['href'] = $href;
        $obj['icons'] = $icons;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) of the category.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * A link to the Web API endpoint returning full details of the category.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * The category icon, in various sizes.
     *
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $icons
     */
    public function withIcons(array $icons): self
    {
        $obj = clone $this;
        $obj['icons'] = $icons;

        return $obj;
    }

    /**
     * The name of the category.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
