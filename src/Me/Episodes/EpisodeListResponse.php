<?php

declare(strict_types=1);

namespace Spotted\Me\Episodes;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\EpisodeObject;

/**
 * @phpstan-type EpisodeListResponseShape = array{
 *   addedAt?: \DateTimeInterface, episode?: EpisodeObject
 * }
 */
final class EpisodeListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<EpisodeListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The date and time the episode was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     */
    #[Api('added_at', optional: true)]
    public ?\DateTimeInterface $addedAt;

    /**
     * Information about the episode.
     */
    #[Api(optional: true)]
    public ?EpisodeObject $episode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        ?EpisodeObject $episode = null
    ): self {
        $obj = new self;

        null !== $addedAt && $obj->addedAt = $addedAt;
        null !== $episode && $obj->episode = $episode;

        return $obj;
    }

    /**
     * The date and time the episode was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj->addedAt = $addedAt;

        return $obj;
    }

    /**
     * Information about the episode.
     */
    public function withEpisode(EpisodeObject $episode): self
    {
        $obj = clone $this;
        $obj->episode = $episode;

        return $obj;
    }
}
