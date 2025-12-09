<?php

declare(strict_types=1);

namespace Spotted\Audiobooks;

use Spotted\Audiobooks\SimplifiedChapterObject\ReleaseDatePrecision;
use Spotted\ChapterRestrictionObject;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\ResumePointObject;

/**
 * @phpstan-type SimplifiedChapterObjectShape = array{
 *   id: string,
 *   audioPreviewURL: string|null,
 *   chapterNumber: int,
 *   description: string,
 *   durationMs: int,
 *   explicit: bool,
 *   externalURLs: ExternalURLObject,
 *   href: string,
 *   htmlDescription: string,
 *   images: list<ImageObject>,
 *   isPlayable: bool,
 *   languages: list<string>,
 *   name: string,
 *   releaseDate: string,
 *   releaseDatePrecision: value-of<ReleaseDatePrecision>,
 *   type?: 'episode',
 *   uri: string,
 *   availableMarkets?: list<string>|null,
 *   restrictions?: ChapterRestrictionObject|null,
 *   resumePoint?: ResumePointObject|null,
 * }
 */
final class SimplifiedChapterObject implements BaseModel
{
    /** @use SdkModel<SimplifiedChapterObjectShape> */
    use SdkModel;

    /**
     * The object type.
     *
     * @var 'episode' $type
     */
    #[Required]
    public string $type = 'episode';

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the chapter.
     */
    #[Required]
    public string $id;

    /**
     * @deprecated
     *
     * A URL to a 30 second preview (MP3 format) of the chapter. `null` if not available.
     */
    #[Required('audio_preview_url')]
    public ?string $audioPreviewURL;

    /**
     * The number of the chapter.
     */
    #[Required('chapter_number')]
    public int $chapterNumber;

    /**
     * A description of the chapter. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    #[Required]
    public string $description;

    /**
     * The chapter length in milliseconds.
     */
    #[Required('duration_ms')]
    public int $durationMs;

    /**
     * Whether or not the chapter has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    #[Required]
    public bool $explicit;

    /**
     * External URLs for this chapter.
     */
    #[Required('external_urls')]
    public ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the chapter.
     */
    #[Required]
    public string $href;

    /**
     * A description of the chapter. This field may contain HTML tags.
     */
    #[Required('html_description')]
    public string $htmlDescription;

    /**
     * The cover art for the chapter in various sizes, widest first.
     *
     * @var list<ImageObject> $images
     */
    #[Required(list: ImageObject::class)]
    public array $images;

    /**
     * True if the chapter is playable in the given market. Otherwise false.
     */
    #[Required('is_playable')]
    public bool $isPlayable;

    /**
     * A list of the languages used in the chapter, identified by their [ISO 639-1](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @var list<string> $languages
     */
    #[Required(list: 'string')]
    public array $languages;

    /**
     * The name of the chapter.
     */
    #[Required]
    public string $name;

    /**
     * The date the chapter was first released, for example `"1981-12-15"`. Depending on the precision, it might be shown as `"1981"` or `"1981-12"`.
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
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the chapter.
     */
    #[Required]
    public string $uri;

    /**
     * A list of the countries in which the chapter can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @var list<string>|null $availableMarkets
     */
    #[Optional('available_markets', list: 'string')]
    public ?array $availableMarkets;

    /**
     * Included in the response when a content restriction is applied.
     */
    #[Optional]
    public ?ChapterRestrictionObject $restrictions;

    /**
     * The user's most recent position in the chapter. Set if the supplied access token is a user token and has the scope 'user-read-playback-position'.
     */
    #[Optional('resume_point')]
    public ?ResumePointObject $resumePoint;

