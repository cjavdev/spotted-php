<?php

declare(strict_types=1);

namespace Spotted\Artists;

use Spotted\ArtistObject;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ArtistObjectShape from \Spotted\ArtistObject
 *
 * @phpstan-type ArtistListRelatedArtistsResponseShape = array{
 *   artists: list<ArtistObject|ArtistObjectShape>
 * }
 */
final class ArtistListRelatedArtistsResponse implements BaseModel
{
    /** @use SdkModel<ArtistListRelatedArtistsResponseShape> */
    use SdkModel;

    /** @var list<ArtistObject> $artists */
    #[Required(list: ArtistObject::class)]
    public array $artists;

    /**
     * `new ArtistListRelatedArtistsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArtistListRelatedArtistsResponse::with(artists: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArtistListRelatedArtistsResponse)->withArtists(...)
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
     * @param list<ArtistObject|ArtistObjectShape> $artists
     */
    public static function with(array $artists): self
    {
        $self = new self;

        $self['artists'] = $artists;

        return $self;
    }

    /**
     * @param list<ArtistObject|ArtistObjectShape> $artists
     */
    public function withArtists(array $artists): self
    {
        $self = clone $this;
        $self['artists'] = $artists;

        return $self;
    }
}
