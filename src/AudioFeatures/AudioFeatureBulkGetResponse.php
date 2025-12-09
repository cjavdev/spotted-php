<?php

declare(strict_types=1);

namespace Spotted\AudioFeatures;

use Spotted\AudioFeatures\AudioFeatureBulkGetResponse\AudioFeature;
use Spotted\AudioFeatures\AudioFeatureBulkGetResponse\AudioFeature\Type;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type AudioFeatureBulkGetResponseShape = array{
 *   audioFeatures: list<AudioFeature>
 * }
 */
final class AudioFeatureBulkGetResponse implements BaseModel
{
    /** @use SdkModel<AudioFeatureBulkGetResponseShape> */
    use SdkModel;

    /** @var list<AudioFeature> $audioFeatures */
    #[Required('audio_features', list: AudioFeature::class)]
    public array $audioFeatures;

    /**
     * `new AudioFeatureBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudioFeatureBulkGetResponse::with(audioFeatures: ...)
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
     *   analysisURL?: string|null,
     *   danceability?: float|null,
     *   durationMs?: int|null,
     *   energy?: float|null,
     *   instrumentalness?: float|null,
     *   key?: int|null,
     *   liveness?: float|null,
     *   loudness?: float|null,
     *   mode?: int|null,
     *   speechiness?: float|null,
     *   tempo?: float|null,
     *   timeSignature?: int|null,
     *   trackHref?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     *   valence?: float|null,
     * }> $audioFeatures
     */
    public static function with(array $audioFeatures): self
    {
        $obj = new self;

        $obj['audioFeatures'] = $audioFeatures;

        return $obj;
    }

    /**
     * @param list<AudioFeature|array{
     *   id?: string|null,
     *   acousticness?: float|null,
     *   analysisURL?: string|null,
     *   danceability?: float|null,
     *   durationMs?: int|null,
     *   energy?: float|null,
     *   instrumentalness?: float|null,
     *   key?: int|null,
     *   liveness?: float|null,
     *   loudness?: float|null,
     *   mode?: int|null,
     *   speechiness?: float|null,
     *   tempo?: float|null,
     *   timeSignature?: int|null,
     *   trackHref?: string|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     *   valence?: float|null,
     * }> $audioFeatures
     */
    public function withAudioFeatures(array $audioFeatures): self
    {
        $obj = clone $this;
        $obj['audioFeatures'] = $audioFeatures;

        return $obj;
    }
}
