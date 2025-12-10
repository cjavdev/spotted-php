<?php

declare(strict_types=1);

namespace Spotted\AudioAnalysis\AudioAnalysisGetResponse;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   analysisTime?: float|null,
 *   analyzerVersion?: string|null,
 *   detailedStatus?: string|null,
 *   inputProcess?: string|null,
 *   platform?: string|null,
 *   statusCode?: int|null,
 *   timestamp?: int|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * The amount of time taken to analyze this track.
     */
    #[Optional('analysis_time')]
    public ?float $analysisTime;

    /**
     * The version of the Analyzer used to analyze this track.
     */
    #[Optional('analyzer_version')]
    public ?string $analyzerVersion;

    /**
     * A detailed status code for this track. If analysis data is missing, this code may explain why.
     */
    #[Optional('detailed_status')]
    public ?string $detailedStatus;

    /**
     * The method used to read the track's audio data.
     */
    #[Optional('input_process')]
    public ?string $inputProcess;

    /**
     * The platform used to read the track's audio data.
     */
    #[Optional]
    public ?string $platform;

    /**
     * The return code of the analyzer process. 0 if successful, 1 if any errors occurred.
     */
    #[Optional('status_code')]
    public ?int $statusCode;

    /**
     * The Unix timestamp (in seconds) at which this track was analyzed.
     */
    #[Optional]
    public ?int $timestamp;

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
        ?float $analysisTime = null,
        ?string $analyzerVersion = null,
        ?string $detailedStatus = null,
        ?string $inputProcess = null,
        ?string $platform = null,
        ?int $statusCode = null,
        ?int $timestamp = null,
    ): self {
        $self = new self;

        null !== $analysisTime && $self['analysisTime'] = $analysisTime;
        null !== $analyzerVersion && $self['analyzerVersion'] = $analyzerVersion;
        null !== $detailedStatus && $self['detailedStatus'] = $detailedStatus;
        null !== $inputProcess && $self['inputProcess'] = $inputProcess;
        null !== $platform && $self['platform'] = $platform;
        null !== $statusCode && $self['statusCode'] = $statusCode;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * The amount of time taken to analyze this track.
     */
    public function withAnalysisTime(float $analysisTime): self
    {
        $self = clone $this;
        $self['analysisTime'] = $analysisTime;

        return $self;
    }

    /**
     * The version of the Analyzer used to analyze this track.
     */
    public function withAnalyzerVersion(string $analyzerVersion): self
    {
        $self = clone $this;
        $self['analyzerVersion'] = $analyzerVersion;

        return $self;
    }

    /**
     * A detailed status code for this track. If analysis data is missing, this code may explain why.
     */
    public function withDetailedStatus(string $detailedStatus): self
    {
        $self = clone $this;
        $self['detailedStatus'] = $detailedStatus;

        return $self;
    }

    /**
     * The method used to read the track's audio data.
     */
    public function withInputProcess(string $inputProcess): self
    {
        $self = clone $this;
        $self['inputProcess'] = $inputProcess;

        return $self;
    }

    /**
     * The platform used to read the track's audio data.
     */
    public function withPlatform(string $platform): self
    {
        $self = clone $this;
        $self['platform'] = $platform;

        return $self;
    }

    /**
     * The return code of the analyzer process. 0 if successful, 1 if any errors occurred.
     */
    public function withStatusCode(int $statusCode): self
    {
        $self = clone $this;
        $self['statusCode'] = $statusCode;

        return $self;
    }

    /**
     * The Unix timestamp (in seconds) at which this track was analyzed.
     */
    public function withTimestamp(int $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
