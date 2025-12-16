<?php

declare(strict_types=1);

namespace Spotted\Me\Audiobooks;

use Spotted\AuthorObject;
use Spotted\CopyrightObject;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\ImageObject;
use Spotted\Me\Audiobooks\AudiobookListResponse\Audiobook;
use Spotted\Me\Audiobooks\AudiobookListResponse\Audiobook\Chapters;
use Spotted\NarratorObject;

/**
 * @phpstan-type AudiobookListResponseShape = array{
 *   addedAt?: \DateTimeInterface|null,
 *   audiobook?: Audiobook|null,
 *   published?: bool|null,
 * }
 */
final class AudiobookListResponse implements BaseModel
{
    /** @use SdkModel<AudiobookListResponseShape> */
    use SdkModel;

    /**
     * The date and time the audiobook was saved
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    #[Optional('added_at')]
    public ?\DateTimeInterface $addedAt;

    /**
     * Information about the audiobook.
     */
    #[Optional]
    public ?Audiobook $audiobook;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Audiobook|array{
     *   id: string,
     *   authors: list<AuthorObject>,
     *   availableMarkets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   languages: list<string>,
     *   mediaType: string,
     *   name: string,
     *   narrators: list<NarratorObject>,
     *   publisher: string,
     *   totalChapters: int,
     *   type?: 'audiobook',
     *   uri: string,
     *   edition?: string|null,
     *   published?: bool|null,
     *   chapters: Chapters,
     * } $audiobook
     */
    public static function with(
        ?\DateTimeInterface $addedAt = null,
        Audiobook|array|null $audiobook = null,
        ?bool $published = null,
    ): self {
        $self = new self;

        null !== $addedAt && $self['addedAt'] = $addedAt;
        null !== $audiobook && $self['audiobook'] = $audiobook;
        null !== $published && $self['published'] = $published;

        return $self;
    }

    /**
     * The date and time the audiobook was saved
     * Timestamps are returned in ISO 8601 format as Coordinated Universal Time (UTC) with a zero offset: YYYY-MM-DDTHH:MM:SSZ.
     * If the time is imprecise (for example, the date/time of an album release), an additional field indicates the precision; see for example, release_date in an album object.
     */
    public function withAddedAt(\DateTimeInterface $addedAt): self
    {
        $self = clone $this;
        $self['addedAt'] = $addedAt;

        return $self;
    }

    /**
     * Information about the audiobook.
     *
     * @param Audiobook|array{
     *   id: string,
     *   authors: list<AuthorObject>,
     *   availableMarkets: list<string>,
     *   copyrights: list<CopyrightObject>,
     *   description: string,
     *   explicit: bool,
     *   externalURLs: ExternalURLObject,
     *   href: string,
     *   htmlDescription: string,
     *   images: list<ImageObject>,
     *   languages: list<string>,
     *   mediaType: string,
     *   name: string,
     *   narrators: list<NarratorObject>,
     *   publisher: string,
     *   totalChapters: int,
     *   type?: 'audiobook',
     *   uri: string,
     *   edition?: string|null,
     *   published?: bool|null,
     *   chapters: Chapters,
     * } $audiobook
     */
    public function withAudiobook(Audiobook|array $audiobook): self
    {
        $self = clone $this;
        $self['audiobook'] = $audiobook;

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
}
