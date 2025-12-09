<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\EpisodeObject\ReleaseDatePrecision;

/**
 * @phpstan-type EpisodeObjectShape = array{
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
 * }
 */
final class EpisodeObject implements BaseModel
{
    /** @use SdkModel<EpisodeObjectShape> */
    use SdkModel;

    /**
     * The object type.
     *
     * @var 'episode' $type
     */
    #[Required]
    public string $type = 'episode';

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the episode.
     */
    #[Required]
    public string $id;

    /**
     * @deprecated
     *
     * A URL to a 30 second preview (MP3 format) of the episode. `null` if not available.
     */
    #[Required('audio_preview_url')]
    public ?string $audioPreviewURL;

    /**
     * A description of the episode. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    #[Required]
    public string $description;

    /**
     * The episode length in milliseconds.
     */
    #[Required('duration_ms')]
    public int $durationMs;

    /**
     * Whether or not the episode has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    #[Required]
    public bool $explicit;

    /**
     * External URLs for this episode.
     */
    #[Required('external_urls')]
    public ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the episode.
     */
    #[Required]
    public string $href;

    /**
     * A description of the episode. This field may contain HTML tags.
     */
    #[Required('html_description')]
    public string $htmlDescription;

    /**
     * The cover art for the episode in various sizes, widest first.
     *
     * @var list<ImageObject> $images
     */
    #[Required(list: ImageObject::class)]
    public array $images;

    /**
     * True if the episode is hosted outside of Spotify's CDN.
     */
    #[Required('is_externally_hosted')]
    public bool $isExternallyHosted;

    /**
     * True if the episode is playable in the given market. Otherwise false.
     */
    #[Required('is_playable')]
    public bool $isPlayable;

    /**
     * A list of the languages used in the episode, identified by their [ISO 639-1](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @var list<string> $languages
     */
    #[Required(list: 'string')]
    public array $languages;

    /**
     * The name of the episode.
     */
    #[Required]
    public string $name;

    /**
     * The date the episode was first released, for example `"1981-12-15"`. Depending on the precision, it might be shown as `"1981"` or `"1981-12"`.
     */
    #[Required('release_date')]
    public string $releaseDate;

    /**
     * The precision with which `release_date` value is known.
     *
     * @var value-of<ReleaseDatePrecision> $releaseDatePrecision
     */
    #[Required('release_date_precision', enum: ReleaseDatePrecision::class)]
    public string $releaseDatePrecision;

    /**
     * The show on which the episode belongs.
     */
    #[Required]
    public ShowBase $show;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the episode.
     */
    #[Required]
    public string $uri;

