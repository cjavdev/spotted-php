<?php

declare(strict_types=1);

namespace Spotted\Episodes;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\EpisodeObject;
use Spotted\EpisodeObject\ReleaseDatePrecision;
use Spotted\EpisodeRestrictionObject;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\ResumePointObject;
use Spotted\ShowBase;

/**
 * @phpstan-type EpisodeBulkGetResponseShape = array{episodes: list<EpisodeObject>}
 */
final class EpisodeBulkGetResponse implements BaseModel
{
    /** @use SdkModel<EpisodeBulkGetResponseShape> */
    use SdkModel;

    /** @var list<EpisodeObject> $episodes */
    #[Api(list: EpisodeObject::class)]
    public array $episodes;

    /**
     * `new EpisodeBulkGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EpisodeBulkGetResponse::with(episodes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EpisodeBulkGetResponse)->withEpisodes(...)
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
     * @param list<EpisodeObject|array{
     *   id: string,
     *   audio_preview_url: string|null,
     *   description: string,
     *   duration_ms: int,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   is_externally_hosted: bool,
     *   is_playable: bool,
     *   languages: list<string>,
     *   name: string,
     *   release_date: string,
     *   release_date_precision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resume_point?: ResumePointObject|null,
     * }> $episodes
     */
    public static function with(array $episodes): self
    {
        $obj = new self;

        $obj['episodes'] = $episodes;

        return $obj;
    }

    /**
     * @param list<EpisodeObject|array{
     *   id: string,
     *   audio_preview_url: string|null,
     *   description: string,
     *   duration_ms: int,
     *   explicit: bool,
     *   external_urls: ExternalURLObject,
     *   href: string,
     *   html_description: string,
     *   images: list<ImageObject>,
     *   is_externally_hosted: bool,
     *   is_playable: bool,
     *   languages: list<string>,
     *   name: string,
     *   release_date: string,
     *   release_date_precision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resume_point?: ResumePointObject|null,
     * }> $episodes
     */
    public function withEpisodes(array $episodes): self
    {
        $obj = clone $this;
        $obj['episodes'] = $episodes;

        return $obj;
    }
}
