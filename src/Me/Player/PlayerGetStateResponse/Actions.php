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
 *   interruptingPlayback?: bool|null,
 *   pausing?: bool|null,
 *   published?: bool|null,
 *   resuming?: bool|null,
 *   seeking?: bool|null,
 *   skippingNext?: bool|null,
 *   skippingPrev?: bool|null,
 *   togglingRepeatContext?: bool|null,
 *   togglingRepeatTrack?: bool|null,
 *   togglingShuffle?: bool|null,
 *   transferringPlayback?: bool|null,
 * }
 */
final class Actions implements BaseModel
{
    /** @use SdkModel<ActionsShape> */
    use SdkModel;

    /**
     * Interrupting playback. Optional field.
     */
    #[Optional('interrupting_playback')]
    public ?bool $interruptingPlayback;

    /**
     * Pausing. Optional field.
     */
    #[Optional]
    public ?bool $pausing;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

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
    #[Optional('skipping_next')]
    public ?bool $skippingNext;

    /**
     * Skipping to the previous context. Optional field.
     */
    #[Optional('skipping_prev')]
    public ?bool $skippingPrev;

    /**
     * Toggling repeat context flag. Optional field.
     */
    #[Optional('toggling_repeat_context')]
    public ?bool $togglingRepeatContext;

    /**
     * Toggling repeat track flag. Optional field.
     */
    #[Optional('toggling_repeat_track')]
    public ?bool $togglingRepeatTrack;

    /**
     * Toggling shuffle flag. Optional field.
     */
    #[Optional('toggling_shuffle')]
    public ?bool $togglingShuffle;

    /**
     * Transfering playback between devices. Optional field.
     */
    #[Optional('transferring_playback')]
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
        ?bool $published = null,
        ?bool $resuming = null,
        ?bool $seeking = null,
        ?bool $skippingNext = null,
        ?bool $skippingPrev = null,
        ?bool $togglingRepeatContext = null,
        ?bool $togglingRepeatTrack = null,
        ?bool $togglingShuffle = null,
        ?bool $transferringPlayback = null,
    ): self {
        $self = new self;

        null !== $interruptingPlayback && $self['interruptingPlayback'] = $interruptingPlayback;
        null !== $pausing && $self['pausing'] = $pausing;
        null !== $published && $self['published'] = $published;
        null !== $resuming && $self['resuming'] = $resuming;
        null !== $seeking && $self['seeking'] = $seeking;
        null !== $skippingNext && $self['skippingNext'] = $skippingNext;
        null !== $skippingPrev && $self['skippingPrev'] = $skippingPrev;
        null !== $togglingRepeatContext && $self['togglingRepeatContext'] = $togglingRepeatContext;
        null !== $togglingRepeatTrack && $self['togglingRepeatTrack'] = $togglingRepeatTrack;
        null !== $togglingShuffle && $self['togglingShuffle'] = $togglingShuffle;
        null !== $transferringPlayback && $self['transferringPlayback'] = $transferringPlayback;

        return $self;
    }

    /**
     * Interrupting playback. Optional field.
     */
    public function withInterruptingPlayback(bool $interruptingPlayback): self
    {
        $self = clone $this;
        $self['interruptingPlayback'] = $interruptingPlayback;

        return $self;
    }

    /**
     * Pausing. Optional field.
     */
    public function withPausing(bool $pausing): self
    {
        $self = clone $this;
        $self['pausing'] = $pausing;

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
     * Resuming. Optional field.
     */
    public function withResuming(bool $resuming): self
    {
        $self = clone $this;
        $self['resuming'] = $resuming;

        return $self;
    }

    /**
     * Seeking playback location. Optional field.
     */
    public function withSeeking(bool $seeking): self
    {
        $self = clone $this;
        $self['seeking'] = $seeking;

        return $self;
    }

    /**
     * Skipping to the next context. Optional field.
     */
    public function withSkippingNext(bool $skippingNext): self
    {
        $self = clone $this;
        $self['skippingNext'] = $skippingNext;

        return $self;
    }

    /**
     * Skipping to the previous context. Optional field.
     */
    public function withSkippingPrev(bool $skippingPrev): self
    {
        $self = clone $this;
        $self['skippingPrev'] = $skippingPrev;

        return $self;
    }

    /**
     * Toggling repeat context flag. Optional field.
     */
    public function withTogglingRepeatContext(bool $togglingRepeatContext): self
    {
        $self = clone $this;
        $self['togglingRepeatContext'] = $togglingRepeatContext;

        return $self;
    }

    /**
     * Toggling repeat track flag. Optional field.
     */
    public function withTogglingRepeatTrack(bool $togglingRepeatTrack): self
    {
        $self = clone $this;
        $self['togglingRepeatTrack'] = $togglingRepeatTrack;

        return $self;
    }

    /**
     * Toggling shuffle flag. Optional field.
     */
    public function withTogglingShuffle(bool $togglingShuffle): self
    {
        $self = clone $this;
        $self['togglingShuffle'] = $togglingShuffle;

        return $self;
    }

    /**
     * Transfering playback between devices. Optional field.
     */
    public function withTransferringPlayback(bool $transferringPlayback): self
    {
        $self = clone $this;
        $self['transferringPlayback'] = $transferringPlayback;

        return $self;
    }
}
