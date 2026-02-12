<?php

declare(strict_types=1);

namespace Spotted\Me\Audiobooks;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Remove one or more audiobooks from the Spotify user's library.
 *
 * **Note:** This endpoint is deprecated. Use [Remove Items from Library](/documentation/web-api/reference/remove-library-items) instead.
 *
 * @deprecated
 * @see Spotted\Services\Me\AudiobooksService::remove()
 *
 * @phpstan-type AudiobookRemoveParamsShape = array{ids: string}
 */
final class AudiobookRemoveParams implements BaseModel
{
    /** @use SdkModel<AudiobookRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=18yVqkdbdRvS24c0Ilj2ci,1HGw3J3NxZO1TP1BTtVhpZ`. Maximum: 50 IDs.
     */
    #[Required]
    public string $ids;

    /**
     * `new AudiobookRemoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudiobookRemoveParams::with(ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AudiobookRemoveParams)->withIDs(...)
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
     * A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=18yVqkdbdRvS24c0Ilj2ci,1HGw3J3NxZO1TP1BTtVhpZ`. Maximum: 50 IDs.
     */
    public function withIDs(string $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

        return $self;
    }
}
