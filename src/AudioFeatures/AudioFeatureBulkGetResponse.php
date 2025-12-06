<?php

declare(strict_types=1);

namespace Spotted\AudioFeatures;

use Spotted\AudioFeatures\AudioFeatureBulkGetResponse\AudioFeature;
use Spotted\AudioFeatures\AudioFeatureBulkGetResponse\AudioFeature\Type;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AudioFeatureBulkGetResponseShape = array{
 *   audio_features: list<AudioFeature>
 * }
 */
final class AudioFeatureBulkGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AudioFeatureBulkGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<AudioFeature> $audio_features */
    #[Api(list: AudioFeature::class)]
    public array $audio_features;

    /**
     * `new AudioFeatureBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudioFeatureBulkGetResponse::with(audio_features: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AudioFeatureBulkGetResponse)->withAudioFeatures(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AudioFeature|array{
     *   id?: string|null,
     *   acousticness?: float|null,
     *   analysis_url?: string|null,
     *   danceability?: float|null,
     *   duration_ms?: int|null,
     *   energy?: float|null,
     *   instrumentalness?: float|null,
     *   key?: int|null,
     *   liveness?: float|null,
     *   loudness?: float|null,
     *   mode?: int|null,
     *   speechiness?: float|null,
     *   tempo?: float|null,
     *   time_signature?: int|null,
     *   track_href?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     *   valence?: float|null,
     * }> $audio_features
     */
    public static function with(array $audio_features): self
    {
        $obj = new self;

        $obj['audio_features'] = $audio_features;

        return $obj;
    }

    /**
     * @param list<AudioFeature|array{
     *   id?: string|null,
     *   acousticness?: float|null,
     *   analysis_url?: string|null,
     *   danceability?: float|null,
     *   duration_ms?: int|null,
     *   energy?: float|null,
     *   instrumentalness?: float|null,
     *   key?: int|null,
     *   liveness?: float|null,
     *   loudness?: float|null,
     *   mode?: int|null,
     *   speechiness?: float|null,
     *   tempo?: float|null,
     *   time_signature?: int|null,
     *   track_href?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     *   valence?: float|null,
     * }> $audioFeatures
     */
    public function withAudioFeatures(array $audioFeatures): self
    {
        $obj = clone $this;
        $obj['audio_features'] = $audioFeatures;

        return $obj;
    }
}
