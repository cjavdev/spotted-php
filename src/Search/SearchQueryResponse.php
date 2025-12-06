<?php

declare(strict_types=1);

namespace Spotted\Search;

use Spotted\ArtistObject;
use Spotted\AudiobookBase;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
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
final class SearchQueryResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SearchQueryResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?Albums $albums;

    #[Api(optional: true)]
    public ?Artists $artists;

    #[Api(optional: true)]
    public ?Audiobooks $audiobooks;

    #[Api(optional: true)]
    public ?Episodes $episodes;

    #[Api(optional: true)]
    public ?PagingPlaylistObject $playlists;

    #[Api(optional: true)]
    public ?Shows $shows;

    #[Api(optional: true)]
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
     * } $albums
     * @param Artists|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<ArtistObject>|null,
     * } $artists
     * @param Audiobooks|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<AudiobookBase>|null,
     * } $audiobooks
     * @param Episodes|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<SimplifiedEpisodeObject>|null,
     * } $episodes
     * @param PagingPlaylistObject|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<SimplifiedPlaylistObject>|null,
     * } $playlists
     * @param Shows|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<ShowBase>|null,
     * } $shows
     * @param Tracks|array{
     *   href: string,
     *   limit: int,
     *   next: string|null,
     *   offset: int,
     *   previous: string|null,
     *   total: int,
     *   items?: list<TrackObject>|null,
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
        $obj = new self;

        null !== $albums && $obj['albums'] = $albums;
        null !== $artists && $obj['artists'] = $artists;
        null !== $audiobooks && $obj['audiobooks'] = $audiobooks;
        null !== $episodes && $obj['episodes'] = $episodes;
        null !== $playlists && $obj['playlists'] = $playlists;
        null !== $shows && $obj['shows'] = $shows;
        null !== $tracks && $obj['tracks'] = $tracks;

        return $obj;
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
     * } $albums
     */
    public function withAlbums(Albums|array $albums): self
    {
        $obj = clone $this;
        $obj['albums'] = $albums;

        return $obj;
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
     * } $artists
     */
    public function withArtists(Artists|array $artists): self
    {
        $obj = clone $this;
        $obj['artists'] = $artists;

        return $obj;
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
     * } $audiobooks
     */
    public function withAudiobooks(Audiobooks|array $audiobooks): self
    {
        $obj = clone $this;
        $obj['audiobooks'] = $audiobooks;

        return $obj;
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
     * } $episodes
     */
    public function withEpisodes(Episodes|array $episodes): self
    {
        $obj = clone $this;
        $obj['episodes'] = $episodes;

        return $obj;
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
     * } $playlists
     */
    public function withPlaylists(PagingPlaylistObject|array $playlists): self
    {
        $obj = clone $this;
        $obj['playlists'] = $playlists;

        return $obj;
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
     * } $shows
     */
    public function withShows(Shows|array $shows): self
    {
        $obj = clone $this;
        $obj['shows'] = $shows;

        return $obj;
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
     * } $tracks
     */
    public function withTracks(Tracks|array $tracks): self
    {
        $obj = clone $this;
        $obj['tracks'] = $tracks;

        return $obj;
    }
}
