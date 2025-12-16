<?php

declare(strict_types=1);

namespace Spotted\Search;

use Spotted\ArtistObject;
use Spotted\AudiobookBase;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\PagingPlaylistObject;
use Spotted\Search\SearchQueryResponse\Albums;
use Spotted\Search\SearchQueryResponse\Albums\Item;
use Spotted\Search\SearchQueryResponse\Artists;
use Spotted\Search\SearchQueryResponse\Audiobooks;
use Spotted\Search\SearchQueryResponse\Episodes;
use Spotted\Search\SearchQueryResponse\Shows;
use Spotted\Search\SearchQueryResponse\Tracks;
use Spotted\ShowBase;
use Spotted\SimplifiedEpisodeObject;
use Spotted\SimplifiedPlaylistObject;
use Spotted\TrackObject;

/**
 * @phpstan-type SearchQueryResponseShape = array{
 *   albums?: Albums|null,
 *   artists?: Artists|null,
 *   audiobooks?: Audiobooks|null,
 *   episodes?: Episodes|null,
 *   playlists?: PagingPlaylistObject|null,
 *   shows?: Shows|null,
 *   tracks?: Tracks|null,
 * }
 */
final class SearchQueryResponse implements BaseModel
{
    /** @use SdkModel<SearchQueryResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Albums $albums;

    #[Optional]
    public ?Artists $artists;

    #[Optional]
    public ?Audiobooks $audiobooks;

    #[Optional]
    public ?Episodes $episodes;

    #[Optional]
    public ?PagingPlaylistObject $playlists;

    #[Optional]
    public ?Shows $shows;

    #[Optional]
    public ?Tracks $tracks;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Albums|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<Item>|null,
     *   published?: bool|null,
     * } $albums
     * @param Artists|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<ArtistObject>|null,
     *   published?: bool|null,
     * } $artists
     * @param Audiobooks|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<AudiobookBase>|null,
     *   published?: bool|null,
     * } $audiobooks
     * @param Episodes|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<SimplifiedEpisodeObject>|null,
     *   published?: bool|null,
     * } $episodes
     * @param PagingPlaylistObject|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<SimplifiedPlaylistObject>|null,
     *   published?: bool|null,
     * } $playlists
     * @param Shows|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<ShowBase>|null,
     *   published?: bool|null,
     * } $shows
     * @param Tracks|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<TrackObject>|null,
     *   published?: bool|null,
     * } $tracks
     */
    public static function with(
        Albums|array|null $albums = null,
        Artists|array|null $artists = null,
        Audiobooks|array|null $audiobooks = null,
        Episodes|array|null $episodes = null,
        PagingPlaylistObject|array|null $playlists = null,
        Shows|array|null $shows = null,
        Tracks|array|null $tracks = null,
    ): self {
        $self = new self;

        null !== $albums && $self['albums'] = $albums;
        null !== $artists && $self['artists'] = $artists;
        null !== $audiobooks && $self['audiobooks'] = $audiobooks;
        null !== $episodes && $self['episodes'] = $episodes;
        null !== $playlists && $self['playlists'] = $playlists;
        null !== $shows && $self['shows'] = $shows;
        null !== $tracks && $self['tracks'] = $tracks;

        return $self;
    }

    /**
     * @param Albums|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<Item>|null,
     *   published?: bool|null,
     * } $albums
     */
    public function withAlbums(Albums|array $albums): self
    {
        $self = clone $this;
        $self['albums'] = $albums;

        return $self;
    }

    /**
     * @param Artists|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<ArtistObject>|null,
     *   published?: bool|null,
     * } $artists
     */
    public function withArtists(Artists|array $artists): self
    {
        $self = clone $this;
        $self['artists'] = $artists;

        return $self;
    }

    /**
     * @param Audiobooks|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<AudiobookBase>|null,
     *   published?: bool|null,
     * } $audiobooks
     */
    public function withAudiobooks(Audiobooks|array $audiobooks): self
    {
        $self = clone $this;
        $self['audiobooks'] = $audiobooks;

        return $self;
    }

    /**
     * @param Episodes|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<SimplifiedEpisodeObject>|null,
     *   published?: bool|null,
     * } $episodes
     */
    public function withEpisodes(Episodes|array $episodes): self
    {
        $self = clone $this;
        $self['episodes'] = $episodes;

        return $self;
    }

    /**
     * @param PagingPlaylistObject|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<SimplifiedPlaylistObject>|null,
     *   published?: bool|null,
     * } $playlists
     */
    public function withPlaylists(PagingPlaylistObject|array $playlists): self
    {
        $self = clone $this;
        $self['playlists'] = $playlists;

        return $self;
    }

    /**
     * @param Shows|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<ShowBase>|null,
     *   published?: bool|null,
     * } $shows
     */
    public function withShows(Shows|array $shows): self
    {
        $self = clone $this;
        $self['shows'] = $shows;

        return $self;
    }

    /**
     * @param Tracks|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<TrackObject>|null,
     *   published?: bool|null,
     * } $tracks
     */
    public function withTracks(Tracks|array $tracks): self
    {
        $self = clone $this;
        $self['tracks'] = $tracks;

        return $self;
    }
}
