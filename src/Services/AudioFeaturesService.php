<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\AudioFeatures\AudioFeatureBulkGetResponse;
use Spotted\AudioFeatures\AudioFeatureBulkRetrieveParams;
use Spotted\AudioFeatures\AudioFeatureGetResponse;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\AudioFeaturesContract;

final class AudioFeaturesService implements AudioFeaturesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @deprecated
     *
     * @api
     *
     * Get audio feature information for a single track identified by its unique
     * Spotify ID.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AudioFeatureGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['audio-features/%1$s', $id],
            options: $requestOptions,
            convert: AudioFeatureGetResponse::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get audio features for multiple tracks based on their Spotify IDs.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids)
     * for the tracks. Maximum: 100 IDs.
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        $ids,
        ?RequestOptions $requestOptions = null
    ): AudioFeatureBulkGetResponse {
        $params = ['ids' => $ids];

        return $this->bulkRetrieveRaw($params, $requestOptions);
    }

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function bulkRetrieveRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AudioFeatureBulkGetResponse {
        [$parsed, $options] = AudioFeatureBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'audio-features',
            query: $parsed,
            options: $options,
            convert: AudioFeatureBulkGetResponse::class,
        );
    }
}
