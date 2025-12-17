<?php

declare(strict_types=1);

namespace Spotted\Search;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\PagingPlaylistObject;
use Spotted\Search\SearchQueryResponse\Albums;
use Spotted\Search\SearchQueryResponse\Artists;
use Spotted\Search\SearchQueryResponse\Audiobooks;
use Spotted\Search\SearchQueryResponse\Episodes;
use Spotted\Search\SearchQueryResponse\Shows;
use Spotted\Search\SearchQueryResponse\Tracks;

/**
 * @phpstan-import-type AlbumsShape from \Spotted\Search\SearchQueryResponse\Albums
 * @phpstan-import-type ArtistsShape from \Spotted\Search\SearchQueryResponse\Artists
 * @phpstan-import-type AudiobooksShape from \Spotted\Search\SearchQueryResponse\Audiobooks
 * @phpstan-import-type EpisodesShape from \Spotted\Search\SearchQueryResponse\Episodes
 * @phpstan-import-type PagingPlaylistObjectShape from \Spotted\PagingPlaylistObject
 * @phpstan-import-type ShowsShape from \Spotted\Search\SearchQueryResponse\Shows
 * @phpstan-import-type TracksShape from \Spotted\Search\SearchQueryResponse\Tracks
 *
 * @phpstan-type SearchQueryResponseShape = array{
 *   albums?: null|Albums|AlbumsShape,
 *   artists?: null|Artists|ArtistsShape,
 *   audiobooks?: null|Audiobooks|AudiobooksShape,
 *   episodes?: null|Episodes|EpisodesShape,
 *   playlists?: null|PagingPlaylistObject|PagingPlaylistObjectShape,
 *   shows?: null|Shows|ShowsShape,
 *   tracks?: null|Tracks|TracksShape,
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
     * @param AlbumsShape $albums
     * @param ArtistsShape $artists
     * @param AudiobooksShape $audiobooks
     * @param EpisodesShape $episodes
     * @param PagingPlaylistObjectShape $playlists
     * @param ShowsShape $shows
     * @param TracksShape $tracks
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
     * @param AlbumsShape $albums
     */
    public function withAlbums(Albums|array $albums): self
    {
        $self = clone $this;
        $self['albums'] = $albums;

        return $self;
    }

    /**
     * @param ArtistsShape $artists
     */
    public function withArtists(Artists|array $artists): self
    {
        $self = clone $this;
        $self['artists'] = $artists;

        return $self;
    }

    /**
     * @param AudiobooksShape $audiobooks
     */
    public function withAudiobooks(Audiobooks|array $audiobooks): self
    {
        $self = clone $this;
        $self['audiobooks'] = $audiobooks;

        return $self;
    }

    /**
     * @param EpisodesShape $episodes
     */
    public function withEpisodes(Episodes|array $episodes): self
    {
        $self = clone $this;
        $self['episodes'] = $episodes;

        return $self;
    }

    /**
     * @param PagingPlaylistObjectShape $playlists
     */
    public function withPlaylists(PagingPlaylistObject|array $playlists): self
    {
        $self = clone $this;
        $self['playlists'] = $playlists;

        return $self;
    }

    /**
     * @param ShowsShape $shows
     */
    public function withShows(Shows|array $shows): self
    {
        $self = clone $this;
        $self['shows'] = $shows;

        return $self;
    }

    /**
     * @param TracksShape $tracks
     */
    public function withTracks(Tracks|array $tracks): self
    {
        $self = clone $this;
        $self['tracks'] = $tracks;

        return $self;
    }
}
