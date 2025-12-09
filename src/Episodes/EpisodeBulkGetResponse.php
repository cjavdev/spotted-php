<?php

declare(strict_types=1);

namespace Spotted\Episodes;

use Spotted\Core\Attributes\Required;
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
    #[Required(list: EpisodeObject::class)]
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
     *   audioPreviewURL: string|null,
     *   description: string,
     *   durationMs: int,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isExternallyHosted: bool,
     *   isPlayable: bool,
     *   languages: list<string>,
     *   name: string,
     *   releaseDate: string,
     *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type?: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resumePoint?: ResumePointObject|null,
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
     *   audioPreviewURL: string|null,
     *   description: string,
     *   durationMs: int,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isExternallyHosted: bool,
     *   isPlayable: bool,
     *   languages: list<string>,
     *   name: string,
     *   releaseDate: string,
     *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
     *   show: ShowBase,
     *   type?: 'episode',
     *   uri: string,
     *   language?: string|null,
     *   restrictions?: EpisodeRestrictionObject|null,
     *   resumePoint?: ResumePointObject|null,
     * }> $episodes
     */
    public function withEpisodes(array $episodes): self
    {
        $obj = clone $this;
        $obj['episodes'] = $episodes;

        return $obj;
    }
}
