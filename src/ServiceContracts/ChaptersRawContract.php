<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Chapters\ChapterBulkGetResponse;
use Spotted\Chapters\ChapterBulkRetrieveParams;
use Spotted\Chapters\ChapterGetResponse;
use Spotted\Chapters\ChapterRetrieveParams;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

interface ChaptersRawContract
{
    /**
     * @api
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the chapter
     * @param array<string,mixed>|ChapterRetrieveParams $params
     *
     * @return BaseResponse<ChapterGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|ChapterRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ChapterBulkRetrieveParams $params
     *
     * @return BaseResponse<ChapterBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ChapterBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
