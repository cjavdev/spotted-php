<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type resume_point_object = array{
 *   fullyPlayed?: bool, resumePositionMs?: int
 * }
 */
final class ResumePointObject implements BaseModel
{
    /** @use SdkModel<resume_point_object> */
    use SdkModel;

    /**
     * Whether or not the episode has been fully played by the user.
     */
    #[Api('fully_played', optional: true)]
    public ?bool $fullyPlayed;

    /**
     * The user's most recent position in the episode in milliseconds.
     */
    #[Api('resume_position_ms', optional: true)]
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
        ?int $resumePositionMs = null
    ): self {
        $obj = new self;

        null !== $fullyPlayed && $obj->fullyPlayed = $fullyPlayed;
        null !== $resumePositionMs && $obj->resumePositionMs = $resumePositionMs;

        return $obj;
    }

    /**
     * Whether or not the episode has been fully played by the user.
     */
    public function withFullyPlayed(bool $fullyPlayed): self
    {
        $obj = clone $this;
        $obj->fullyPlayed = $fullyPlayed;

        return $obj;
    }

    /**
     * The user's most recent position in the episode in milliseconds.
     */
    public function withResumePositionMs(int $resumePositionMs): self
    {
        $obj = clone $this;
        $obj->resumePositionMs = $resumePositionMs;

        return $obj;
    }
}
