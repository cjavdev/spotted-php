<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Audiobooks\AudiobookBulkGetResponse;
use Spotted\Audiobooks\AudiobookBulkRetrieveParams;
use Spotted\Audiobooks\AudiobookGetResponse;
use Spotted\Audiobooks\AudiobookListChaptersParams;
use Spotted\Audiobooks\AudiobookRetrieveParams;
use Spotted\Audiobooks\SimplifiedChapterObject;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;

interface AudiobooksContract
{
    /**
     * @api
     *
     * @param array<mixed>|AudiobookRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|AudiobookRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): AudiobookGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|AudiobookBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AudiobookBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): AudiobookBulkGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|AudiobookListChaptersParams $params
     *
     * @return CursorURLPage<SimplifiedChapterObject>
     *
     * @throws APIException
     */
    public function listChapters(
        string $id,
        array|AudiobookListChaptersParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;
}
