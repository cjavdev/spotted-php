<?php

declare(strict_types=1);

namespace Spotted\Shows;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ShowBase;

/**
 * @phpstan-import-type ShowBaseShape from \Spotted\ShowBase
 *
 * @phpstan-type ShowBulkGetResponseShape = array{
 *   shows: list<ShowBase|ShowBaseShape>
 * }
 */
final class ShowBulkGetResponse implements BaseModel
{
    /** @use SdkModel<ShowBulkGetResponseShape> */
    use SdkModel;

    /** @var list<ShowBase> $shows */
    #[Required(list: ShowBase::class)]
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
     * @param list<ShowBase|ShowBaseShape> $shows
     */
    public static function with(array $shows): self
    {
        $self = new self;

        $self['shows'] = $shows;

        return $self;
    }

    /**
     * @param list<ShowBase|ShowBaseShape> $shows
     */
    public function withShows(array $shows): self
    {
        $self = clone $this;
        $self['shows'] = $shows;

        return $self;
    }
}
