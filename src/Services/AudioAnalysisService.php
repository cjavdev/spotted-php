<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\AudioAnalysis\AudioAnalysisGetResponse;
use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\AudioAnalysisContract;

final class AudioAnalysisService implements AudioAnalysisContract
{
    /**
     * @api
     */
    public AudioAnalysisRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AudioAnalysisRawService($client);
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get a low-level audio analysis for a track in the Spotify catalog. The audio analysis describes the track’s structure and musical content, including rhythm, pitch, and timbre.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the track
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AudioAnalysisGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
