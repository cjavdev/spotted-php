<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\ArtistObject;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\TrackObject;

interface TopContract
{
    /**
     * @api
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     * @param string $timeRange Over what time frame the affinities are computed. Valid values: `long_term` (calculated from ~1 year of data and including all new data as it becomes available), `medium_term` (approximately last 6 months), `short_term` (approximately last 4 weeks). Default: `medium_term`
     *
     * @return CursorURLPage<ArtistObject>
     *
     * @throws APIException
     */
    public function listTopArtists(
        int $limit = 20,
        int $offset = 0,
        string $timeRange = 'medium_term',
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;

    /**
     * @api
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     * @param string $timeRange Over what time frame the affinities are computed. Valid values: `long_term` (calculated from ~1 year of data and including all new data as it becomes available), `medium_term` (approximately last 6 months), `short_term` (approximately last 4 weeks). Default: `medium_term`
     *
     * @return CursorURLPage<TrackObject>
     *
     * @throws APIException
     */
    public function listTopTracks(
        int $limit = 20,
        int $offset = 0,
        string $timeRange = 'medium_term',
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;
}
