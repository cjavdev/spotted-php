<?php

declare(strict_types=1);

namespace Spotted\Chapters\ChapterBulkGetResponse;

use Spotted\AudiobookBase;
use Spotted\ChapterRestrictionObject;
use Spotted\Chapters\ChapterBulkGetResponse\Chapter\ReleaseDatePrecision;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\ResumePointObject;

/**
 * @phpstan-type ChapterShape = array{
 *   id: string,
 *   audio_preview_url: string|null,
 *   audiobook: AudiobookBase,
 *   chapter_number: int,
 *   description: string,
 *   duration_ms: int,
 *   explicit: bool,
 *   external_urls: ExternalURLObject,
 *   href: string,
 *   html_description: string,
 *   images: list<ImageObject>,
 *   is_playable: bool,
 *   languages: list<string>,
 *   name: string,
 *   release_date: string,
 *   release_date_precision: value-of<ReleaseDatePrecision>,
 *   type: "episode",
 *   uri: string,
 *   available_markets?: list<string>|null,
 *   restrictions?: ChapterRestrictionObject|null,
 *   resume_point?: ResumePointObject|null,
 * }
 */
final class Chapter implements BaseModel
{
    /** @use SdkModel<ChapterShape> */
    use SdkModel;

    /**
     * The object type.
     *
     * @var "episode" $type
     */
    #[Api]
    public string $type = 'episode';

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the chapter.
     */
    #[Api]
    public string $id;

    /**
     * @deprecated
     *
     * A URL to a 30 second preview (MP3 format) of the chapter. `null` if not available.
     */
    #[Api]
    public ?string $audio_preview_url;

    /**
     * The audiobook for which the chapter belongs.
     */
    #[Api]
    public AudiobookBase $audiobook;

    /**
     * The number of the chapter.
     */
    #[Api]
    public int $chapter_number;

    /**
     * A description of the chapter. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    #[Api]
    public string $description;

    /**
     * The chapter length in milliseconds.
     */
    #[Api]
    public int $duration_ms;

    /**
     * Whether or not the chapter has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    #[Api]
    public bool $explicit;

    /**
     * External URLs for this chapter.
     */
    #[Api]
    public ExternalURLObject $external_urls;

    /**
     * A link to the Web API endpoint providing full details of the chapter.
     */
    #[Api]
    public string $href;

    /**
     * A description of the chapter. This field may contain HTML tags.
     */
    #[Api]
    public string $html_description;

    /**
     * The cover art for the chapter in various sizes, widest first.
     *
     * @var list<ImageObject> $images
     */
    #[Api(list: ImageObject::class)]
    public array $images;

    /**
     * True if the chapter is playable in the given market. Otherwise false.
     */
    #[Api]
    public bool $is_playable;

    /**
     * A list of the languages used in the chapter, identified by their [ISO 639-1](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @var list<string> $languages
     */
    #[Api(list: 'string')]
    public array $languages;

    /**
     * The name of the chapter.
     */
    #[Api]
    public string $name;

    /**
     * The date the chapter was first released, for example `"1981-12-15"`. Depending on the precision, it might be shown as `"1981"` or `"1981-12"`.
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
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the chapter.
     */
    #[Api]
    public string $uri;

