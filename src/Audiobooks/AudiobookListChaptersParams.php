<?php

declare(strict_types=1);

namespace Spotted\Audiobooks;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Get Spotify catalog information about an audiobook's chapters. Audiobooks are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
 *
 * @see Spotted\Services\AudiobooksService::listChapters()
 *
 * @phpstan-type AudiobookListChaptersParamsShape = array{
 *   limit?: int, market?: string, offset?: int
 * }
 */
final class AudiobookListChaptersParams implements BaseModel
{
    /** @use SdkModel<AudiobookListChaptersParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     */
    #[Optional]
    public ?int $limit;

    /**
     * An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     */
    #[Optional]
    public ?string $market;

    /**
     * The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     */
    #[Optional]
    public ?int $offset;

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
        ?int $limit = null,
        ?string $market = null,
        ?int $offset = null
    ): self {
        $obj = new self;

        null !== $limit && $obj['limit'] = $limit;
        null !== $market && $obj['market'] = $market;
        null !== $offset && $obj['offset'] = $offset;

        return $obj;
    }

    /**
     * The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

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
        $obj['market'] = $market;

        return $obj;
    }

    /**
     * The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj['offset'] = $offset;

        return $obj;
    }
}
