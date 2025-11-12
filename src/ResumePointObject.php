<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type ResumePointObjectShape = array{
 *   fully_played?: bool|null, resume_position_ms?: int|null
 * }
 */
final class ResumePointObject implements BaseModel
{
    /** @use SdkModel<ResumePointObjectShape> */
    use SdkModel;

    /**
     * Whether or not the episode has been fully played by the user.
     */
    #[Api(optional: true)]
    public ?bool $fully_played;

    /**
     * The user's most recent position in the episode in milliseconds.
     */
    #[Api(optional: true)]
    public ?int $resume_position_ms;

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
        ?bool $fully_played = null,
        ?int $resume_position_ms = null
    ): self {
        $obj = new self;

        null !== $fully_played && $obj->fully_played = $fully_played;
        null !== $resume_position_ms && $obj->resume_position_ms = $resume_position_ms;

        return $obj;
    }

    /**
     * Whether or not the episode has been fully played by the user.
     */
    public function withFullyPlayed(bool $fullyPlayed): self
    {
        $obj = clone $this;
        $obj->fully_played = $fullyPlayed;

        return $obj;
    }

    /**
     * The user's most recent position in the episode in milliseconds.
     */
    public function withResumePositionMs(int $resumePositionMs): self
    {
        $obj = clone $this;
        $obj->resume_position_ms = $resumePositionMs;

        return $obj;
    }
}
