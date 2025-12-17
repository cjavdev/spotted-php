<?php

declare(strict_types=1);

namespace Spotted\Search;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Search\SearchQueryParams\IncludeExternal;
use Spotted\Search\SearchQueryParams\Type;

/**
 * Get Spotify catalog information about albums, artists, playlists, tracks, shows, episodes or audiobooks
 * that match a keyword string. Audiobooks are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
 *
 * @see Spotted\Services\SearchService::query()
 *
 * @phpstan-type SearchQueryParamsShape = array{
 *   q: string,
 *   type: list<Type|value-of<Type>>,
 *   includeExternal?: null|IncludeExternal|value-of<IncludeExternal>,
 *   limit?: int|null,
 *   market?: string|null,
 *   offset?: int|null,
 * }
 */
final class SearchQueryParams implements BaseModel
{
    /** @use SdkModel<SearchQueryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Your search query.
     *
     * You can narrow down your search using field filters. The available filters are `album`, `artist`, `track`, `year`, `upc`, `tag:hipster`, `tag:new`, `isrc`, and `genre`. Each field filter only applies to certain result types.
     *
     * The `artist` and `year` filters can be used while searching albums, artists and tracks. You can filter on a single `year` or a range (e.g. 1955-1960).<br />
     * The `album` filter can be used while searching albums and tracks.<br />
     * The `genre` filter can be used while searching artists and tracks.<br />
     * The `isrc` and `track` filters can be used while searching tracks.<br />
     * The `upc`, `tag:new` and `tag:hipster` filters can only be used while searching albums. The `tag:new` filter will return albums released in the past two weeks and `tag:hipster` can be used to return only albums with the lowest 10% popularity.<br />
     */
    #[Required]
    public string $q;

    /**
     * A comma-separated list of item types to search across. Search results include hits
     * from all the specified item types. For example: `q=abacab&type=album,track` returns
     * both albums and tracks matching "abacab".
     *
     * @var list<value-of<Type>> $type
     */
    #[Required(list: Type::class)]
    public array $type;

    /**
     * If `include_external=audio` is specified it signals that the client can play externally hosted audio content, and marks
     * the content as playable in the response. By default externally hosted audio content is marked as unplayable in the response.
     *
     * @var value-of<IncludeExternal>|null $includeExternal
     */
    #[Optional(enum: IncludeExternal::class)]
    public ?string $includeExternal;

    /**
     * The maximum number of results to return in each item type.
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
     * The index of the first result to return. Use
     * with limit to get the next page of search results.
     */
    #[Optional]
    public ?int $offset;

    /**
     * `new SearchQueryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SearchQueryParams::with(q: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SearchQueryParams)->withQ(...)->withType(...)
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
     * @param list<Type|value-of<Type>> $type
     * @param IncludeExternal|value-of<IncludeExternal> $includeExternal
     */
    public static function with(
        string $q,
        array $type,
        IncludeExternal|string|null $includeExternal = null,
        ?int $limit = null,
        ?string $market = null,
        ?int $offset = null,
    ): self {
        $self = new self;

        $self['q'] = $q;
        $self['type'] = $type;

        null !== $includeExternal && $self['includeExternal'] = $includeExternal;
        null !== $limit && $self['limit'] = $limit;
        null !== $market && $self['market'] = $market;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * Your search query.
     *
     * You can narrow down your search using field filters. The available filters are `album`, `artist`, `track`, `year`, `upc`, `tag:hipster`, `tag:new`, `isrc`, and `genre`. Each field filter only applies to certain result types.
     *
     * The `artist` and `year` filters can be used while searching albums, artists and tracks. You can filter on a single `year` or a range (e.g. 1955-1960).<br />
     * The `album` filter can be used while searching albums and tracks.<br />
     * The `genre` filter can be used while searching artists and tracks.<br />
     * The `isrc` and `track` filters can be used while searching tracks.<br />
     * The `upc`, `tag:new` and `tag:hipster` filters can only be used while searching albums. The `tag:new` filter will return albums released in the past two weeks and `tag:hipster` can be used to return only albums with the lowest 10% popularity.<br />
     */
    public function withQ(string $q): self
    {
        $self = clone $this;
        $self['q'] = $q;

        return $self;
    }

    /**
     * A comma-separated list of item types to search across. Search results include hits
     * from all the specified item types. For example: `q=abacab&type=album,track` returns
     * both albums and tracks matching "abacab".
     *
     * @param list<Type|value-of<Type>> $type
     */
    public function withType(array $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * If `include_external=audio` is specified it signals that the client can play externally hosted audio content, and marks
     * the content as playable in the response. By default externally hosted audio content is marked as unplayable in the response.
     *
     * @param IncludeExternal|value-of<IncludeExternal> $includeExternal
     */
    public function withIncludeExternal(
        IncludeExternal|string $includeExternal
    ): self {
        $self = clone $this;
        $self['includeExternal'] = $includeExternal;

        return $self;
    }

    /**
     * The maximum number of results to return in each item type.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
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
        $self = clone $this;
        $self['market'] = $market;

        return $self;
    }

    /**
     * The index of the first result to return. Use
     * with limit to get the next page of search results.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
