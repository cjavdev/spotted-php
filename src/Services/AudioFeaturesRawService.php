<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\AudioFeatures\AudioFeatureBulkGetResponse;
use Spotted\AudioFeatures\AudioFeatureBulkRetrieveParams;
use Spotted\AudioFeatures\AudioFeatureGetResponse;
use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\AudioFeaturesRawContract;

final class AudioFeaturesRawService implements AudioFeaturesRawContract
{
    // @phpstan-ignore-next-line
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
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track
     *
     * @return BaseResponse<AudioFeatureGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{ids: string}|AudioFeatureBulkRetrieveParams $params
     *
     * @return BaseResponse<AudioFeatureBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|AudioFeatureBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AudioFeatureBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'audio-features',
            query: $parsed,
            options: $options,
            convert: AudioFeatureBulkGetResponse::class,
        );
    }
}
