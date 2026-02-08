<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Chapters\ChapterBulkGetResponse;
use Spotted\Chapters\ChapterBulkRetrieveParams;
use Spotted\Chapters\ChapterGetResponse;
use Spotted\Chapters\ChapterRetrieveParams;
use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\ChaptersRawContract;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class ChaptersRawService implements ChaptersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single audiobook chapter. Chapters are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the chapter
     * @param array{market?: string}|ChapterRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChapterGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|ChapterRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChapterRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['chapters/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: ChapterGetResponse::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get Spotify catalog information for several audiobook chapters identified by their Spotify IDs. Chapters are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
     *
     * @param array{ids: string, market?: string}|ChapterBulkRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChapterBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ChapterBulkRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChapterBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'chapters',
            query: $parsed,
            options: $options,
            convert: ChapterBulkGetResponse::class,
        );
    }
}
