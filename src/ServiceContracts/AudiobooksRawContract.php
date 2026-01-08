<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Audiobooks\AudiobookBulkGetResponse;
use Spotted\Audiobooks\AudiobookBulkRetrieveParams;
use Spotted\Audiobooks\AudiobookGetResponse;
use Spotted\Audiobooks\AudiobookListChaptersParams;
use Spotted\Audiobooks\AudiobookRetrieveParams;
use Spotted\Audiobooks\SimplifiedChapterObject;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface AudiobooksRawContract
{
    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the audiobook
     * @param array<string,mixed>|AudiobookRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AudiobookBulkRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AudiobookBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AudiobookBulkRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the audiobook
     * @param array<string,mixed>|AudiobookListChaptersParams $params
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
    ): BaseResponse;
}
