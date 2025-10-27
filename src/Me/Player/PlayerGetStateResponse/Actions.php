<?php

declare(strict_types=1);

namespace Spotted\Me\Player\PlayerGetStateResponse;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * Allows to update the user interface based on which playback actions are available within the current context.
 *
 * @phpstan-type actions_alias = array{
 *   interruptingPlayback?: bool,
 *   pausing?: bool,
 *   resuming?: bool,
 *   seeking?: bool,
 *   skippingNext?: bool,
 *   skippingPrev?: bool,
 *   togglingRepeatContext?: bool,
 *   togglingRepeatTrack?: bool,
 *   togglingShuffle?: bool,
 *   transferringPlayback?: bool,
 * }
 */
final class Actions implements BaseModel
{
    /** @use SdkModel<actions_alias> */
    use SdkModel;

    /**
     * Interrupting playback. Optional field.
     */
    #[Api('interrupting_playback', optional: true)]
    public ?bool $interruptingPlayback;

    /**
     * Pausing. Optional field.
     */
    #[Api(optional: true)]
    public ?bool $pausing;

    /**
     * Resuming. Optional field.
     */
    #[Api(optional: true)]
    public ?bool $resuming;

    /**
     * Seeking playback location. Optional field.
     */
    #[Api(optional: true)]
    public ?bool $seeking;

    /**
     * Skipping to the next context. Optional field.
     */
    #[Api('skipping_next', optional: true)]
    public ?bool $skippingNext;

    /**
     * Skipping to the previous context. Optional field.
     */
    #[Api('skipping_prev', optional: true)]
    public ?bool $skippingPrev;

    /**
     * Toggling repeat context flag. Optional field.
     */
    #[Api('toggling_repeat_context', optional: true)]
    public ?bool $togglingRepeatContext;

    /**
     * Toggling repeat track flag. Optional field.
     */
    #[Api('toggling_repeat_track', optional: true)]
    public ?bool $togglingRepeatTrack;

    /**
     * Toggling shuffle flag. Optional field.
     */
    #[Api('toggling_shuffle', optional: true)]
    public ?bool $togglingShuffle;

    /**
     * Transfering playback between devices. Optional field.
     */
    #[Api('transferring_playback', optional: true)]
    public ?bool $transferringPlayback;

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
        ?bool $interruptingPlayback = null,
        ?bool $pausing = null,
        ?bool $resuming = null,
        ?bool $seeking = null,
        ?bool $skippingNext = null,
        ?bool $skippingPrev = null,
        ?bool $togglingRepeatContext = null,
        ?bool $togglingRepeatTrack = null,
        ?bool $togglingShuffle = null,
        ?bool $transferringPlayback = null,
    ): self {
        $obj = new self;

        null !== $interruptingPlayback && $obj->interruptingPlayback = $interruptingPlayback;
        null !== $pausing && $obj->pausing = $pausing;
        null !== $resuming && $obj->resuming = $resuming;
        null !== $seeking && $obj->seeking = $seeking;
        null !== $skippingNext && $obj->skippingNext = $skippingNext;
        null !== $skippingPrev && $obj->skippingPrev = $skippingPrev;
        null !== $togglingRepeatContext && $obj->togglingRepeatContext = $togglingRepeatContext;
        null !== $togglingRepeatTrack && $obj->togglingRepeatTrack = $togglingRepeatTrack;
        null !== $togglingShuffle && $obj->togglingShuffle = $togglingShuffle;
        null !== $transferringPlayback && $obj->transferringPlayback = $transferringPlayback;

        return $obj;
    }

    /**
     * Interrupting playback. Optional field.
     */
    public function withInterruptingPlayback(bool $interruptingPlayback): self
    {
        $obj = clone $this;
        $obj->interruptingPlayback = $interruptingPlayback;

        return $obj;
    }

    /**
     * Pausing. Optional field.
     */
    public function withPausing(bool $pausing): self
    {
        $obj = clone $this;
        $obj->pausing = $pausing;

        return $obj;
    }

    /**
     * Resuming. Optional field.
     */
    public function withResuming(bool $resuming): self
    {
        $obj = clone $this;
        $obj->resuming = $resuming;

        return $obj;
    }

    /**
     * Seeking playback location. Optional field.
     */
    public function withSeeking(bool $seeking): self
    {
        $obj = clone $this;
        $obj->seeking = $seeking;

        return $obj;
    }

    /**
     * Skipping to the next context. Optional field.
     */
    public function withSkippingNext(bool $skippingNext): self
    {
        $obj = clone $this;
        $obj->skippingNext = $skippingNext;

        return $obj;
    }

    /**
     * Skipping to the previous context. Optional field.
     */
    public function withSkippingPrev(bool $skippingPrev): self
    {
        $obj = clone $this;
        $obj->skippingPrev = $skippingPrev;

        return $obj;
    }

    /**
     * Toggling repeat context flag. Optional field.
     */
    public function withTogglingRepeatContext(bool $togglingRepeatContext): self
    {
        $obj = clone $this;
        $obj->togglingRepeatContext = $togglingRepeatContext;

        return $obj;
    }

    /**
     * Toggling repeat track flag. Optional field.
     */
    public function withTogglingRepeatTrack(bool $togglingRepeatTrack): self
    {
        $obj = clone $this;
        $obj->togglingRepeatTrack = $togglingRepeatTrack;

        return $obj;
    }

    /**
     * Toggling shuffle flag. Optional field.
     */
    public function withTogglingShuffle(bool $togglingShuffle): self
    {
        $obj = clone $this;
        $obj->togglingShuffle = $togglingShuffle;

        return $obj;
    }

    /**
     * Transfering playback between devices. Optional field.
     */
    public function withTransferringPlayback(bool $transferringPlayback): self
    {
        $obj = clone $this;
        $obj->transferringPlayback = $transferringPlayback;

        return $obj;
    }
}
