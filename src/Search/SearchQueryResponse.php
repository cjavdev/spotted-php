<?php

declare(strict_types=1);

namespace Spotted\Search;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\PagingPlaylistObject;
use Spotted\Search\SearchQueryResponse\Albums;
use Spotted\Search\SearchQueryResponse\Artists;
use Spotted\Search\SearchQueryResponse\Audiobooks;
use Spotted\Search\SearchQueryResponse\Episodes;
use Spotted\Search\SearchQueryResponse\Shows;
use Spotted\Search\SearchQueryResponse\Tracks;

/**
 * @phpstan-type SearchQueryResponseShape = array{
 *   albums?: Albums,
 *   artists?: Artists,
 *   audiobooks?: Audiobooks,
 *   episodes?: Episodes,
 *   playlists?: PagingPlaylistObject,
 *   shows?: Shows,
 *   tracks?: Tracks,
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
     */
    public static function with(
        ?Albums $albums = null,
        ?Artists $artists = null,
        ?Audiobooks $audiobooks = null,
        ?Episodes $episodes = null,
        ?PagingPlaylistObject $playlists = null,
        ?Shows $shows = null,
        ?Tracks $tracks = null,
    ): self {
        $obj = new self;

        null !== $albums && $obj->albums = $albums;
        null !== $artists && $obj->artists = $artists;
        null !== $audiobooks && $obj->audiobooks = $audiobooks;
        null !== $episodes && $obj->episodes = $episodes;
        null !== $playlists && $obj->playlists = $playlists;
        null !== $shows && $obj->shows = $shows;
        null !== $tracks && $obj->tracks = $tracks;

        return $obj;
    }

    public function withAlbums(Albums $albums): self
    {
        $obj = clone $this;
        $obj->albums = $albums;

        return $obj;
    }

    public function withArtists(Artists $artists): self
    {
        $obj = clone $this;
        $obj->artists = $artists;

        return $obj;
    }

    public function withAudiobooks(Audiobooks $audiobooks): self
    {
        $obj = clone $this;
        $obj->audiobooks = $audiobooks;

        return $obj;
    }

    public function withEpisodes(Episodes $episodes): self
    {
        $obj = clone $this;
        $obj->episodes = $episodes;

        return $obj;
    }

    public function withPlaylists(PagingPlaylistObject $playlists): self
    {
        $obj = clone $this;
        $obj->playlists = $playlists;

        return $obj;
    }

    public function withShows(Shows $shows): self
    {
        $obj = clone $this;
        $obj->shows = $shows;

        return $obj;
    }

    public function withTracks(Tracks $tracks): self
    {
        $obj = clone $this;
        $obj->tracks = $tracks;

        return $obj;
    }
}
