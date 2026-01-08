<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\ArtistObject;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\TopContract;
use Spotted\TrackObject;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class TopService implements TopContract
{
    /**
     * @api
     */
    public TopRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TopRawService($client);
    }

    /**
     * @api
     *
     * Get the current user's top artists based on calculated affinity.
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     * @param string $timeRange Over what time frame the affinities are computed. Valid values: `long_term` (calculated from ~1 year of data and including all new data as it becomes available), `medium_term` (approximately last 6 months), `short_term` (approximately last 4 weeks). Default: `medium_term`
     * @param RequestOpts|null $requestOptions
     *
     * @return CursorURLPage<ArtistObject>
     *
     * @throws APIException
     */
    public function listTopArtists(
        int $limit = 20,
        int $offset = 0,
        string $timeRange = 'medium_term',
        RequestOptions|array|null $requestOptions = null,
    ): CursorURLPage {
        $params = Util::removeNulls(
            ['limit' => $limit, 'offset' => $offset, 'timeRange' => $timeRange]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTopArtists(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the current user's top tracks based on calculated affinity.
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     * @param string $timeRange Over what time frame the affinities are computed. Valid values: `long_term` (calculated from ~1 year of data and including all new data as it becomes available), `medium_term` (approximately last 6 months), `short_term` (approximately last 4 weeks). Default: `medium_term`
     * @param RequestOpts|null $requestOptions
     *
     * @return CursorURLPage<TrackObject>
     *
     * @throws APIException
     */
    public function listTopTracks(
        int $limit = 20,
        int $offset = 0,
        string $timeRange = 'medium_term',
        RequestOptions|array|null $requestOptions = null,
    ): CursorURLPage {
        $params = Util::removeNulls(
            ['limit' => $limit, 'offset' => $offset, 'timeRange' => $timeRange]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTopTracks(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
