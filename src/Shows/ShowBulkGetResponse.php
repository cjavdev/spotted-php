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
 * @phpstan-type ShowBulkGetResponseShape = array{shows: list<ShowBase>}
 */
final class ShowBulkGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ShowBulkGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<ShowBase> $shows */
    #[Api(list: ShowBase::class)]
    public array $shows;

    /**
     * `new ShowBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ShowBulkGetResponse::with(shows: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ShowBulkGetResponse)->withShows(...)
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
