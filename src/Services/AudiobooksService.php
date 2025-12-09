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
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\AudiobooksContract;

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
     * @param array{market?: string}|AudiobookRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|AudiobookRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): AudiobookGetResponse {
        [$parsed, $options] = AudiobookRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AudiobookGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['audiobooks/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: AudiobookGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Spotify catalog information for several audiobooks identified by their Spotify IDs. Audiobooks are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
     *
     * @param array{ids: string, market?: string}|AudiobookBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AudiobookBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): AudiobookBulkGetResponse {
        [$parsed, $options] = AudiobookBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AudiobookBulkGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'audiobooks',
            query: $parsed,
            options: $options,
            convert: AudiobookBulkGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Spotify catalog information about an audiobook's chapters. Audiobooks are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
     *
     * @param array{
     *   limit?: int, market?: string, offset?: int
     * }|AudiobookListChaptersParams $params
     *
     * @return CursorURLPage<SimplifiedChapterObject>
     *
     * @throws APIException
     */
    public function listChapters(
        string $id,
        array|AudiobookListChaptersParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        [$parsed, $options] = AudiobookListChaptersParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CursorURLPage<SimplifiedChapterObject>> */
        $response = $this->client->request(
            method: 'get',
            path: ['audiobooks/%1$s/chapters', $id],
            query: $parsed,
            options: $options,
            convert: SimplifiedChapterObject::class,
            page: CursorURLPage::class,
        );

        return $response->parse();
    }
}
