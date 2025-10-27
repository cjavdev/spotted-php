<?php

declare(strict_types=1);

namespace Spotted\Me\Shows;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Check if one or more shows is already saved in the current Spotify user's library.
 *
 * @see Spotted\Me\Shows->check
 *
 * @phpstan-type show_check_params = array{ids: string}
 */
final class ShowCheckParams implements BaseModel
{
    /** @use SdkModel<show_check_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the shows. Maximum: 50 IDs.
     */
    #[Api]
    public string $ids;

    /**
     * `new ShowCheckParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ShowCheckParams::with(ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ShowCheckParams)->withIDs(...)
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
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the shows. Maximum: 50 IDs.
     */
    public function withIDs(string $ids): self
    {
        $obj = clone $this;
        $obj->ids = $ids;

        return $obj;
    }
}
