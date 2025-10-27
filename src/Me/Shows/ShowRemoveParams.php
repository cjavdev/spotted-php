<?php

declare(strict_types=1);

namespace Spotted\Me\Shows;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Delete one or more shows from current Spotify user's library.
 *
 * @see Spotted\Me\Shows->remove
 *
 * @phpstan-type show_remove_params = array{ids?: list<string>, market?: string}
 */
final class ShowRemoveParams implements BaseModel
{
    /** @use SdkModel<show_remove_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A JSON array of the [Spotify IDs](https://developer.spotify.com/documentation/web-api/#spotify-uris-and-ids).
     * A maximum of 50 items can be specified in one request. *Note: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored.*.
     *
     * @var list<string>|null $ids
     */
    #[Api(list: 'string', optional: true)]
    public ?array $ids;

    /**
     * An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     */
    #[Api(optional: true)]
    public ?string $market;

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
    public static function with(?array $ids = null, ?string $market = null): self
    {
        $obj = new self;

        null !== $ids && $obj->ids = $ids;
        null !== $market && $obj->market = $market;

        return $obj;
    }

    /**
     * A JSON array of the [Spotify IDs](https://developer.spotify.com/documentation/web-api/#spotify-uris-and-ids).
     * A maximum of 50 items can be specified in one request. *Note: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored.*.
     *
     * @param list<string> $ids
     */
    public function withIDs(array $ids): self
    {
        $obj = clone $this;
        $obj->ids = $ids;

        return $obj;
    }

    /**
     * An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     */
    public function withMarket(string $market): self
    {
        $obj = clone $this;
        $obj->market = $market;

        return $obj;
    }
}
