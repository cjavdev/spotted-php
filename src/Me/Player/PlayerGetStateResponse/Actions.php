<?php

declare(strict_types=1);

namespace Spotted\Me\Player\PlayerGetStateResponse;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * Allows to update the user interface based on which playback actions are available within the current context.
 *
 * @phpstan-type ActionsShape = array{
 *   interrupting_playback?: bool|null,
 *   pausing?: bool|null,
 *   resuming?: bool|null,
 *   seeking?: bool|null,
 *   skipping_next?: bool|null,
 *   skipping_prev?: bool|null,
 *   toggling_repeat_context?: bool|null,
 *   toggling_repeat_track?: bool|null,
 *   toggling_shuffle?: bool|null,
 *   transferring_playback?: bool|null,
 * }
 */
final class Actions implements BaseModel
{
    /** @use SdkModel<ActionsShape> */
    use SdkModel;

    /**
     * Interrupting playback. Optional field.
     */
    #[Optional]
    public ?bool $interrupting_playback;

    /**
     * Pausing. Optional field.
     */
    #[Optional]
    public ?bool $pausing;

    /**
     * Resuming. Optional field.
     */
    #[Optional]
    public ?bool $resuming;

    /**
     * Seeking playback location. Optional field.
     */
    #[Optional]
    public ?bool $seeking;

    /**
     * Skipping to the next context. Optional field.
     */
    #[Optional]
    public ?bool $skipping_next;

    /**
     * Skipping to the previous context. Optional field.
     */
    #[Optional]
    public ?bool $skipping_prev;

    /**
     * Toggling repeat context flag. Optional field.
     */
    #[Optional]
    public ?bool $toggling_repeat_context;

    /**
     * Toggling repeat track flag. Optional field.
     */
    #[Optional]
    public ?bool $toggling_repeat_track;

    /**
     * Toggling shuffle flag. Optional field.
     */
    #[Optional]
    public ?bool $toggling_shuffle;

    /**
     * Transfering playback between devices. Optional field.
     */
    #[Optional]
    public ?bool $transferring_playback;

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
        ?bool $interrupting_playback = null,
        ?bool $pausing = null,
        ?bool $resuming = null,
        ?bool $seeking = null,
        ?bool $skipping_next = null,
        ?bool $skipping_prev = null,
        ?bool $toggling_repeat_context = null,
        ?bool $toggling_repeat_track = null,
        ?bool $toggling_shuffle = null,
        ?bool $transferring_playback = null,
    ): self {
        $obj = new self;

        null !== $interrupting_playback && $obj['interrupting_playback'] = $interrupting_playback;
        null !== $pausing && $obj['pausing'] = $pausing;
        null !== $resuming && $obj['resuming'] = $resuming;
        null !== $seeking && $obj['seeking'] = $seeking;
        null !== $skipping_next && $obj['skipping_next'] = $skipping_next;
        null !== $skipping_prev && $obj['skipping_prev'] = $skipping_prev;
        null !== $toggling_repeat_context && $obj['toggling_repeat_context'] = $toggling_repeat_context;
        null !== $toggling_repeat_track && $obj['toggling_repeat_track'] = $toggling_repeat_track;
        null !== $toggling_shuffle && $obj['toggling_shuffle'] = $toggling_shuffle;
        null !== $transferring_playback && $obj['transferring_playback'] = $transferring_playback;

        return $obj;
    }

    /**
     * Interrupting playback. Optional field.
     */
    public function withInterruptingPlayback(bool $interruptingPlayback): self
    {
        $obj = clone $this;
        $obj['interrupting_playback'] = $interruptingPlayback;

        return $obj;
    }

    /**
     * Pausing. Optional field.
     */
    public function withPausing(bool $pausing): self
    {
        $obj = clone $this;
        $obj['pausing'] = $pausing;

        return $obj;
    }

    /**
     * Resuming. Optional field.
     */
    public function withResuming(bool $resuming): self
    {
        $obj = clone $this;
        $obj['resuming'] = $resuming;

        return $obj;
    }

    /**
     * Seeking playback location. Optional field.
     */
    public function withSeeking(bool $seeking): self
    {
        $obj = clone $this;
        $obj['seeking'] = $seeking;

        return $obj;
    }

    /**
     * Skipping to the next context. Optional field.
     */
    public function withSkippingNext(bool $skippingNext): self
    {
        $obj = clone $this;
        $obj['skipping_next'] = $skippingNext;

        return $obj;
    }

    /**
     * Skipping to the previous context. Optional field.
     */
    public function withSkippingPrev(bool $skippingPrev): self
    {
        $obj = clone $this;
        $obj['skipping_prev'] = $skippingPrev;

        return $obj;
    }

    /**
     * Toggling repeat context flag. Optional field.
     */
    public function withTogglingRepeatContext(bool $togglingRepeatContext): self
    {
        $obj = clone $this;
        $obj['toggling_repeat_context'] = $togglingRepeatContext;

        return $obj;
    }

    /**
     * Toggling repeat track flag. Optional field.
     */
    public function withTogglingRepeatTrack(bool $togglingRepeatTrack): self
    {
        $obj = clone $this;
        $obj['toggling_repeat_track'] = $togglingRepeatTrack;

        return $obj;
    }

    /**
     * Toggling shuffle flag. Optional field.
     */
    public function withTogglingShuffle(bool $togglingShuffle): self
    {
        $obj = clone $this;
        $obj['toggling_shuffle'] = $togglingShuffle;

        return $obj;
    }

    /**
     * Transfering playback between devices. Optional field.
     */
    public function withTransferringPlayback(bool $transferringPlayback): self
    {
        $obj = clone $this;
        $obj['transferring_playback'] = $transferringPlayback;

        return $obj;
    }
}
