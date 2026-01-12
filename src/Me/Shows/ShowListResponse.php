<?php

declare(strict_types=1);

namespace Spotted\Me\Shows;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ShowBase;

/**
 * @phpstan-import-type ShowBaseShape from \Spotted\ShowBase
 *
 * @phpstan-type ShowListResponseShape = array{
 *   addedAt?: \DateTimeInterface|null,
 *   published?: bool|null,
 *   show?: null|ShowBase|ShowBaseShape,
 * }
 */
final class ShowListResponse implements BaseModel
{
    /** @use SdkModel<ShowListResponseShape> */
    use SdkModel;

    /**
     * The date and time the show was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    #[Optional('added_at')]
    public ?\DateTimeInterface $addedAt;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * Information about the show.
     */
    #[Optional]
    public ?ShowBase $show;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ShowBase|ShowBaseShape|null $show
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        ?bool $published = null,
        ShowBase|array|null $show = null,
    ): self {
        $self = new self;

        null !== $addedAt && $self['addedAt'] = $addedAt;
        null !== $published && $self['published'] = $published;
        null !== $show && $self['show'] = $show;

        return $self;
    }

    /**
     * The date and time the show was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $self = clone $this;
        $self['addedAt'] = $addedAt;

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

    /**
     * Information about the show.
     *
     * @param ShowBase|ShowBaseShape $show
     */
    public function withShow(ShowBase|array $show): self
    {
        $self = clone $this;
        $self['show'] = $show;

        return $self;
    }
}
