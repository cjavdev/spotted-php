<?php

declare(strict_types=1);

namespace Spotted\Artists;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get Spotify catalog information for several artists based on their Spotify IDs.
 *
 * @see Spotted\Services\ArtistsService::bulkRetrieve()
 *
 * @phpstan-type ArtistBulkRetrieveParamsShape = array{ids: string}
 */
final class ArtistBulkRetrieveParams implements BaseModel
{
    /** @use SdkModel<ArtistBulkRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the artists. Maximum: 50 IDs.
     */
    #[Api]
    public string $ids;

    /**
     * `new ArtistBulkRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArtistBulkRetrieveParams::with(ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArtistBulkRetrieveParams)->withIDs(...)
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
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the artists. Maximum: 50 IDs.
     */
    public function withIDs(string $ids): self
    {
        $obj = clone $this;
        $obj->ids = $ids;

        return $obj;
    }
}
