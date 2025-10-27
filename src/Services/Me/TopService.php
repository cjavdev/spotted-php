<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\ArtistObject;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Top\TopListTopArtistsParams;
use Spotted\Me\Top\TopListTopTracksParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\TopContract;
use Spotted\TrackObject;

use const Spotted\Core\OMIT as omit;

final class TopService implements TopContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the current user's top artists based on calculated affinity.
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
        $limit = omit,
        $offset = omit,
        $timeRange = omit,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        $params = [
            'limit' => $limit, 'offset' => $offset, 'timeRange' => $timeRange,
        ];

        return $this->listTopArtistsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CursorURLPage<ArtistObject>
     *
     * @throws APIException
     */
    public function listTopArtistsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = TopListTopArtistsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/top/artists',
            query: $parsed,
            options: $options,
            convert: ArtistObject::class,
            page: CursorURLPage::class,
        );
    }

    /**
     * @api
     *
     * Get the current user's top tracks based on calculated affinity.
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
        $limit = omit,
        $offset = omit,
        $timeRange = omit,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        $params = [
            'limit' => $limit, 'offset' => $offset, 'timeRange' => $timeRange,
        ];

        return $this->listTopTracksRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CursorURLPage<TrackObject>
     *
     * @throws APIException
     */
    public function listTopTracksRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = TopListTopTracksParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/top/tracks',
            query: $parsed,
            options: $options,
            convert: TrackObject::class,
            page: CursorURLPage::class,
        );
    }
}
