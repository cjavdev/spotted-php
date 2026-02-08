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
use Spotted\ServiceContracts\AudiobooksRawContract;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class AudiobooksRawService implements AudiobooksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single audiobook. Audiobooks are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the audiobook
     * @param array{market?: string}|AudiobookRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AudiobookGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|AudiobookRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AudiobookRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['audiobooks/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: AudiobookGetResponse::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get Spotify catalog information for several audiobooks identified by their Spotify IDs. Audiobooks are only available within the US, UK, Canada, Ireland, New Zealand and Australia markets.
     *
     * @param array{ids: string, market?: string}|AudiobookBulkRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AudiobookBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AudiobookBulkRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AudiobookBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the audiobook
     * @param array{
     *   limit?: int, market?: string, offset?: int
     * }|AudiobookListChaptersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<SimplifiedChapterObject>>
     *
     * @throws APIException
     */
    public function listChapters(
        string $id,
        array|AudiobookListChaptersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AudiobookListChaptersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
