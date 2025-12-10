<?php

declare(strict_types=1);

namespace Spotted\Me\Episodes;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\EpisodeObject;
use Spotted\EpisodeObject\ReleaseDatePrecision;
use Spotted\EpisodeRestrictionObject;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\ResumePointObject;
use Spotted\ShowBase;

/**
 * @phpstan-type EpisodeListResponseShape = array{
 *   addedAt?: \DateTimeInterface|null, episode?: EpisodeObject|null
 * }
 */
final class EpisodeListResponse implements BaseModel
{
    /** @use SdkModel<EpisodeListResponseShape> */
    use SdkModel;

    /**
     * The date and time the episode was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     */
    #[Optional('added_at')]
    public ?\DateTimeInterface $addedAt;

    /**
     * Information about the episode.
     */
    #[Optional]
    public ?EpisodeObject $episode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EpisodeObject|array{
     *   id: string,
     *   audioPreviewURL: string|null,
     *   description: string,
     *   durationMs: int,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isExternallyHosted: bool,
     *   isPlayable: bool,
     *   languages: list<string>,
     *   name: string,
     *   releaseDate: string,
     *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type?: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resumePoint?: ResumePointObject|null,
     * } $episode
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        EpisodeObject|array|null $episode = null
    ): self {
        $self = new self;

        null !== $addedAt && $self['addedAt'] = $addedAt;
        null !== $episode && $self['episode'] = $episode;

        return $self;
    }

    /**
     * The date and time the episode was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $self = clone $this;
        $self['addedAt'] = $addedAt;

        return $self;
    }

    /**
     * Information about the episode.
     *
     * @param EpisodeObject|array{
     *   id: string,
     *   audioPreviewURL: string|null,
     *   description: string,
     *   durationMs: int,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isExternallyHosted: bool,
     *   isPlayable: bool,
     *   languages: list<string>,
     *   name: string,
     *   releaseDate: string,
     *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type?: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resumePoint?: ResumePointObject|null,
     * } $episode
     */
    public function withEpisode(EpisodeObject|array $episode): self
    {
        $self = clone $this;
        $self['episode'] = $episode;

        return $self;
    }
}
