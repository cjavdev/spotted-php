<?php

declare(strict_types=1);

namespace Spotted\Me\Shows;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\ShowBase;

/**
 * @phpstan-type ShowListResponseShape = array{
 *   added_at?: \DateTimeInterface|null, show?: ShowBase|null
 * }
 */
final class ShowListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ShowListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The date and time the show was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $added_at;

    /**
     * Information about the show.
     */
    #[Api(optional: true)]
    public ?ShowBase $show;

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
        ?\DateTimeInterface $added_at = null,
        ?ShowBase $show = null
    ): self {
        $obj = new self;

        null !== $added_at && $obj->added_at = $added_at;
        null !== $show && $obj->show = $show;

        return $obj;
    }

    /**
     * The date and time the show was saved.
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $obj = clone $this;
        $obj->added_at = $addedAt;

        return $obj;
    }

    /**
     * Information about the show.
     */
    public function withShow(ShowBase $show): self
    {
        $obj = clone $this;
        $obj->show = $show;

        return $obj;
    }
}
