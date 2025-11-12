<?php

declare(strict_types=1);

namespace Spotted\Playlists\Tracks\TrackRemoveParams;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type TrackShape = array{uri?: string|null}
 */
final class Track implements BaseModel
{
    /** @use SdkModel<TrackShape> */
    use SdkModel;

    /**
     * Spotify URI.
     */
    #[Api(optional: true)]
    public ?string $uri;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $uri = null): self
    {
        $obj = new self;

        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    /**
     * Spotify URI.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
