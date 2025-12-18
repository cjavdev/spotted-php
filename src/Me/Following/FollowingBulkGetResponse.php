<?php

declare(strict_types=1);

namespace Spotted\Me\Following;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Me\Following\FollowingBulkGetResponse\Artists;

/**
 * @phpstan-import-type ArtistsShape from \Spotted\Me\Following\FollowingBulkGetResponse\Artists
 *
 * @phpstan-type FollowingBulkGetResponseShape = array{
 *   artists: Artists|ArtistsShape
 * }
 */
final class FollowingBulkGetResponse implements BaseModel
{
    /** @use SdkModel<FollowingBulkGetResponseShape> */
    use SdkModel;

    #[Required]
    public Artists $artists;

    /**
     * `new FollowingBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FollowingBulkGetResponse::with(artists: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FollowingBulkGetResponse)->withArtists(...)
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
     *
     * @param Artists|ArtistsShape $artists
     */
    public static function with(Artists|array $artists): self
    {
        $self = new self;

        $self['artists'] = $artists;

        return $self;
    }

    /**
     * @param Artists|ArtistsShape $artists
     */
    public function withArtists(Artists|array $artists): self
    {
        $self = clone $this;
        $self['artists'] = $artists;

        return $self;
    }
}
