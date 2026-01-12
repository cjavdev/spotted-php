<?php

declare(strict_types=1);

namespace Spotted\AudioFeatures;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get audio features for multiple tracks based on their Spotify IDs.
 *
 * @deprecated
 * @see Spotted\Services\AudioFeaturesService::bulkRetrieve()
 *
 * @phpstan-type AudioFeatureBulkRetrieveParamsShape = array{ids: string}
 */
final class AudioFeatureBulkRetrieveParams implements BaseModel
{
    /** @use SdkModel<AudioFeatureBulkRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids)
     * for the tracks. Maximum: 100 IDs.
     */
    #[Required]
    public string $ids;

    /**
     * `new AudioFeatureBulkRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudioFeatureBulkRetrieveParams::with(ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AudioFeatureBulkRetrieveParams)->withIDs(...)
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
        $self = new self;

        $self['ids'] = $ids;

        return $self;
    }

    /**
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids)
     * for the tracks. Maximum: 100 IDs.
     */
    public function withIDs(string $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

        return $self;
    }
}
