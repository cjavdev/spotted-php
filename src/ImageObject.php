<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type ImageObjectShape = array{
 *   height: int|null, url: string, width: int|null, published?: bool|null
 * }
 */
final class ImageObject implements BaseModel
{
    /** @use SdkModel<ImageObjectShape> */
    use SdkModel;

    /**
     * The image height in pixels.
     */
    #[Required]
    public ?int $height;

    /**
     * The source URL of the image.
     */
    #[Required]
    public string $url;

    /**
     * The image width in pixels.
     */
    #[Required]
    public ?int $width;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * `new ImageObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ImageObject::with(height: ..., url: ..., width: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ImageObject)->withHeight(...)->withURL(...)->withWidth(...)
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
    public static function with(
        ?int $height,
        string $url,
        ?int $width,
        ?bool $published = null
    ): self {
        $self = new self;

        $self['height'] = $height;
        $self['url'] = $url;
        $self['width'] = $width;

        null !== $published && $self['published'] = $published;

        return $self;
    }

    /**
     * The image height in pixels.
     */
    public function withHeight(?int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * The source URL of the image.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * The image width in pixels.
     */
    public function withWidth(?int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

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
