<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\EpisodeObject;
use Spotted\Episodes\EpisodeBulkGetResponse;
use Spotted\Episodes\EpisodeBulkRetrieveParams;
use Spotted\Episodes\EpisodeRetrieveParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\EpisodesContract;

final class EpisodesService implements EpisodesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single episode identified by its
     * unique Spotify ID.
     *
     * @param array{market?: string}|EpisodeRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|EpisodeRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): EpisodeObject {
        [$parsed, $options] = EpisodeRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['episodes/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: EpisodeObject::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information for several episodes based on their Spotify IDs.
     *
     * @param array{ids: string, market?: string}|EpisodeBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|EpisodeBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): EpisodeBulkGetResponse {
        [$parsed, $options] = EpisodeBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'episodes',
            query: $parsed,
            options: $options,
            convert: EpisodeBulkGetResponse::class,
        );
    }
}
