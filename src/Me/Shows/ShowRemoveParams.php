<?php

declare(strict_types=1);

namespace Spotted\Me\Shows;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Delete one or more shows from current Spotify user's library.
 *
 * @see Spotted\Services\Me\ShowsService::remove()
 *
 * @phpstan-type ShowRemoveParamsShape = array{ids?: list<string>}
 */
final class ShowRemoveParams implements BaseModel
{
    /** @use SdkModel<ShowRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A JSON array of the [Spotify IDs](https://developer.spotify.com/documentation/web-api/#spotify-uris-and-ids).
     * A maximum of 50 items can be specified in one request. *Note: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored.*.
     *
     * @var list<string>|null $ids
     */
    #[Optional(list: 'string')]
    public ?array $ids;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $ids
     */
    public static function with(?array $ids = null): self
    {
        $self = new self;

        null !== $ids && $self['ids'] = $ids;

        return $self;
    }

    /**
     * A JSON array of the [Spotify IDs](https://developer.spotify.com/documentation/web-api/#spotify-uris-and-ids).
     * A maximum of 50 items can be specified in one request. *Note: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored.*.
     *
     * @param list<string> $ids
     */
    public function withIDs(array $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

        return $self;
    }
}
