<?php

declare(strict_types=1);

namespace Spotted\Me\Albums;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Check if one or more albums is already saved in the current Spotify user's 'Your Music' library.
 *
 * @see Spotted\Me\Albums->check
 *
 * @phpstan-type AlbumCheckParamsShape = array{ids: string}
 */
final class AlbumCheckParams implements BaseModel
{
    /** @use SdkModel<AlbumCheckParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the albums. Maximum: 20 IDs.
     */
    #[Api]
    public string $ids;

    /**
     * `new AlbumCheckParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AlbumCheckParams::with(ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AlbumCheckParams)->withIDs(...)
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
    public static function with(string $ids): self
    {
        $obj = new self;

        $obj->ids = $ids;

        return $obj;
    }

    /**
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the albums. Maximum: 20 IDs.
     */
    public function withIDs(string $ids): self
    {
        $obj = clone $this;
        $obj->ids = $ids;

        return $obj;
    }
}
