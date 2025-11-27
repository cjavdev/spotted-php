<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\SimplifiedEpisodeObject\ReleaseDatePrecision;

/**
 * @phpstan-type SimplifiedEpisodeObjectShape = array{
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
 *   type: 'episode',
 *   uri: string,
 *   language?: string|null,
 *   restrictions?: EpisodeRestrictionObject|null,
 *   resume_point?: ResumePointObject|null,
 * }
 */
final class SimplifiedEpisodeObject implements BaseModel
{
    /** @use SdkModel<SimplifiedEpisodeObjectShape> */
    use SdkModel;

    /**
     * The object type.
     *
     * @var 'episode' $type
     */
    #[Api]
    public string $type = 'episode';

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the episode.
     */
    #[Api]
    public string $id;

    /**
     * @deprecated
     *
     * A URL to a 30 second preview (MP3 format) of the episode. `null` if not available.
     */
    #[Api]
    public ?string $audio_preview_url;

    /**
     * A description of the episode. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    #[Api]
    public string $description;

    /**
     * The episode length in milliseconds.
     */
    #[Api]
    public int $duration_ms;

    /**
     * Whether or not the episode has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    #[Api]
    public bool $explicit;

    /**
     * External URLs for this episode.
     */
    #[Api]
    public ExternalURLObject $external_urls;

    /**
     * A link to the Web API endpoint providing full details of the episode.
     */
    #[Api]
    public string $href;

    /**
     * A description of the episode. This field may contain HTML tags.
     */
    #[Api]
    public string $html_description;

    /**
     * The cover art for the episode in various sizes, widest first.
     *
     * @var list<ImageObject> $images
     */
    #[Api(list: ImageObject::class)]
    public array $images;

    /**
     * True if the episode is hosted outside of Spotify's CDN.
     */
    #[Api]
    public bool $is_externally_hosted;

    /**
     * True if the episode is playable in the given market. Otherwise false.
     */
    #[Api]
    public bool $is_playable;

    /**
     * A list of the languages used in the episode, identified by their [ISO 639-1](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @var list<string> $languages
     */
    #[Api(list: 'string')]
    public array $languages;

    /**
     * The name of the episode.
     */
    #[Api]
    public string $name;

    /**
     * The date the episode was first released, for example `"1981-12-15"`. Depending on the precision, it might be shown as `"1981"` or `"1981-12"`.
     */
    #[Api]
    public string $release_date;

    /**
     * The precision with which `release_date` value is known.
     *
     * @var value-of<ReleaseDatePrecision> $release_date_precision
     */
    #[Api(enum: ReleaseDatePrecision::class)]
    public string $release_date_precision;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the episode.
     */
    #[Api]
    public string $uri;

