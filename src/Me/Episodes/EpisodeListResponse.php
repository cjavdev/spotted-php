<?php

declare(strict_types=1);

namespace Spotted\Me\Episodes;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\EpisodeObject;

/**
 * @phpstan-import-type EpisodeObjectShape from \Spotted\EpisodeObject
 *
 * @phpstan-type EpisodeListResponseShape = array{
 *   addedAt?: \DateTimeInterface|null,
 *   episode?: null|EpisodeObject|EpisodeObjectShape,
 *   published?: bool|null,
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

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EpisodeObject|EpisodeObjectShape|null $episode
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        EpisodeObject|array|null $episode = null,
        ?bool $published = null,
    ): self {
        $self = new self;

        null !== $addedAt && $self['addedAt'] = $addedAt;
        null !== $episode && $self['episode'] = $episode;
        null !== $published && $self['published'] = $published;

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
     * @param EpisodeObject|EpisodeObjectShape $episode
     */
    public function withEpisode(EpisodeObject|array $episode): self
    {
        $self = clone $this;
        $self['episode'] = $episode;

        return $self;
    }

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }
}
