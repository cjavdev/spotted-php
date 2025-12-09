<?php

declare(strict_types=1);

namespace Spotted\Shows;

use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\ShowBase;

/**
 * @phpstan-type ShowBulkGetResponseShape = array{shows: list<ShowBase>}
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
     * @param list<ShowBase|array{
     *   id: string,
     *   available_markets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   is_externally_hosted: bool,
     *   languages: list<string>,
     *   media_type: string,
     *   name: string,
     *   publisher: string,
     *   total_episodes: int,
     *   type: 'show',
     *   uri: string,
     * }> $shows
     */
    public static function with(array $shows): self
    {
        $obj = new self;

        $obj['shows'] = $shows;

        return $obj;
    }

    /**
     * @param list<ShowBase|array{
     *   id: string,
     *   available_markets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   is_externally_hosted: bool,
     *   languages: list<string>,
     *   media_type: string,
     *   name: string,
     *   publisher: string,
     *   total_episodes: int,
     *   type: 'show',
     *   uri: string,
     * }> $shows
     */
    public function withShows(array $shows): self
    {
        $obj = clone $this;
        $obj['shows'] = $shows;

        return $obj;
    }
}
