<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type image_object = array{
 *   height: int|null, url: string, width: int|null
 * }
 */
final class ImageObject implements BaseModel
{
    /** @use SdkModel<image_object> */
    use SdkModel;

    /**
     * The image height in pixels.
     */
    #[Api]
    public ?int $height;

    /**
     * The source URL of the image.
     */
    #[Api]
    public string $url;

    /**
     * The image width in pixels.
     */
    #[Api]
    public ?int $width;

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
    public static function with(?int $height, string $url, ?int $width): self
    {
        $obj = new self;

        $obj->height = $height;
        $obj->url = $url;
        $obj->width = $width;

        return $obj;
    }

    /**
     * The image height in pixels.
     */
    public function withHeight(?int $height): self
    {
        $obj = clone $this;
        $obj->height = $height;

        return $obj;
    }

    /**
     * The source URL of the image.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * The image width in pixels.
     */
    public function withWidth(?int $width): self
    {
        $obj = clone $this;
        $obj->width = $width;

        return $obj;
    }
}
