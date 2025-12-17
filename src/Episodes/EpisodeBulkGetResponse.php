<?php

declare(strict_types=1);

namespace Spotted\Episodes;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\EpisodeObject;

/**
 * @phpstan-import-type EpisodeObjectShape from \Spotted\EpisodeObject
 *
 * @phpstan-type EpisodeBulkGetResponseShape = array{
 *   episodes: list<EpisodeObjectShape>
 * }
 */
final class EpisodeBulkGetResponse implements BaseModel
{
    /** @use SdkModel<EpisodeBulkGetResponseShape> */
    use SdkModel;

    /** @var list<EpisodeObject> $episodes */
    #[Required(list: EpisodeObject::class)]
    public array $episodes;

    /**
     * `new EpisodeBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EpisodeBulkGetResponse::with(episodes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EpisodeBulkGetResponse)->withEpisodes(...)
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
     * @param list<EpisodeObjectShape> $episodes
     */
    public static function with(array $episodes): self
    {
        $self = new self;

        $self['episodes'] = $episodes;

        return $self;
    }

    /**
     * @param list<EpisodeObjectShape> $episodes
     */
    public function withEpisodes(array $episodes): self
    {
        $self = clone $this;
        $self['episodes'] = $episodes;

        return $self;
    }
}
