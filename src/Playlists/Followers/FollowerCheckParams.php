<?php

declare(strict_types=1);

namespace Spotted\Playlists\Followers;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Check to see if the current user is following a specified playlist.
 *
 * @see Spotted\Playlists\Followers->check
 *
 * @phpstan-type FollowerCheckParamsShape = array{ids?: string}
 */
final class FollowerCheckParams implements BaseModel
{
    /** @use SdkModel<FollowerCheckParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * **Deprecated** A single item list containing current user's [Spotify Username](/documentation/web-api/concepts/spotify-uris-ids). Maximum: 1 id.
     */
    #[Api(optional: true)]
    public ?string $ids;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $ids = null): self
    {
        $obj = new self;

        null !== $ids && $obj->ids = $ids;

        return $obj;
    }

    /**
     * **Deprecated** A single item list containing current user's [Spotify Username](/documentation/web-api/concepts/spotify-uris-ids). Maximum: 1 id.
     */
    public function withIDs(string $ids): self
    {
        $obj = clone $this;
        $obj->ids = $ids;

        return $obj;
    }
}
