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
 *   added_at?: \DateTimeInterface|null, episode?: EpisodeObject|null
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
    #[Optional]
    public ?\DateTimeInterface $added_at;

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
     *   audio_preview_url: string|null,
     *   description: string,
     *   duration_ms: int,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   is_externally_hosted: bool,
     *   is_playable: bool,
     *   languages: list<string>,
     *   name: string,
     *   release_date: string,
     *   release_date_precision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type?: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resume_point?: ResumePointObject|null,
     * } $episode
     */
    public static function with(
        ?\DateTimeInterface $added_at = null,
        EpisodeObject|array|null $episode = null
    ): self {
        $obj = new self;

        null !== $added_at && $obj['added_at'] = $added_at;
        null !== $episode && $obj['episode'] = $episode;

        return $obj;
    }

    /**
     * The date and time the episode was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj['added_at'] = $addedAt;

        return $obj;
    }

    /**
     * Information about the episode.
     *
     * @param EpisodeObject|array{
     *   id: string,
     *   audio_preview_url: string|null,
     *   description: string,
     *   duration_ms: int,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   is_externally_hosted: bool,
     *   is_playable: bool,
     *   languages: list<string>,
     *   name: string,
     *   release_date: string,
     *   release_date_precision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type?: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resume_point?: ResumePointObject|null,
     * } $episode
     */
    public function withEpisode(EpisodeObject|array $episode): self
    {
        $obj = clone $this;
        $obj['episode'] = $episode;

        return $obj;
    }
}
