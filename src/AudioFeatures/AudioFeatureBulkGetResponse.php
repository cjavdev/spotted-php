<?php

declare(strict_types=1);

namespace Spotted\AudioFeatures;

use Spotted\AudioFeatures\AudioFeatureBulkGetResponse\AudioFeature;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AudioFeatureShape from \Spotted\AudioFeatures\AudioFeatureBulkGetResponse\AudioFeature
 *
 * @phpstan-type AudioFeatureBulkGetResponseShape = array{
 *   audioFeatures: list<AudioFeature|AudioFeatureShape>
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
     * @param list<AudioFeature|AudioFeatureShape> $audioFeatures
     */
    public static function with(array $audioFeatures): self
    {
        $self = new self;

        $self['audioFeatures'] = $audioFeatures;

        return $self;
    }

    /**
     * @param list<AudioFeature|AudioFeatureShape> $audioFeatures
     */
    public function withAudioFeatures(array $audioFeatures): self
    {
        $self = clone $this;
        $self['audioFeatures'] = $audioFeatures;

        return $self;
    }
}
