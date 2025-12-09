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
        $obj = new self;

        null !== $analysisTime && $obj['analysisTime'] = $analysisTime;
        null !== $analyzerVersion && $obj['analyzerVersion'] = $analyzerVersion;
        null !== $detailedStatus && $obj['detailedStatus'] = $detailedStatus;
        null !== $inputProcess && $obj['inputProcess'] = $inputProcess;
        null !== $platform && $obj['platform'] = $platform;
        null !== $statusCode && $obj['statusCode'] = $statusCode;
        null !== $timestamp && $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * The amount of time taken to analyze this track.
     */
    public function withAnalysisTime(float $analysisTime): self
    {
        $obj = clone $this;
        $obj['analysisTime'] = $analysisTime;

        return $obj;
    }

    /**
     * The version of the Analyzer used to analyze this track.
     */
    public function withAnalyzerVersion(string $analyzerVersion): self
    {
        $obj = clone $this;
        $obj['analyzerVersion'] = $analyzerVersion;

        return $obj;
    }

    /**
     * A detailed status code for this track. If analysis data is missing, this code may explain why.
     */
    public function withDetailedStatus(string $detailedStatus): self
    {
        $obj = clone $this;
        $obj['detailedStatus'] = $detailedStatus;

        return $obj;
    }

    /**
     * The method used to read the track's audio data.
     */
    public function withInputProcess(string $inputProcess): self
    {
        $obj = clone $this;
        $obj['inputProcess'] = $inputProcess;

        return $obj;
    }

    /**
     * The platform used to read the track's audio data.
     */
    public function withPlatform(string $platform): self
    {
        $obj = clone $this;
        $obj['platform'] = $platform;

        return $obj;
    }

    /**
     * The return code of the analyzer process. 0 if successful, 1 if any errors occurred.
     */
    public function withStatusCode(int $statusCode): self
    {
        $obj = clone $this;
        $obj['statusCode'] = $statusCode;

        return $obj;
    }

    /**
     * The Unix timestamp (in seconds) at which this track was analyzed.
     */
    public function withTimestamp(int $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }
}
