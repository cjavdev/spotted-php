<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Audiobooks\AudiobookListResponse;
use Spotted\RequestOptions;

interface AudiobooksContract
{
    /**
     * @api
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @return CursorURLPage<AudiobookListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $limit = 20,
        int $offset = 0,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage;

    /**
     * @api
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=18yVqkdbdRvS24c0Ilj2ci,1HGw3J3NxZO1TP1BTtVhpZ`. Maximum: 50 IDs.
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        string $ids,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=18yVqkdbdRvS24c0Ilj2ci,1HGw3J3NxZO1TP1BTtVhpZ`. Maximum: 50 IDs.
     *
     * @throws APIException
     */
    public function remove(
        string $ids,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=18yVqkdbdRvS24c0Ilj2ci,1HGw3J3NxZO1TP1BTtVhpZ`. Maximum: 50 IDs.
     *
     * @throws APIException
     */
    public function save(
        string $ids,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
