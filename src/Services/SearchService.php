<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\Search\SearchGetResponse;
use Spotted\Search\SearchRetrieveParams;
use Spotted\Search\SearchRetrieveParams\IncludeExternal;
use Spotted\Search\SearchRetrieveParams\Type;
use Spotted\ServiceContracts\SearchContract;

use const Spotted\Core\OMIT as omit;

final class SearchService implements SearchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information about albums, artists, playlists, tracks, shows, episodes or audiobooks
     * that match a keyword string. Audiobooks are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
     *
     * @param string $q Your search query.
     *
     * You can narrow down your search using field filters. The available filters are `album`, `artist`, `track`, `year`, `upc`, `tag:hipster`, `tag:new`, `isrc`, and `genre`. Each field filter only applies to certain result types.
     *
     * The `artist` and `year` filters can be used while searching albums, artists and tracks. You can filter on a single `year` or a range (e.g. 1955-1960).<br />
     * The `album` filter can be used while searching albums and tracks.<br />
     * The `genre` filter can be used while searching artists and tracks.<br />
     * The `isrc` and `track` filters can be used while searching tracks.<br />
     * The `upc`, `tag:new` and `tag:hipster` filters can only be used while searching albums. The `tag:new` filter will return albums released in the past two weeks and `tag:hipster` can be used to return only albums with the lowest 10% popularity.<br />
     * @param list<Type|value-of<Type>> $type A comma-separated list of item types to search across. Search results include hits
     * from all the specified item types. For example: `q=abacab&type=album,track` returns
     * both albums and tracks matching "abacab".
     * @param IncludeExternal|value-of<IncludeExternal> $includeExternal If `include_external=audio` is specified it signals that the client can play externally hosted audio content, and marks
     * the content as playable in the response. By default externally hosted audio content is marked as unplayable in the response.
     * @param int $limit the maximum number of results to return in each item type
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     * @param int $offset The index of the first result to return. Use
     * with limit to get the next page of search results.
     *
     * @throws APIException
     */
    public function retrieve(
        $q,
        $type,
        $includeExternal = omit,
        $limit = omit,
        $market = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): SearchGetResponse {
        $params = [
            'q' => $q,
            'type' => $type,
            'includeExternal' => $includeExternal,
            'limit' => $limit,
            'market' => $market,
            'offset' => $offset,
        ];

        return $this->retrieveRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SearchGetResponse {
        [$parsed, $options] = SearchRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'search',
            query: $parsed,
            options: $options,
            convert: SearchGetResponse::class,
        );
    }
}
