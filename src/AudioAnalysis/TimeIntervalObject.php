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
        $obj = new self;

        null !== $confidence && $obj['confidence'] = $confidence;
        null !== $duration && $obj['duration'] = $duration;
        null !== $start && $obj['start'] = $start;

        return $obj;
    }

    /**
     * The confidence, from 0.0 to 1.0, of the reliability of the interval.
     */
    public function withConfidence(float $confidence): self
    {
        $obj = clone $this;
        $obj['confidence'] = $confidence;

        return $obj;
    }

    /**
     * The duration (in seconds) of the time interval.
     */
    public function withDuration(float $duration): self
    {
        $obj = clone $this;
        $obj['duration'] = $duration;

        return $obj;
    }

    /**
     * The starting point (in seconds) of the time interval.
     */
    public function withStart(float $start): self
    {
        $obj = clone $this;
        $obj['start'] = $start;

        return $obj;
    }
}
