<?php

declare(strict_types=1);

namespace Spotted\Playlists\Images;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Replace the image used to represent a specific playlist.
 *
 * @see Spotted\Playlists\Images->update
 *
 * @phpstan-type ImageUpdateParamsShape = array{body: string}
 */
final class ImageUpdateParams implements BaseModel
{
    /** @use SdkModel<ImageUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Base64 encoded JPEG image data, maximum payload size is 256 KB.
     */
    #[Api]
    public string $body;

    /**
     * `new ImageUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ImageUpdateParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ImageUpdateParams)->withBody(...)
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
    public static function with(string $body): self
    {
        $obj = new self;

        $obj->body = $body;

        return $obj;
    }

    /**
     * Base64 encoded JPEG image data, maximum payload size is 256 KB.
     */
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
