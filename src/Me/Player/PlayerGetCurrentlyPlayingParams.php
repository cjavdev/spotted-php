<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get the object currently being played on the user's Spotify account.
 *
 * @see Spotted\Me\Player->getCurrentlyPlaying
 *
 * @phpstan-type player_get_currently_playing_params = array{
 *   additionalTypes?: string, market?: string
 * }
 */
final class PlayerGetCurrentlyPlayingParams implements BaseModel
{
    /** @use SdkModel<player_get_currently_playing_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A comma-separated list of item types that your client supports besides the default `track` type. Valid types are: `track` and `episode`.<br/>
     * _**Note**: This parameter was introduced to allow existing clients to maintain their current behaviour and might be deprecated in the future._<br/>
     * In addition to providing this parameter, make sure that your client properly handles cases of new types in the future by checking against the `type` field of each object.
     */
    #[Api(optional: true)]
    public ?string $additionalTypes;

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
     */
    public static function with(
        ?string $additionalTypes = null,
        ?string $market = null
    ): self {
        $obj = new self;

        null !== $additionalTypes && $obj->additionalTypes = $additionalTypes;
        null !== $market && $obj->market = $market;

        return $obj;
    }

    /**
     * A comma-separated list of item types that your client supports besides the default `track` type. Valid types are: `track` and `episode`.<br/>
     * _**Note**: This parameter was introduced to allow existing clients to maintain their current behaviour and might be deprecated in the future._<br/>
     * In addition to providing this parameter, make sure that your client properly handles cases of new types in the future by checking against the `type` field of each object.
     */
    public function withAdditionalTypes(string $additionalTypes): self
    {
        $obj = clone $this;
        $obj->additionalTypes = $additionalTypes;

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