    /**
     * `new SimplifiedChapterObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplifiedChapterObject::with(
     *   id: ...,
     *   audioPreviewURL: ...,
     *   chapterNumber: ...,
     *   description: ...,
     *   durationMs: ...,
     *   explicit: ...,
     *   externalURLs: ...,
     *   href: ...,
     *   htmlDescription: ...,
     *   images: ...,
     *   isPlayable: ...,
     *   languages: ...,
     *   name: ...,
     *   releaseDate: ...,
     *   releaseDatePrecision: ...,
     *   uri: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimplifiedChapterObject)
     *   ->withID(...)
     *   ->withAudioPreviewURL(...)
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
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $images
     * @param list<string> $languages
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     * @param list<string> $availableMarkets
     * @param ChapterRestrictionObject|array{reason?: string|null} $restrictions
     * @param ResumePointObject|array{
     *   fullyPlayed?: bool|null, resumePositionMs?: int|null
     * } $resumePoint
     */
    public static function with(
        string $id,
        ?string $audioPreviewURL,
        int $chapterNumber,
        string $description,
        int $durationMs,
        bool $explicit,
        ExternalURLObject|array $externalURLs,
        string $href,
        string $htmlDescription,
        array $images,
        bool $isPlayable,
        array $languages,
        string $name,
        string $releaseDate,
        ReleaseDatePrecision|string $releaseDatePrecision,
        string $uri,
        ?array $availableMarkets = null,
        ChapterRestrictionObject|array|null $restrictions = null,
        ResumePointObject|array|null $resumePoint = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['audioPreviewURL'] = $audioPreviewURL;
        $obj['chapterNumber'] = $chapterNumber;
        $obj['description'] = $description;
        $obj['durationMs'] = $durationMs;
        $obj['explicit'] = $explicit;
        $obj['externalURLs'] = $externalURLs;
        $obj['href'] = $href;
        $obj['htmlDescription'] = $htmlDescription;
        $obj['images'] = $images;
        $obj['isPlayable'] = $isPlayable;
        $obj['languages'] = $languages;
        $obj['name'] = $name;
        $obj['releaseDate'] = $releaseDate;
        $obj['releaseDatePrecision'] = $releaseDatePrecision;
        $obj['uri'] = $uri;

        null !== $availableMarkets && $obj['availableMarkets'] = $availableMarkets;
        null !== $restrictions && $obj['restrictions'] = $restrictions;
        null !== $resumePoint && $obj['resumePoint'] = $resumePoint;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the chapter.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * A URL to a 30 second preview (MP3 format) of the chapter. `null` if not available.
     */
    public function withAudioPreviewURL(?string $audioPreviewURL): self
    {
        $obj = clone $this;
        $obj['audioPreviewURL'] = $audioPreviewURL;

        return $obj;
    }

    /**
     * The number of the chapter.
     */
    public function withChapterNumber(int $chapterNumber): self
    {
        $obj = clone $this;
        $obj['chapterNumber'] = $chapterNumber;

        return $obj;
    }

    /**
     * A description of the chapter. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * The chapter length in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $obj = clone $this;
        $obj['durationMs'] = $durationMs;

        return $obj;
    }

    /**
     * Whether or not the chapter has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $obj = clone $this;
        $obj['explicit'] = $explicit;

        return $obj;
    }

    /**
     * External URLs for this chapter.
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
     * A link to the Web API endpoint providing full details of the chapter.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * A description of the chapter. This field may contain HTML tags.
     */
    public function withHTMLDescription(string $htmlDescription): self
    {
        $obj = clone $this;
        $obj['htmlDescription'] = $htmlDescription;

        return $obj;
    }

    /**
     * The cover art for the chapter in various sizes, widest first.
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
     * True if the chapter is playable in the given market. Otherwise false.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $obj = clone $this;
        $obj['isPlayable'] = $isPlayable;

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
        $obj['languages'] = $languages;

        return $obj;
    }

    /**
     * The name of the chapter.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The date the chapter was first released, for example `"1981-12-15"`. Depending on the precision, it might be shown as `"1981"` or `"1981-12"`.
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
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the chapter.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

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
        $obj['availableMarkets'] = $availableMarkets;

        return $obj;
    }

    /**
     * Included in the response when a content restriction is applied.
     *
     * @param ChapterRestrictionObject|array{reason?: string|null} $restrictions
     */
    public function withRestrictions(
        ChapterRestrictionObject|array $restrictions
    ): self {
        $obj = clone $this;
        $obj['restrictions'] = $restrictions;

        return $obj;
    }

    /**
     * The user's most recent position in the chapter. Set if the supplied access token is a user token and has the scope 'user-read-playback-position'.
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
