<?php

declare(strict_types=1);

namespace Spotted\AudioFeatures;

use Spotted\AudioFeatures\AudioFeatureListResponse\AudioFeature;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type audio_feature_list_response = array{
 *   audioFeatures: list<AudioFeature>
 * }
 */
final class AudioFeatureListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<audio_feature_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<AudioFeature> $audioFeatures */
    #[Api('audio_features', list: AudioFeature::class)]
    public array $audioFeatures;

    /**
     * `new AudioFeatureListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudioFeatureListResponse::with(audioFeatures: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AudioFeatureListResponse)->withAudioFeatures(...)
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
     * @param list<AudioFeature> $audioFeatures
     */
    public static function with(array $audioFeatures): self
    {
        $obj = new self;

        $obj->audioFeatures = $audioFeatures;

        return $obj;
    }

    /**
     * @param list<AudioFeature> $audioFeatures
     */
    public function withAudioFeatures(array $audioFeatures): self
    {
        $obj = clone $this;
        $obj->audioFeatures = $audioFeatures;

        return $obj;
    }
}