    /**
     * @deprecated
     *
     * The language used in the episode, identified by a [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code. This field is deprecated and might be removed in the future. Please use the `languages` field instead.
     */
    #[Optional]
    public ?string $language;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Optional]
    public ?EpisodeRestrictionObject $restrictions;

    /**
     * The user's most recent position in the episode. Set if the supplied access token is a user token and has the scope 'user-read-playback-position'.
     */
    #[Optional('resume_point')]
    public ?ResumePointObject $resumePoint;

    /**
     * `new EpisodeObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EpisodeObject::with(
     *   id: ...,
     *   audioPreviewURL: ...,
     *   description: ...,
     *   durationMs: ...,
     *   explicit: ...,
     *   externalURLs: ...,
     *   href: ...,
     *   htmlDescription: ...,
     *   images: ...,
     *   isExternallyHosted: ...,
     *   isPlayable: ...,
     *   languages: ...,
     *   name: ...,
     *   releaseDate: ...,
     *   releaseDatePrecision: ...,
     *   show: ...,
     *   uri: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EpisodeObject)
     *   ->withID(...)
     *   ->withAudioPreviewURL(...)
     *   ->withDescription(...)
     *   ->withDurationMs(...)
     *   ->withExplicit(...)
     *   ->withExternalURLs(...)
     *   ->withHref(...)
     *   ->withHTMLDescription(...)
     *   ->withImages(...)
     *   ->withIsExternallyHosted(...)
     *   ->withIsPlayable(...)
     *   ->withLanguages(...)
     *   ->withName(...)
     *   ->withReleaseDate(...)
     *   ->withReleaseDatePrecision(...)
     *   ->withShow(...)
     *   ->withUri(...)
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
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $images
     * @param list<string> $languages
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     * @param ShowBase|array{
     *   id: string,
     *   availableMarkets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isExternallyHosted: bool,
     *   languages: list<string>,
     *   mediaType: string,
     *   name: string,
     *   publisher: string,
     *   totalEpisodes: int,
     *   type?: 'show',
     *   uri: string,
     * } $show
     * @param EpisodeRestrictionObject|array{reason?: string|null} $restrictions
     * @param ResumePointObject|array{
     *   fullyPlayed?: bool|null, resumePositionMs?: int|null
     * } $resumePoint
     */
    public static function with(
        string $id,
        ?string $audioPreviewURL,
        string $description,
        int $durationMs,
        bool $explicit,
        ExternalURLObject|array $externalURLs,
        string $href,
        string $htmlDescription,
        array $images,
        bool $isExternallyHosted,
        bool $isPlayable,
        array $languages,
        string $name,
        string $releaseDate,
        ReleaseDatePrecision|string $releaseDatePrecision,
        ShowBase|array $show,
        string $uri,
        ?string $language = null,
        EpisodeRestrictionObject|array|null $restrictions = null,
        ResumePointObject|array|null $resumePoint = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['audioPreviewURL'] = $audioPreviewURL;
        $obj['description'] = $description;
        $obj['durationMs'] = $durationMs;
        $obj['explicit'] = $explicit;
        $obj['externalURLs'] = $externalURLs;
        $obj['href'] = $href;
        $obj['htmlDescription'] = $htmlDescription;
        $obj['images'] = $images;
        $obj['isExternallyHosted'] = $isExternallyHosted;
        $obj['isPlayable'] = $isPlayable;
        $obj['languages'] = $languages;
        $obj['name'] = $name;
        $obj['releaseDate'] = $releaseDate;
        $obj['releaseDatePrecision'] = $releaseDatePrecision;
        $obj['show'] = $show;
        $obj['uri'] = $uri;

        null !== $language && $obj['language'] = $language;
        null !== $restrictions && $obj['restrictions'] = $restrictions;
        null !== $resumePoint && $obj['resumePoint'] = $resumePoint;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the episode.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * A URL to a 30 second preview (MP3 format) of the episode. `null` if not available.
     */
    public function withAudioPreviewURL(?string $audioPreviewURL): self
    {
        $obj = clone $this;
        $obj['audioPreviewURL'] = $audioPreviewURL;

        return $obj;
    }

    /**
     * A description of the episode. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * The episode length in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $obj = clone $this;
        $obj['durationMs'] = $durationMs;

        return $obj;
    }

    /**
     * Whether or not the episode has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $obj = clone $this;
        $obj['explicit'] = $explicit;

        return $obj;
    }

    /**
     * External URLs for this episode.
     *
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     */
    public function withExternalURLs(
        ExternalURLObject|array $externalURLs
    ): self {
        $obj = clone $this;
        $obj['externalURLs'] = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the episode.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * A description of the episode. This field may contain HTML tags.
     */
    public function withHTMLDescription(string $htmlDescription): self
    {
        $obj = clone $this;
        $obj['htmlDescription'] = $htmlDescription;

        return $obj;
    }

    /**
     * The cover art for the episode in various sizes, widest first.
     *
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $images
     */
    public function withImages(array $images): self
    {
        $obj = clone $this;
        $obj['images'] = $images;

        return $obj;
    }

    /**
     * True if the episode is hosted outside of Spotify's CDN.
     */
    public function withIsExternallyHosted(bool $isExternallyHosted): self
    {
        $obj = clone $this;
        $obj['isExternallyHosted'] = $isExternallyHosted;

        return $obj;
    }

    /**
     * True if the episode is playable in the given market. Otherwise false.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $obj = clone $this;
        $obj['isPlayable'] = $isPlayable;

        return $obj;
    }

    /**
     * A list of the languages used in the episode, identified by their [ISO 639-1](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @param list<string> $languages
     */
    public function withLanguages(array $languages): self
    {
        $obj = clone $this;
        $obj['languages'] = $languages;

        return $obj;
    }

    /**
     * The name of the episode.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The date the episode was first released, for example `"1981-12-15"`. Depending on the precision, it might be shown as `"1981"` or `"1981-12"`.
     */
    public function withReleaseDate(string $releaseDate): self
    {
        $obj = clone $this;
        $obj['releaseDate'] = $releaseDate;

        return $obj;
    }

    /**
     * The precision with which `release_date` value is known.
     *
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     */
    public function withReleaseDatePrecision(
        ReleaseDatePrecision|string $releaseDatePrecision
    ): self {
        $obj = clone $this;
        $obj['releaseDatePrecision'] = $releaseDatePrecision;

        return $obj;
    }

    /**
     * The show on which the episode belongs.
     *
     * @param ShowBase|array{
     *   id: string,
     *   availableMarkets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   isExternallyHosted: bool,
     *   languages: list<string>,
     *   mediaType: string,
     *   name: string,
     *   publisher: string,
     *   totalEpisodes: int,
     *   type?: 'show',
     *   uri: string,
     * } $show
     */
    public function withShow(ShowBase|array $show): self
    {
        $obj = clone $this;
        $obj['show'] = $show;

        return $obj;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the episode.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The language used in the episode, identified by a [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code. This field is deprecated and might be removed in the future. Please use the `languages` field instead.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * Included in the response when a content restriction is applied.
     *
     * @param EpisodeRestrictionObject|array{reason?: string|null} $restrictions
     */
    public function withRestrictions(
        EpisodeRestrictionObject|array $restrictions
    ): self {
        $obj = clone $this;
        $obj['restrictions'] = $restrictions;

        return $obj;
    }

    /**
     * The user's most recent position in the episode. Set if the supplied access token is a user token and has the scope 'user-read-playback-position'.
     *
     * @param ResumePointObject|array{
     *   fullyPlayed?: bool|null, resumePositionMs?: int|null
     * } $resumePoint
     */
    public function withResumePoint(ResumePointObject|array $resumePoint): self
    {
        $obj = clone $this;
        $obj['resumePoint'] = $resumePoint;

        return $obj;
    }
}
