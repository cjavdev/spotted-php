<?php

declare(strict_types=1);

namespace Spotted\Chapters\ChapterBulkGetResponse;

use Spotted\AudiobookBase;
use Spotted\ChapterRestrictionObject;
use Spotted\Chapters\ChapterBulkGetResponse\Chapter\ReleaseDatePrecision;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\ResumePointObject;

/**
 * @phpstan-import-type AudiobookBaseShape from \Spotted\AudiobookBase
 * @phpstan-import-type ExternalURLObjectShape from \Spotted\ExternalURLObject
 * @phpstan-import-type ImageObjectShape from \Spotted\ImageObject
 * @phpstan-import-type ChapterRestrictionObjectShape from \Spotted\ChapterRestrictionObject
 * @phpstan-import-type ResumePointObjectShape from \Spotted\ResumePointObject
 *
 * @phpstan-type ChapterShape = array{
 *   id: string,
 *   audioPreviewURL: string|null,
 *   audiobook: AudiobookBase|AudiobookBaseShape,
 *   chapterNumber: int,
 *   description: string,
 *   durationMs: int,
 *   explicit: bool,
 *   externalURLs: ExternalURLObject|ExternalURLObjectShape,
 *   href: string,
 *   htmlDescription: string,
 *   images: list<ImageObject|ImageObjectShape>,
 *   isPlayable: bool,
 *   languages: list<string>,
 *   name: string,
 *   releaseDate: string,
 *   releaseDatePrecision: ReleaseDatePrecision|value-of<ReleaseDatePrecision>,
 *   type: 'episode',
 *   uri: string,
 *   availableMarkets?: list<string>|null,
 *   published?: bool|null,
 *   restrictions?: null|ChapterRestrictionObject|ChapterRestrictionObjectShape,
 *   resumePoint?: null|ResumePointObject|ResumePointObjectShape,
 * }
 */
