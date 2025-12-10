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

interface AudiobooksRawContract
{
    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the audiobook
     * @param array<mixed>|AudiobookRetrieveParams $params
     *
     * @return BaseResponse<AudiobookGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|AudiobookRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AudiobookBulkRetrieveParams $params
     *
     * @return BaseResponse<AudiobookBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AudiobookBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the audiobook
     * @param array<mixed>|AudiobookListChaptersParams $params
     *
     * @return BaseResponse<CursorURLPage<SimplifiedChapterObject>>
     *
     * @throws APIException
     */
    public function listChapters(
        string $id,
        array|AudiobookListChaptersParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
