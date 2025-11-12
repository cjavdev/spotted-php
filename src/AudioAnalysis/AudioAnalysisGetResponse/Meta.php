<?php

declare(strict_types=1);

namespace Spotted\AudioAnalysis\AudioAnalysisGetResponse;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   analysis_time?: float|null,
 *   analyzer_version?: string|null,
 *   detailed_status?: string|null,
 *   input_process?: string|null,
 *   platform?: string|null,
 *   status_code?: int|null,
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
    #[Api(optional: true)]
    public ?float $analysis_time;

    /**
     * The version of the Analyzer used to analyze this track.
     */
    #[Api(optional: true)]
    public ?string $analyzer_version;

    /**
     * A detailed status code for this track. If analysis data is missing, this code may explain why.
     */
    #[Api(optional: true)]
    public ?string $detailed_status;

    /**
     * The method used to read the track's audio data.
     */
    #[Api(optional: true)]
    public ?string $input_process;

    /**
     * The platform used to read the track's audio data.
     */
    #[Api(optional: true)]
    public ?string $platform;

    /**
     * The return code of the analyzer process. 0 if successful, 1 if any errors occurred.
     */
    #[Api(optional: true)]
    public ?int $status_code;

    /**
     * The Unix timestamp (in seconds) at which this track was analyzed.
     */
    #[Api(optional: true)]
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
        ?float $analysis_time = null,
        ?string $analyzer_version = null,
        ?string $detailed_status = null,
        ?string $input_process = null,
        ?string $platform = null,
        ?int $status_code = null,
        ?int $timestamp = null,
    ): self {
        $obj = new self;

        null !== $analysis_time && $obj->analysis_time = $analysis_time;
        null !== $analyzer_version && $obj->analyzer_version = $analyzer_version;
        null !== $detailed_status && $obj->detailed_status = $detailed_status;
        null !== $input_process && $obj->input_process = $input_process;
        null !== $platform && $obj->platform = $platform;
        null !== $status_code && $obj->status_code = $status_code;
        null !== $timestamp && $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * The amount of time taken to analyze this track.
     */
    public function withAnalysisTime(float $analysisTime): self
    {
        $obj = clone $this;
        $obj->analysis_time = $analysisTime;

        return $obj;
    }

    /**
     * The version of the Analyzer used to analyze this track.
     */
    public function withAnalyzerVersion(string $analyzerVersion): self
    {
        $obj = clone $this;
        $obj->analyzer_version = $analyzerVersion;

        return $obj;
    }

    /**
     * A detailed status code for this track. If analysis data is missing, this code may explain why.
     */
    public function withDetailedStatus(string $detailedStatus): self
    {
        $obj = clone $this;
        $obj->detailed_status = $detailedStatus;

        return $obj;
    }

    /**
     * The method used to read the track's audio data.
     */
    public function withInputProcess(string $inputProcess): self
    {
        $obj = clone $this;
        $obj->input_process = $inputProcess;

        return $obj;
    }

    /**
     * The platform used to read the track's audio data.
     */
    public function withPlatform(string $platform): self
    {
        $obj = clone $this;
        $obj->platform = $platform;

        return $obj;
    }

    /**
     * The return code of the analyzer process. 0 if successful, 1 if any errors occurred.
     */
    public function withStatusCode(int $statusCode): self
    {
        $obj = clone $this;
        $obj->status_code = $statusCode;

        return $obj;
    }

    /**
     * The Unix timestamp (in seconds) at which this track was analyzed.
     */
    public function withTimestamp(int $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }
}
