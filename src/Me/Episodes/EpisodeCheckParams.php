<?php

declare(strict_types=1);

namespace Spotted\Me\Episodes;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Check if one or more episodes is already saved in the current Spotify user's 'Your Episodes' library.
 *
 * **Note:** This endpoint is deprecated. Use [Check User's Saved Items](/documentation/web-api/reference/check-library-contains) instead.
 *
 * @deprecated
 * @see Spotted\Services\Me\EpisodesService::check()
 *
 * @phpstan-type EpisodeCheckParamsShape = array{ids: string}
 */
final class EpisodeCheckParams implements BaseModel
{
    /** @use SdkModel<EpisodeCheckParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the episodes. Maximum: 50 IDs.
     */
    #[Required]
    public string $ids;

    /**
     * `new EpisodeCheckParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EpisodeCheckParams::with(ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EpisodeCheckParams)->withIDs(...)
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
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) for the episodes. Maximum: 50 IDs.
     */
    public function withIDs(string $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

        return $self;
    }
}
