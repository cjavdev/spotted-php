<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalURLObjectShape = array{spotify?: string|null}
 */
final class ExternalURLObject implements BaseModel
{
    /** @use SdkModel<ExternalURLObjectShape> */
    use SdkModel;

    /**
     * The [Spotify URL](/documentation/web-api/concepts/spotify-uris-ids) for the object.
     */
    #[Api(optional: true)]
    public ?string $spotify;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $spotify = null): self
    {
        $obj = new self;

        null !== $spotify && $obj->spotify = $spotify;

        return $obj;
    }

    /**
     * The [Spotify URL](/documentation/web-api/concepts/spotify-uris-ids) for the object.
     */
    public function withSpotify(string $spotify): self
    {
        $obj = clone $this;
        $obj->spotify = $spotify;

        return $obj;
    }
}
