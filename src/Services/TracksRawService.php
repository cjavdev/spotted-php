<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\TracksRawContract;
use Spotted\TrackObject;
use Spotted\Tracks\TrackBulkGetResponse;
use Spotted\Tracks\TrackBulkRetrieveParams;
use Spotted\Tracks\TrackRetrieveParams;

final class TracksRawService implements TracksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single track identified by its
     * unique Spotify ID.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the track
     * @param array{market?: string}|TrackRetrieveParams $params
     *
     * @return BaseResponse<TrackObject>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|TrackRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['tracks/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: TrackObject::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information for multiple tracks based on their Spotify IDs.
     *
     * @param array{ids: string, market?: string}|TrackBulkRetrieveParams $params
     *
     * @return BaseResponse<TrackBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|TrackBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'tracks',
            query: $parsed,
            options: $options,
            convert: TrackBulkGetResponse::class,
        );
    }
}