    /**
     * A list of the countries in which the chapter can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @var list<string>|null $available_markets
     */
    #[Api(list: 'string', optional: true)]
    public ?array $available_markets;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Api(optional: true)]
    public ?ChapterRestrictionObject $restrictions;

    /**
     * The user's most recent position in the chapter. Set if the supplied access token is a user token and has the scope 'user-read-playback-position'.
     */
    #[Api(optional: true)]
    public ?ResumePointObject $resume_point;

    /**
     * `new Chapter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Chapter::with(
     *   id: ...,
     *   audio_preview_url: ...,
     *   audiobook: ...,
     *   chapter_number: ...,
     *   description: ...,
     *   duration_ms: ...,
     *   explicit: ...,
     *   external_urls: ...,
     *   href: ...,
     *   html_description: ...,
     *   images: ...,
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
     * (new Chapter)
     *   ->withID(...)
     *   ->withAudioPreviewURL(...)
     *   ->withAudiobook(...)
     *   ->withChapterNumber(...)
     *   ->withDescription(...)
     *   ->withDurationMs(...)
     *   ->withExplicit(...)
     *   ->withExternalURLs(...)
     *   ->withHref(...)
     *   ->withHTMLDescription(...)
     *   ->withImages(...)
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
     * @param list<string> $available_markets
     */
    public static function with(
        string $id,
        ?string $audio_preview_url,
        AudiobookBase $audiobook,
        int $chapter_number,
        string $description,
        int $duration_ms,
        bool $explicit,
        ExternalURLObject $external_urls,
        string $href,
        string $html_description,
        array $images,
        bool $is_playable,
        array $languages,
        string $name,
        string $release_date,
        ReleaseDatePrecision|string $release_date_precision,
        string $uri,
        ?array $available_markets = null,
        ?ChapterRestrictionObject $restrictions = null,
        ?ResumePointObject $resume_point = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->audio_preview_url = $audio_preview_url;
        $obj->audiobook = $audiobook;
        $obj->chapter_number = $chapter_number;
        $obj->description = $description;
        $obj->duration_ms = $duration_ms;
        $obj->explicit = $explicit;
        $obj->external_urls = $external_urls;
        $obj->href = $href;
        $obj->html_description = $html_description;
        $obj->images = $images;
        $obj->is_playable = $is_playable;
        $obj->languages = $languages;
        $obj->name = $name;
        $obj->release_date = $release_date;
        $obj['release_date_precision'] = $release_date_precision;
        $obj->uri = $uri;

        null !== $available_markets && $obj->available_markets = $available_markets;
        null !== $restrictions && $obj->restrictions = $restrictions;
        null !== $resume_point && $obj->resume_point = $resume_point;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the chapter.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * A URL to a 30 second preview (MP3 format) of the chapter. `null` if not available.
     */
    public function withAudioPreviewURL(?string $audioPreviewURL): self
    {
        $obj = clone $this;
        $obj->audio_preview_url = $audioPreviewURL;

        return $obj;
    }

    /**
     * The audiobook for which the chapter belongs.
     */
    public function withAudiobook(AudiobookBase $audiobook): self
    {
        $obj = clone $this;
        $obj->audiobook = $audiobook;

        return $obj;
    }

    /**
     * The number of the chapter.
     */
    public function withChapterNumber(int $chapterNumber): self
    {
        $obj = clone $this;
        $obj->chapter_number = $chapterNumber;

        return $obj;
    }

    /**
     * A description of the chapter. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * The chapter length in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $obj = clone $this;
        $obj->duration_ms = $durationMs;

        return $obj;
    }

    /**
     * Whether or not the chapter has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $obj = clone $this;
        $obj->explicit = $explicit;

        return $obj;
    }

    /**
     * External URLs for this chapter.
     */
    public function withExternalURLs(ExternalURLObject $externalURLs): self
    {
        $obj = clone $this;
        $obj->external_urls = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the chapter.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * A description of the chapter. This field may contain HTML tags.
     */
    public function withHTMLDescription(string $htmlDescription): self
    {
        $obj = clone $this;
        $obj->html_description = $htmlDescription;

        return $obj;
    }

    /**
     * The cover art for the chapter in various sizes, widest first.
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
     * True if the chapter is playable in the given market. Otherwise false.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $obj = clone $this;
        $obj->is_playable = $isPlayable;

        return $obj;
    }

    /**
     * A list of the languages used in the chapter, identified by their [ISO 639-1](https://en.wikipedia.org/wiki/ISO_639) code.
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
     * The name of the chapter.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The date the chapter was first released, for example `"1981-12-15"`. Depending on the precision, it might be shown as `"1981"` or `"1981-12"`.
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
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the chapter.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }

    /**
     * A list of the countries in which the chapter can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @param list<string> $availableMarkets
     */
    public function withAvailableMarkets(array $availableMarkets): self
    {
        $obj = clone $this;
        $obj->available_markets = $availableMarkets;

        return $obj;
    }

    /**
     * Included in the response when a content restriction is applied.
     */
    public function withRestrictions(
        ChapterRestrictionObject $restrictions
    ): self {
        $obj = clone $this;
        $obj->restrictions = $restrictions;

        return $obj;
    }

    /**
     * The user's most recent position in the chapter. Set if the supplied access token is a user token and has the scope 'user-read-playback-position'.
     */
    public function withResumePoint(ResumePointObject $resumePoint): self
    {
        $obj = clone $this;
        $obj->resume_point = $resumePoint;

        return $obj;
    }
}
