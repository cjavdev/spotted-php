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
     * @param array{
     *   limit?: int, offset?: int, time_range?: string
     * }|TopListTopArtistsParams $params
     *
     * @return CursorURLPage<ArtistObject>
     *
     * @throws APIException
     */
    public function listTopArtists(
        array|TopListTopArtistsParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        [$parsed, $options] = TopListTopArtistsParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   limit?: int, offset?: int, time_range?: string
     * }|TopListTopTracksParams $params
     *
     * @return CursorURLPage<TrackObject>
     *
     * @throws APIException
     */
    public function listTopTracks(
        array|TopListTopTracksParams $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = TopListTopTracksParams::parseRequest(
            $params,
            $requestOptions,
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
