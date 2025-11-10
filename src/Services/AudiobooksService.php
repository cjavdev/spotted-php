<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Audiobooks\AudiobookBulkGetResponse;
use Spotted\Audiobooks\AudiobookBulkRetrieveParams;
use Spotted\Audiobooks\AudiobookGetResponse;
use Spotted\Audiobooks\AudiobookListChaptersParams;
use Spotted\Audiobooks\AudiobookRetrieveParams;
use Spotted\Audiobooks\SimplifiedChapterObject;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\AudiobooksContract;

use const Spotted\Core\OMIT as omit;

final class AudiobooksService implements AudiobooksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single audiobook. Audiobooks are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
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
    ): AudiobookGetResponse {
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
    ): AudiobookGetResponse {
        [$parsed, $options] = AudiobookRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['audiobooks/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: AudiobookGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information for several audiobooks identified by their Spotify IDs. Audiobooks are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=18yVqkdbdRvS24c0Ilj2ci,1HGw3J3NxZO1TP1BTtVhpZ`. Maximum: 50 IDs.
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
    ): AudiobookBulkGetResponse {
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
    ): AudiobookBulkGetResponse {
        [$parsed, $options] = AudiobookBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'audiobooks',
            query: $parsed,
            options: $options,
            convert: AudiobookBulkGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information about an audiobook's chapters. Audiobooks are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param string $market An [ISO 3166-1 alpha-2 country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2).
     *   If a country code is specified, only content that is available in that market will be returned.<br/>
     *   If a valid user access token is specified in the request header, the country associated with
     *   the user account will take priority over this parameter.<br/>
     *   _**Note**: If neither market or user country are provided, the content is considered unavailable for the client._<br/>
     *   Users can view the country that is associated with their account in the [account settings](https://www.spotify.com/account/overview/).
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @return CursorURLPage<SimplifiedChapterObject>
     *
     * @throws APIException
     */
    public function listChapters(
        string $id,
        $limit = omit,
        $market = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        $params = ['limit' => $limit, 'market' => $market, 'offset' => $offset];

        return $this->listChaptersRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CursorURLPage<SimplifiedChapterObject>
     *
     * @throws APIException
     */
    public function listChaptersRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = AudiobookListChaptersParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['audiobooks/%1$s/chapters', $id],
            query: $parsed,
            options: $options,
            convert: SimplifiedChapterObject::class,
            page: CursorURLPage::class,
        );
    }
}