    /**
     * @deprecated
     *
     * The language used in the episode, identified by a [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code. This field is deprecated and might be removed in the future. Please use the `languages` field instead.
     */
    #[Api(optional: true)]
    public ?string $language;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Api(optional: true)]
    public ?EpisodeRestrictionObject $restrictions;

    /**
     * The user's most recent position in the episode. Set if the supplied access token is a user token and has the scope 'user-read-playback-position'.
     */
    #[Api(optional: true)]
    public ?ResumePointObject $resume_point;

    /**
     * `new SimplifiedEpisodeObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplifiedEpisodeObject::with(
     *   id: ...,
     *   audio_preview_url: ...,
     *   description: ...,
     *   duration_ms: ...,
     *   explicit: ...,
     *   external_urls: ...,
     *   href: ...,
     *   html_description: ...,
     *   images: ...,
     *   is_externally_hosted: ...,
     *   is_playable: ...,
     *   languages: ...,
     *   name: ...,
     *   release_date: ...,
     *   release_date_precision: ...,
     *   uri: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimplifiedEpisodeObject)
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
     * @param list<ImageObject> $images
     * @param list<string> $languages
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $release_date_precision
     */
    public static function with(
        string $id,
        ?string $audio_preview_url,
        string $description,
        int $duration_ms,
        bool $explicit,
        ExternalURLObject $external_urls,
        string $href,
        string $html_description,
        array $images,
        bool $is_externally_hosted,
        bool $is_playable,
        array $languages,
        string $name,
        string $release_date,
        ReleaseDatePrecision|string $release_date_precision,
        string $uri,
        ?string $language = null,
        ?EpisodeRestrictionObject $restrictions = null,
        ?ResumePointObject $resume_point = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->audio_preview_url = $audio_preview_url;
        $obj->description = $description;
        $obj->duration_ms = $duration_ms;
        $obj->explicit = $explicit;
        $obj->external_urls = $external_urls;
        $obj->href = $href;
        $obj->html_description = $html_description;
        $obj->images = $images;
        $obj->is_externally_hosted = $is_externally_hosted;
        $obj->is_playable = $is_playable;
        $obj->languages = $languages;
        $obj->name = $name;
        $obj->release_date = $release_date;
        $obj['release_date_precision'] = $release_date_precision;
        $obj->uri = $uri;

        null !== $language && $obj->language = $language;
        null !== $restrictions && $obj->restrictions = $restrictions;
        null !== $resume_point && $obj->resume_point = $resume_point;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the episode.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * A URL to a 30 second preview (MP3 format) of the episode. `null` if not available.
     */
    public function withAudioPreviewURL(?string $audioPreviewURL): self
    {
        $obj = clone $this;
        $obj->audio_preview_url = $audioPreviewURL;

        return $obj;
    }

    /**
     * A description of the episode. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * The episode length in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $obj = clone $this;
        $obj->duration_ms = $durationMs;

        return $obj;
    }

    /**
     * Whether or not the episode has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $obj = clone $this;
        $obj->explicit = $explicit;

        return $obj;
    }

    /**
     * External URLs for this episode.
     */
    public function withExternalURLs(ExternalURLObject $externalURLs): self
    {
        $obj = clone $this;
        $obj->external_urls = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the episode.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * A description of the episode. This field may contain HTML tags.
     */
    public function withHTMLDescription(string $htmlDescription): self
    {
        $obj = clone $this;
        $obj->html_description = $htmlDescription;

        return $obj;
    }

    /**
     * The cover art for the episode in various sizes, widest first.
     *
     * @param list<ImageObject> $images
     */
    public function withImages(array $images): self
    {
        $obj = clone $this;
        $obj->images = $images;

        return $obj;
    }

    /**
     * True if the episode is hosted outside of Spotify's CDN.
     */
    public function withIsExternallyHosted(bool $isExternallyHosted): self
    {
        $obj = clone $this;
        $obj->is_externally_hosted = $isExternallyHosted;

        return $obj;
    }

    /**
     * True if the episode is playable in the given market. Otherwise false.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $obj = clone $this;
        $obj->is_playable = $isPlayable;

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
        $obj->languages = $languages;

        return $obj;
    }

    /**
     * The name of the episode.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The date the episode was first released, for example `"1981-12-15"`. Depending on the precision, it might be shown as `"1981"` or `"1981-12"`.
     */
    public function withReleaseDate(string $releaseDate): self
    {
        $obj = clone $this;
        $obj->release_date = $releaseDate;

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
        $obj['release_date_precision'] = $releaseDatePrecision;

        return $obj;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the episode.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }

    /**
     * The language used in the episode, identified by a [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code. This field is deprecated and might be removed in the future. Please use the `languages` field instead.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }

    /**
     * Included in the response when a content restriction is applied.
     */
    public function withRestrictions(
        EpisodeRestrictionObject $restrictions
    ): self {
        $obj = clone $this;
        $obj->restrictions = $restrictions;

        return $obj;
    }

    /**
     * The user's most recent position in the episode. Set if the supplied access token is a user token and has the scope 'user-read-playback-position'.
     */
    public function withResumePoint(ResumePointObject $resumePoint): self
    {
        $obj = clone $this;
        $obj->resume_point = $resumePoint;

        return $obj;
    }
}
