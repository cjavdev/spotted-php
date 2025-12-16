<?php

declare(strict_types=1);

namespace Spotted\Browse\Categories\CategoryListResponse\Categories;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ImageObject;

/**
 * @phpstan-type ItemShape = array{
 *   id: string,
 *   href: string,
 *   icons: list<ImageObject>,
 *   name: string,
 *   published?: bool|null,
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
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

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
     *   height: int|null, url: string, width: int|null, published?: bool|null
     * }> $icons
     */
    public static function with(
        string $id,
        string $href,
        array $icons,
        string $name,
        ?bool $published = null
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['href'] = $href;
        $self['icons'] = $icons;
        $self['name'] = $name;

        null !== $published && $self['published'] = $published;

        return $self;
    }

    /**
     * The [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) of the category.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A link to the Web API endpoint returning full details of the category.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    /**
     * The category icon, in various sizes.
     *
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null, published?: bool|null
     * }> $icons
     */
    public function withIcons(array $icons): self
    {
        $self = clone $this;
        $self['icons'] = $icons;

        return $self;
    }

    /**
     * The name of the category.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }
}
