<?php

declare(strict_types=1);

namespace Spotted\Shows;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\ShowBase;

/**
 * @phpstan-type show_list_response = array{shows: list<ShowBase>}
 */
final class ShowListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<show_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<ShowBase> $shows */
    #[Api(list: ShowBase::class)]
    public array $shows;

    /**
     * `new ShowListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ShowListResponse::with(shows: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ShowListResponse)->withShows(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ShowBase> $shows
     */
    public static function with(array $shows): self
    {
        $obj = new self;

        $obj->shows = $shows;

        return $obj;
    }

    /**
     * @param list<ShowBase> $shows
     */
    public function withShows(array $shows): self
    {
        $obj = clone $this;
        $obj->shows = $shows;

        return $obj;
    }
}
