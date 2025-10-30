<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\SimplifiedEpisodeObject\ReleaseDatePrecision;
use Spotted\SimplifiedEpisodeObject\Type;

/**
 * @phpstan-type SimplifiedEpisodeObjectShape = array{
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
 *   type: value-of<Type>,
 *   uri: string,
 *   language?: string,
 *   restrictions?: EpisodeRestrictionObject,
 *   resumePoint?: ResumePointObject,
 * }
 */
final class SimplifiedEpisodeObject implements BaseModel
{
    /** @use SdkModel<SimplifiedEpisodeObjectShape> */
    use SdkModel;

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
    #[Api('audio_preview_url')]
    public ?string $audioPreviewURL;

    /**
     * A description of the episode. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    #[Api]
    public string $description;

    /**
     * The episode length in milliseconds.
     */
    #[Api('duration_ms')]
    public int $durationMs;

    /**
     * Whether or not the episode has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    #[Api]
    public bool $explicit;

    /**
     * External URLs for this episode.
     */
    #[Api('external_urls')]
    public ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the episode.
     */
    #[Api]
    public string $href;

    /**
     * A description of the episode. This field may contain HTML tags.
     */
    #[Api('html_description')]
    public string $htmlDescription;

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
    #[Api('is_externally_hosted')]
    public bool $isExternallyHosted;

    /**
     * True if the episode is playable in the given market. Otherwise false.
     */
    #[Api('is_playable')]
    public bool $isPlayable;

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
    #[Api('release_date')]
    public string $releaseDate;

    /**
     * The precision with which `release_date` value is known.
     *
     * @var value-of<ReleaseDatePrecision> $releaseDatePrecision
     */
    #[Api('release_date_precision', enum: ReleaseDatePrecision::class)]
    public string $releaseDatePrecision;

    /**
     * The object type.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

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
    #[Api('resume_point', optional: true)]
    public ?ResumePointObject $resumePoint;

    /**
     * `new SimplifiedEpisodeObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplifiedEpisodeObject::with(
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
     *   type: ...,
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
     *   ->withType(...)
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
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        ?string $audioPreviewURL,
        string $description,
        int $durationMs,
        bool $explicit,
        ExternalURLObject $externalURLs,
        string $href,
        string $htmlDescription,
        array $images,
        bool $isExternallyHosted,
        bool $isPlayable,
        array $languages,
        string $name,
        string $releaseDate,
        ReleaseDatePrecision|string $releaseDatePrecision,
        Type|string $type,
        string $uri,
        ?string $language = null,
        ?EpisodeRestrictionObject $restrictions = null,
        ?ResumePointObject $resumePoint = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->audioPreviewURL = $audioPreviewURL;
        $obj->description = $description;
        $obj->durationMs = $durationMs;
        $obj->explicit = $explicit;
        $obj->externalURLs = $externalURLs;
        $obj->href = $href;
        $obj->htmlDescription = $htmlDescription;
        $obj->images = $images;
        $obj->isExternallyHosted = $isExternallyHosted;
        $obj->isPlayable = $isPlayable;
        $obj->languages = $languages;
        $obj->name = $name;
        $obj->releaseDate = $releaseDate;
        $obj['releaseDatePrecision'] = $releaseDatePrecision;
        $obj['type'] = $type;
        $obj->uri = $uri;

        null !== $language && $obj->language = $language;
        null !== $restrictions && $obj->restrictions = $restrictions;
        null !== $resumePoint && $obj->resumePoint = $resumePoint;

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
        $obj->audioPreviewURL = $audioPreviewURL;

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
        $obj->durationMs = $durationMs;

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
        $obj->externalURLs = $externalURLs;

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
        $obj->htmlDescription = $htmlDescription;

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
        $obj->isExternallyHosted = $isExternallyHosted;

        return $obj;
    }

    /**
     * True if the episode is playable in the given market. Otherwise false.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $obj = clone $this;
        $obj->isPlayable = $isPlayable;

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
        $obj->releaseDate = $releaseDate;

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
     * The object type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

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
        $obj->resumePoint = $resumePoint;

        return $obj;
    }
}
