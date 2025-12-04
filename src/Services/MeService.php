<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\MeGetResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\MeContract;
use Spotted\Services\Me\AlbumsService;
use Spotted\Services\Me\AudiobooksService;
use Spotted\Services\Me\EpisodesService;
use Spotted\Services\Me\FollowingService;
use Spotted\Services\Me\PlayerService;
use Spotted\Services\Me\PlaylistsService;
use Spotted\Services\Me\ShowsService;
use Spotted\Services\Me\TopService;
use Spotted\Services\Me\TracksService;

final class MeService implements MeContract
{
    /**
     * @api
     */
    public AudiobooksService $audiobooks;

    /**
     * @api
     */
    public PlaylistsService $playlists;

    /**
     * @api
     */
    public TopService $top;

    /**
     * @api
     */
    public AlbumsService $albums;

    /**
     * @api
     */
    public TracksService $tracks;

    /**
     * @api
     */
    public EpisodesService $episodes;

    /**
     * @api
     */
    public ShowsService $shows;

    /**
     * @api
     */
    public FollowingService $following;

    /**
     * @api
     */
    public PlayerService $player;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->audiobooks = new AudiobooksService($client);
        $this->playlists = new PlaylistsService($client);
        $this->top = new TopService($client);
        $this->albums = new AlbumsService($client);
        $this->tracks = new TracksService($client);
        $this->episodes = new EpisodesService($client);
        $this->shows = new ShowsService($client);
        $this->following = new FollowingService($client);
        $this->player = new PlayerService($client);
    }

    /**
     * @api
     *
     * Get detailed profile information about the current user (including the
     * current user's username).
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): MeGetResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me',
            options: $requestOptions,
            convert: MeGetResponse::class,
        );
    }
}
