<?php

declare(strict_types=1);

namespace Spotted\Me\Tracks;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Check if one or more tracks is already saved in the current Spotify user's 'Your Music' library.
 *
 * @see Spotted\Services\Me\TracksService::check()
 *
 * @phpstan-type TrackCheckParamsShape = array{ids: string}
 */
final class TrackCheckParams implements BaseModel
{
    /** @use SdkModel<TrackCheckParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=4iV5W9uYEdYUVa79Axb7Rh,1301WleyT98MSxVHPZCA6M`. Maximum: 50 IDs.
     */
    #[Api]
    public string $ids;

    /**
     * `new TrackCheckParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackCheckParams::with(ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackCheckParams)->withIDs(...)
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
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=4iV5W9uYEdYUVa79Axb7Rh,1301WleyT98MSxVHPZCA6M`. Maximum: 50 IDs.
     */
    public function withIDs(string $ids): self
    {
        $obj = clone $this;
        $obj->ids = $ids;

        return $obj;
    }
}
