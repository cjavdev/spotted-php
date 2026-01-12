<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\EpisodeObject\ReleaseDatePrecision;

/**
 * @phpstan-import-type ExternalURLObjectShape from \Spotted\ExternalURLObject
 * @phpstan-import-type ImageObjectShape from \Spotted\ImageObject
 * @phpstan-import-type ShowBaseShape from \Spotted\ShowBase
 * @phpstan-import-type EpisodeRestrictionObjectShape from \Spotted\EpisodeRestrictionObject
 * @phpstan-import-type ResumePointObjectShape from \Spotted\ResumePointObject
 *
 * @phpstan-type EpisodeObjectShape = array{
 *   id: string,
 *   audioPreviewURL: string|null,
 *   description: string,
 *   durationMs: int,
 *   explicit: bool,
 *   externalURLs: ExternalURLObject|ExternalURLObjectShape,
 *   href: string,
 *   htmlDescription: string,
 *   images: list<ImageObject|ImageObjectShape>,
 *   isExternallyHosted: bool,
 *   isPlayable: bool,
 *   languages: list<string>,
 *   name: string,
 *   releaseDate: string,
 *   releaseDatePrecision: ReleaseDatePrecision|value-of<ReleaseDatePrecision>,
 *   show: ShowBase|ShowBaseShape,
 *   type: 'episode',
 *   uri: string,
 *   language?: string|null,
 *   published?: bool|null,
 *   restrictions?: null|EpisodeRestrictionObject|EpisodeRestrictionObjectShape,
 *   resumePoint?: null|ResumePointObject|ResumePointObjectShape,
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
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

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
     * @param ExternalURLObject|ExternalURLObjectShape $externalURLs
     * @param list<ImageObject|ImageObjectShape> $images
     * @param list<string> $languages
     * @param ReleaseDatePrecision|value-of<ReleaseDatePrecision> $releaseDatePrecision
     * @param ShowBase|ShowBaseShape $show
     * @param EpisodeRestrictionObject|EpisodeRestrictionObjectShape|null $restrictions
     * @param ResumePointObject|ResumePointObjectShape|null $resumePoint
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
        ?bool $published = null,
        EpisodeRestrictionObject|array|null $restrictions = null,
        ResumePointObject|array|null $resumePoint = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['audioPreviewURL'] = $audioPreviewURL;
        $self['description'] = $description;
        $self['durationMs'] = $durationMs;
        $self['explicit'] = $explicit;
        $self['externalURLs'] = $externalURLs;
        $self['href'] = $href;
        $self['htmlDescription'] = $htmlDescription;
        $self['images'] = $images;
        $self['isExternallyHosted'] = $isExternallyHosted;
        $self['isPlayable'] = $isPlayable;
        $self['languages'] = $languages;
        $self['name'] = $name;
        $self['releaseDate'] = $releaseDate;
        $self['releaseDatePrecision'] = $releaseDatePrecision;
        $self['show'] = $show;
        $self['uri'] = $uri;

        null !== $language && $self['language'] = $language;
        null !== $published && $self['published'] = $published;
        null !== $restrictions && $self['restrictions'] = $restrictions;
        null !== $resumePoint && $self['resumePoint'] = $resumePoint;

        return $self;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the episode.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A URL to a 30 second preview (MP3 format) of the episode. `null` if not available.
     */
    public function withAudioPreviewURL(?string $audioPreviewURL): self
    {
        $self = clone $this;
        $self['audioPreviewURL'] = $audioPreviewURL;

        return $self;
    }

    /**
     * A description of the episode. HTML tags are stripped away from this field, use `html_description` field in case HTML tags are needed.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The episode length in milliseconds.
     */
    public function withDurationMs(int $durationMs): self
    {
        $self = clone $this;
        $self['durationMs'] = $durationMs;

        return $self;
    }

    /**
     * Whether or not the episode has explicit content (true = yes it does; false = no it does not OR unknown).
     */
    public function withExplicit(bool $explicit): self
    {
        $self = clone $this;
        $self['explicit'] = $explicit;

        return $self;
    }

    /**
     * External URLs for this episode.
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
     * A link to the Web API endpoint providing full details of the episode.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    /**
     * A description of the episode. This field may contain HTML tags.
     */
    public function withHTMLDescription(string $htmlDescription): self
    {
        $self = clone $this;
        $self['htmlDescription'] = $htmlDescription;

        return $self;
    }

    /**
     * The cover art for the episode in various sizes, widest first.
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
     * True if the episode is hosted outside of Spotify's CDN.
     */
    public function withIsExternallyHosted(bool $isExternallyHosted): self
    {
        $self = clone $this;
        $self['isExternallyHosted'] = $isExternallyHosted;

        return $self;
    }

    /**
     * True if the episode is playable in the given market. Otherwise false.
     */
    public function withIsPlayable(bool $isPlayable): self
    {
        $self = clone $this;
        $self['isPlayable'] = $isPlayable;

        return $self;
    }

    /**
     * A list of the languages used in the episode, identified by their [ISO 639-1](https://en.wikipedia.org/wiki/ISO_639) code.
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
     * The name of the episode.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The date the episode was first released, for example `"1981-12-15"`. Depending on the precision, it might be shown as `"1981"` or `"1981-12"`.
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
     * The show on which the episode belongs.
     *
     * @param ShowBase|ShowBaseShape $show
     */
    public function withShow(ShowBase|array $show): self
    {
        $self = clone $this;
        $self['show'] = $show;

        return $self;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the episode.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }

    /**
     * The language used in the episode, identified by a [ISO 639](https://en.wikipedia.org/wiki/ISO_639) code. This field is deprecated and might be removed in the future. Please use the `languages` field instead.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

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
     * @param EpisodeRestrictionObject|EpisodeRestrictionObjectShape $restrictions
     */
    public function withRestrictions(
        EpisodeRestrictionObject|array $restrictions
    ): self {
        $self = clone $this;
        $self['restrictions'] = $restrictions;

        return $self;
    }

    /**
     * The user's most recent position in the episode. Set if the supplied access token is a user token and has the scope 'user-read-playback-position'.
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
