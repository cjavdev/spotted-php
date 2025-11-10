<?php

declare(strict_types=1);

namespace Spotted\Artists;

use Spotted\ArtistObject;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ArtistBulkGetResponseShape = array{artists: list<ArtistObject>}
 */
final class ArtistBulkGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ArtistBulkGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<ArtistObject> $artists */
    #[Api(list: ArtistObject::class)]
    public array $artists;

    /**
     * `new ArtistBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArtistBulkGetResponse::with(artists: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArtistBulkGetResponse)->withArtists(...)
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
     * @param list<ArtistObject> $artists
     */
    public static function with(array $artists): self
    {
        $obj = new self;

        $obj->artists = $artists;

        return $obj;
    }

    /**
     * @param list<ArtistObject> $artists
     */
    public function withArtists(array $artists): self
    {
        $obj = clone $this;
        $obj->artists = $artists;

        return $obj;
    }
}
