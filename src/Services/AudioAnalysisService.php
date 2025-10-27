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
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @deprecated
     *
     * @api
     *
     * Get a low-level audio analysis for a track in the Spotify catalog. The audio analysis describes the track’s structure and musical content, including rhythm, pitch, and timbre.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AudioAnalysisGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['audio-analysis/%1$s', $id],
            options: $requestOptions,
            convert: AudioAnalysisGetResponse::class,
        );
    }
}
