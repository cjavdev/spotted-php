<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\RequestOptions;
use Spotted\Search\SearchQueryParams;
use Spotted\Search\SearchQueryParams\IncludeExternal;
use Spotted\Search\SearchQueryParams\Type;
use Spotted\Search\SearchQueryResponse;
use Spotted\ServiceContracts\SearchRawContract;

final class SearchRawService implements SearchRawContract
{
    // @phpstan-ignore-next-line
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
     *   includeExternal?: 'audio'|IncludeExternal,
     *   limit?: int,
     *   market?: string,
     *   offset?: int,
     * }|SearchQueryParams $params
     *
     * @return BaseResponse<SearchQueryResponse>
     *
     * @throws APIException
     */
    public function query(
        array|SearchQueryParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = SearchQueryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'search',
            query: Util::array_transform_keys(
                $parsed,
                ['includeExternal' => 'include_external']
            ),
            options: $options,
            convert: SearchQueryResponse::class,
        );
    }
}
