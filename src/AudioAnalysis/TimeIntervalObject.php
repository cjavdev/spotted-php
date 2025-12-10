<?php

declare(strict_types=1);

namespace Spotted\AudioAnalysis;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type TimeIntervalObjectShape = array{
 *   confidence?: float|null, duration?: float|null, start?: float|null
 * }
 */
final class TimeIntervalObject implements BaseModel
{
    /** @use SdkModel<TimeIntervalObjectShape> */
    use SdkModel;

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the interval.
     */
    #[Optional]
    public ?float $confidence;

    /**
     * The duration (in seconds) of the time interval.
     */
    #[Optional]
    public ?float $duration;

    /**
     * The starting point (in seconds) of the time interval.
     */
    #[Optional]
    public ?float $start;

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
        ?float $confidence = null,
        ?float $duration = null,
        ?float $start = null
    ): self {
        $self = new self;

        null !== $confidence && $self['confidence'] = $confidence;
        null !== $duration && $self['duration'] = $duration;
        null !== $start && $self['start'] = $start;

        return $self;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the interval.
     */
    public function withConfidence(float $confidence): self
    {
        $self = clone $this;
        $self['confidence'] = $confidence;

        return $self;
    }

    /**
     * The duration (in seconds) of the time interval.
     */
    public function withDuration(float $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * The starting point (in seconds) of the time interval.
     */
    public function withStart(float $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

        return $self;
    }
}
