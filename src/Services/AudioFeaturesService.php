<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\AudioFeatures\AudioFeatureBulkGetResponse;
use Spotted\AudioFeatures\AudioFeatureGetResponse;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\AudioFeaturesContract;

final class AudioFeaturesService implements AudioFeaturesContract
{
    /**
     * @api
     */
    public AudioFeaturesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AudioFeaturesRawService($client);
    }

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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AudioFeatureGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
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
        string $ids,
        ?RequestOptions $requestOptions = null
    ): AudioFeatureBulkGetResponse {
        $params = ['ids' => $ids];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->bulkRetrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
