<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\ArtistObject;
use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\CursorURLPage;
use Spotted\Me\Top\TopListTopArtistsParams;
use Spotted\Me\Top\TopListTopTracksParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\TopRawContract;
use Spotted\TrackObject;

final class TopRawService implements TopRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the current user's top artists based on calculated affinity.
     *
     * @param array{
     *   limit?: int, offset?: int, timeRange?: string
     * }|TopListTopArtistsParams $params
     *
     * @return BaseResponse<CursorURLPage<ArtistObject>>
     *
     * @throws APIException
     */
    public function listTopArtists(
        array|TopListTopArtistsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TopListTopArtistsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/top/artists',
            query: Util::array_transform_keys($parsed, ['timeRange' => 'time_range']),
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
     * @param array{
     *   limit?: int, offset?: int, timeRange?: string
     * }|TopListTopTracksParams $params
     *
     * @return BaseResponse<CursorURLPage<TrackObject>>
     *
     * @throws APIException
     */
    public function listTopTracks(
        array|TopListTopTracksParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = TopListTopTracksParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/top/tracks',
            query: Util::array_transform_keys($parsed, ['timeRange' => 'time_range']),
            options: $options,
            convert: TrackObject::class,
            page: CursorURLPage::class,
        );
    }
}
