<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Chapters\ChapterBulkGetResponse;
use Spotted\Chapters\ChapterBulkRetrieveParams;
use Spotted\Chapters\ChapterGetResponse;
use Spotted\Chapters\ChapterRetrieveParams;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\ChaptersContract;

use const Spotted\Core\OMIT as omit;

final class ChaptersService implements ChaptersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single audiobook chapter. Chapters are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
     *
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        $market = omit,
        ?RequestOptions $requestOptions = null
    ): ChapterGetResponse {
        $params = ['market' => $market];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ChapterGetResponse {
        [$parsed, $options] = ChapterRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['chapters/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: ChapterGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information for several audiobook chapters identified by their Spotify IDs. Chapters are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=0IsXVP0JmcB2adSE338GkK,3ZXb8FKZGU0EHALYX6uCzU`. Maximum: 50 IDs.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        $ids,
        $market = omit,
        ?RequestOptions $requestOptions = null
    ): ChapterBulkGetResponse {
        $params = ['ids' => $ids, 'market' => $market];

        return $this->bulkRetrieveRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function bulkRetrieveRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ChapterBulkGetResponse {
        [$parsed, $options] = ChapterBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'chapters',
            query: $parsed,
            options: $options,
            convert: ChapterBulkGetResponse::class,
        );
    }
}
