<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\Search\SearchQueryParams;
use Spotted\Search\SearchQueryParams\IncludeExternal;
use Spotted\Search\SearchQueryParams\Type;
use Spotted\Search\SearchQueryResponse;
use Spotted\ServiceContracts\SearchContract;

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
     * @param array{
     *   q: string,
     *   type: list<'album'|'artist'|'playlist'|'track'|'show'|'episode'|'audiobook'|Type>,
     *   include_external?: 'audio'|IncludeExternal,
     *   limit?: int,
     *   market?: string,
     *   offset?: int,
     * }|SearchQueryParams $params
     *
     * @throws APIException
     */
    public function query(
        array|SearchQueryParams $params,
        ?RequestOptions $requestOptions = null
    ): SearchQueryResponse {
        [$parsed, $options] = SearchQueryParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SearchQueryResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'search',
            query: $parsed,
            options: $options,
            convert: SearchQueryResponse::class,
        );

        return $response->parse();
    }
}
