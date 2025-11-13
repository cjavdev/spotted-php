<?php

declare(strict_types=1);

namespace Spotted\Playlists;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get a playlist owned by a Spotify user.
 *
 * @see Spotted\Services\PlaylistsService::retrieve()
 *
 * @phpstan-type PlaylistRetrieveParamsShape = array{
 *   additional_types?: string, fields?: string, market?: string
 * }
 */
final class PlaylistRetrieveParams implements BaseModel
{
    /** @use SdkModel<PlaylistRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A comma-separated list of item types that your client supports besides the default `track` type. Valid types are: `track` and `episode`.<br/>
     * _**Note**: This parameter was introduced to allow existing clients to maintain their current behaviour and might be deprecated in the future._<br/>
     * In addition to providing this parameter, make sure that your client properly handles cases of new types in the future by checking against the `type` field of each object.
     */
    #[Api(optional: true)]
    public ?string $additional_types;

    /**
     * Filters for the query: a comma-separated list of the
     * fields to return. If omitted, all fields are returned. For example, to get
     * just the playlist''s description and URI: `fields=description,uri`. A dot
     * separator can be used to specify non-reoccurring fields, while parentheses
     * can be used to specify reoccurring fields within objects. For example, to
     * get just the added date and user ID of the adder: `fields=tracks.items(added_at,added_by.id)`.
     * Use multiple parentheses to drill down into nested objects, for example: `fields=tracks.items(track(name,href,album(name,href)))`.
     * Fields can be excluded by prefixing them with an exclamation mark, for example:
     * `fields=tracks.items(track(name,href,album(!name,href)))`.
     */
    #[Api(optional: true)]
    public ?string $fields;

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
        ?string $additional_types = null,
        ?string $fields = null,
        ?string $market = null,
    ): self {
        $obj = new self;

        null !== $additional_types && $obj->additional_types = $additional_types;
        null !== $fields && $obj->fields = $fields;
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
        $obj->additional_types = $additionalTypes;

        return $obj;
    }

    /**
     * Filters for the query: a comma-separated list of the
     * fields to return. If omitted, all fields are returned. For example, to get
     * just the playlist''s description and URI: `fields=description,uri`. A dot
     * separator can be used to specify non-reoccurring fields, while parentheses
     * can be used to specify reoccurring fields within objects. For example, to
     * get just the added date and user ID of the adder: `fields=tracks.items(added_at,added_by.id)`.
     * Use multiple parentheses to drill down into nested objects, for example: `fields=tracks.items(track(name,href,album(name,href)))`.
     * Fields can be excluded by prefixing them with an exclamation mark, for example:
     * `fields=tracks.items(track(name,href,album(!name,href)))`.
     */
    public function withFields(string $fields): self
    {
        $obj = clone $this;
        $obj->fields = $fields;

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
