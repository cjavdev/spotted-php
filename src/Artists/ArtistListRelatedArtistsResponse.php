<?php

declare(strict_types=1);

namespace Spotted\Artists;

use Spotted\ArtistObject;
use Spotted\ArtistObject\Type;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\FollowersObject;
use Spotted\ImageObject;

/**
 * @phpstan-type ArtistListRelatedArtistsResponseShape = array{
 *   artists: list<ArtistObject>
 * }
 */
final class ArtistListRelatedArtistsResponse implements BaseModel
{
    /** @use SdkModel<ArtistListRelatedArtistsResponseShape> */
    use SdkModel;

    /** @var list<ArtistObject> $artists */
    #[Api(list: ArtistObject::class)]
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
     * @param list<ArtistObject|array{
     *   id?: string|null,
     *   external_urls?: ExternalURLObject|null,
     *   followers?: FollowersObject|null,
     *   genres?: list<string>|null,
     *   href?: string|null,
     *   images?: list<ImageObject>|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }> $artists
     */
    public static function with(array $artists): self
    {
        $obj = new self;

        $obj['artists'] = $artists;

        return $obj;
    }

    /**
     * @param list<ArtistObject|array{
     *   id?: string|null,
     *   external_urls?: ExternalURLObject|null,
     *   followers?: FollowersObject|null,
     *   genres?: list<string>|null,
     *   href?: string|null,
     *   images?: list<ImageObject>|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }> $artists
     */
    public function withArtists(array $artists): self
    {
        $obj = clone $this;
        $obj['artists'] = $artists;

        return $obj;
    }
}
