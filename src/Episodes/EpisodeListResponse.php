<?php

declare(strict_types=1);

namespace Spotted\Episodes;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\EpisodeObject;

/**
 * @phpstan-type episode_list_response = array{episodes: list<EpisodeObject>}
 */
final class EpisodeListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<episode_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<EpisodeObject> $episodes */
    #[Api(list: EpisodeObject::class)]
    public array $episodes;

    /**
     * `new EpisodeListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EpisodeListResponse::with(episodes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EpisodeListResponse)->withEpisodes(...)
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
     * @param list<EpisodeObject> $episodes
     */
    public static function with(array $episodes): self
    {
        $obj = new self;

        $obj->episodes = $episodes;

        return $obj;
    }

    /**
     * @param list<EpisodeObject> $episodes
     */
    public function withEpisodes(array $episodes): self
    {
        $obj = clone $this;
        $obj->episodes = $episodes;

        return $obj;
    }
}
