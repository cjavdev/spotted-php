<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\TracksContract;
use Spotted\TrackObject;
use Spotted\Tracks\TrackBulkGetResponse;
use Spotted\Tracks\TrackBulkRetrieveParams;
use Spotted\Tracks\TrackRetrieveParams;

final class TracksService implements TracksContract
{
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
     * @param array{market?: string}|TrackRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|TrackRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): TrackObject {
        [$parsed, $options] = TrackRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<TrackObject> */
        $response = $this->client->request(
            method: 'get',
            path: ['tracks/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: TrackObject::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Spotify catalog information for multiple tracks based on their Spotify IDs.
     *
     * @param array{ids: string, market?: string}|TrackBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|TrackBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): TrackBulkGetResponse {
        [$parsed, $options] = TrackBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<TrackBulkGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'tracks',
            query: $parsed,
            options: $options,
            convert: TrackBulkGetResponse::class,
        );

        return $response->parse();
    }
}
