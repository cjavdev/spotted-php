<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type ResumePointObjectShape = array{
 *   fullyPlayed?: bool|null, published?: bool|null, resumePositionMs?: int|null
 * }
 */
final class ResumePointObject implements BaseModel
{
    /** @use SdkModel<ResumePointObjectShape> */
    use SdkModel;

    /**
     * Whether or not the episode has been fully played by the user.
     */
    #[Optional('fully_played')]
    public ?bool $fullyPlayed;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * The user's most recent position in the episode in milliseconds.
     */
    #[Optional('resume_position_ms')]
    public ?int $resumePositionMs;

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
        ?bool $fullyPlayed = null,
        ?bool $published = null,
        ?int $resumePositionMs = null,
    ): self {
        $self = new self;

        null !== $fullyPlayed && $self['fullyPlayed'] = $fullyPlayed;
        null !== $published && $self['published'] = $published;
        null !== $resumePositionMs && $self['resumePositionMs'] = $resumePositionMs;

        return $self;
    }

    /**
     * Whether or not the episode has been fully played by the user.
     */
    public function withFullyPlayed(bool $fullyPlayed): self
    {
        $self = clone $this;
        $self['fullyPlayed'] = $fullyPlayed;

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
     * The user's most recent position in the episode in milliseconds.
     */
    public function withResumePositionMs(int $resumePositionMs): self
    {
        $self = clone $this;
        $self['resumePositionMs'] = $resumePositionMs;

        return $self;
    }
}
