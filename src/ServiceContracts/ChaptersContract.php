<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Chapters\ChapterBulkGetResponse;
use Spotted\Chapters\ChapterBulkRetrieveParams;
use Spotted\Chapters\ChapterGetResponse;
use Spotted\Chapters\ChapterRetrieveParams;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

interface ChaptersContract
{
    /**
     * @api
     *
     * @param array<mixed>|ChapterRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|ChapterRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ChapterGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ChapterBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ChapterBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ChapterBulkGetResponse;
}