final class Chapter implements BaseModel
{
    /** @use SdkModel<ChapterShape> */
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
     * The audiobook for which the chapter belongs.
     */
    #[Required]
    public AudiobookBase $audiobook;

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
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

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
     * `new Chapter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Chapter::with(
     *   id: ...,
     *   audioPreviewURL: ...,
     *   audiobook: ...,
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
     * @param AudiobookBase|AudiobookBaseShape $audiobook
     * @param ExternalURLObject|ExternalURLObjectShape $externalURLs
     * @param list<ImageObject|ImageObjectShape> $images
     * @param list<string> $languages
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     * @param list<string>|null $availableMarkets
     * @param ChapterRestrictionObject|ChapterRestrictionObjectShape|null $restrictions
     * @param ResumePointObject|ResumePointObjectShape|null $resumePoint
     */
    public static function with(
        string $id,
        ?string $audioPreviewURL,
        AudiobookBase|array $audiobook,
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
        ?bool $published = null,
        ChapterRestrictionObject|array|null $restrictions = null,
        ResumePointObject|array|null $resumePoint = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['audioPreviewURL'] = $audioPreviewURL;
        $self['audiobook'] = $audiobook;
        $self['chapterNumber'] = $chapterNumber;
        $self['description'] = $description;
        $self['durationMs'] = $durationMs;
        $self['explicit'] = $explicit;
        $self['externalURLs'] = $externalURLs;
        $self['href'] = $href;
        $self['htmlDescription'] = $htmlDescription;
        $self['images'] = $images;
        $self['isPlayable'] = $isPlayable;
        $self['languages'] = $languages;
        $self['name'] = $name;
        $self['releaseDate'] = $releaseDate;
        $self['releaseDatePrecision'] = $releaseDatePrecision;
        $self['uri'] = $uri;

        null !== $availableMarkets && $self['availableMarkets'] = $availableMarkets;
        null !== $published && $self['published'] = $published;
        null !== $restrictions && $self['restrictions'] = $restrictions;
        null !== $resumePoint && $self['resumePoint'] = $resumePoint;

        return $self;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the chapter.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A URL to a 30 second preview (MP3 format) of the chapter. `null` if not available.
     */
    public function withAudioPreviewURL(?string $audioPreviewURL): self
    {
        $self = clone $this;
        $self['audioPreviewURL'] = $audioPreviewURL;

        return $self;
    }

    /**
     * The audiobook for which the chapter belongs.
     *
     * @param AudiobookBase|AudiobookBaseShape $audiobook
     */
    public function withAudiobook(AudiobookBase|array $audiobook): self
    {
        $self = clone $this;
        $self['audiobook'] = $audiobook;

        return $self;
    }

    /**
     * The number of the chapter.
     */
    public function withChapterNumber(int $chapterNumber): self
    {
        $self = clone $this;
        $self['chapterNumber'] = $chapterNumber;

        return $self;
    }

    /**
     * A description of the chapter. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The chapter length in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $self = clone $this;
        $self['durationMs'] = $durationMs;

        return $self;
    }

    /**
     * Whether or not the chapter has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $self = clone $this;
        $self['explicit'] = $explicit;

        return $self;
    }

    /**
     * External URLs for this chapter.
     *
     * @param ExternalURLObject|ExternalURLObjectShape $externalURLs
     */
    public function withExternalURLs(
        ExternalURLObject|array $externalURLs
    ): self {
        $self = clone $this;
        $self['externalURLs'] = $externalURLs;

        return $self;
    }

    /**
     * A link to the Web API endpoint providing full details of the chapter.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    /**
     * A description of the chapter. This field may contain HTML tags.
     */
    public function withHTMLDescription(string $htmlDescription): self
    {
        $self = clone $this;
        $self['htmlDescription'] = $htmlDescription;

        return $self;
    }

    /**
     * The cover art for the chapter in various sizes, widest first.
     *
     * @param list<ImageObject|ImageObjectShape> $images
     */
    public function withImages(array $images): self
    {
        $self = clone $this;
        $self['images'] = $images;

        return $self;
    }

    /**
     * True if the chapter is playable in the given market. Otherwise false.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $self = clone $this;
        $self['isPlayable'] = $isPlayable;

        return $self;
    }

    /**
     * A list of the languages used in the chapter, identified by their [ISO 639-1](https://en.wikipedia.org/wiki/ISO_639) code.
     *
     * @param list<string> $languages
     */
    public function withLanguages(array $languages): self
    {
        $self = clone $this;
        $self['languages'] = $languages;

        return $self;
    }

    /**
     * The name of the chapter.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The date the chapter was first released, for example `"1981-12-15"`. Depending on the precision, it might be shown as `"1981"` or `"1981-12"`.
     */
    public function withReleaseDate(string $releaseDate): self
    {
        $self = clone $this;
        $self['releaseDate'] = $releaseDate;

        return $self;
    }

    /**
     * The precision with which `release_date` value is known.
     *
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     */
    public function withReleaseDatePrecision(
        ReleaseDatePrecision|string $releaseDatePrecision
    ): self {
        $self = clone $this;
        $self['releaseDatePrecision'] = $releaseDatePrecision;

        return $self;
    }

    /**
     * The object type.
     *
     * @param 'episode' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the chapter.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }

    /**
     * A list of the countries in which the chapter can be played, identified by their [ISO 3166-1 alpha-2](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) code.
     *
     * @param list<string> $availableMarkets
     */
    public function withAvailableMarkets(array $availableMarkets): self
    {
        $self = clone $this;
        $self['availableMarkets'] = $availableMarkets;

        return $self;
    }

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }

    /**
     * Included in the response when a content restriction is applied.
     *
     * @param ChapterRestrictionObject|ChapterRestrictionObjectShape $restrictions
     */
    public function withRestrictions(
        ChapterRestrictionObject|array $restrictions
    ): self {
        $self = clone $this;
        $self['restrictions'] = $restrictions;

        return $self;
    }

    /**
     * The user's most recent position in the chapter. Set if the supplied access token is a user token and has the scope 'user-read-playback-position'.
     *
     * @param ResumePointObject|ResumePointObjectShape $resumePoint
     */
    public function withResumePoint(ResumePointObject|array $resumePoint): self
    {
        $self = clone $this;
        $self['resumePoint'] = $resumePoint;

        return $self;
    }
}
