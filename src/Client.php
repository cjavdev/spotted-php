<?php

declare(strict_types=1);

namespace Spotted;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Spotted\Core\BaseClient;
use Spotted\Services\AlbumsService;
use Spotted\Services\ArtistsService;
use Spotted\Services\AudioAnalysisService;
use Spotted\Services\AudiobooksService;
use Spotted\Services\AudioFeaturesService;
use Spotted\Services\BrowseService;
use Spotted\Services\ChaptersService;
use Spotted\Services\EpisodesService;
use Spotted\Services\MarketsService;
use Spotted\Services\MeService;
use Spotted\Services\PlaylistsService;
use Spotted\Services\RecommendationsService;
use Spotted\Services\SearchService;
use Spotted\Services\ShowsService;
use Spotted\Services\TracksService;
use Spotted\Services\UsersService;

class Client extends BaseClient
{
    public string $clientID;

    public string $clientSecret;

    /**
     * @api
     */
    public AlbumsService $albums;

    /**
     * @api
     */
    public ArtistsService $artists;

    /**
     * @api
     */
    public ShowsService $shows;

    /**
     * @api
     */
    public EpisodesService $episodes;

    /**
     * @api
     */
    public AudiobooksService $audiobooks;

    /**
     * @api
     */
    public MeService $me;

    /**
     * @api
     */
    public ChaptersService $chapters;

    /**
     * @api
     */
    public TracksService $tracks;

    /**
     * @api
     */
    public SearchService $search;

    /**
     * @api
     */
    public PlaylistsService $playlists;

    /**
     * @api
     */
    public UsersService $users;

    /**
     * @api
     */
    public BrowseService $browse;

    /**
     * @api
     */
    public AudioFeaturesService $audioFeatures;

    /**
     * @api
     */
    public AudioAnalysisService $audioAnalysis;

    /**
     * @api
     */
    public RecommendationsService $recommendations;

    /**
     * @api
     */
    public MarketsService $markets;

    public function __construct(
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $baseUrl = null,
    ) {
        $this->clientID = (string) ($clientID ?? getenv('SPOTIFY_CLIENT_ID'));
        $this->clientSecret = (string) ($clientSecret ?? getenv('SPOTIFY_CLIENT_SECRET'));

        $baseUrl ??= getenv('SPOTTED_BASE_URL') ?: 'https://api.spotify.com/v1';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            // x-release-please-start-version
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('spotted/PHP %s', '0.0.1'),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.0.1',
                'X-Stainless-OS' => $this->getNormalizedOS(),
                'X-Stainless-Arch' => $this->getNormalizedArchitecture(),
                'X-Stainless-Runtime' => 'php',
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            // x-release-please-end
            baseUrl: $baseUrl,
            options: $options,
        );

        $this->albums = new AlbumsService($this);
        $this->artists = new ArtistsService($this);
        $this->shows = new ShowsService($this);
        $this->episodes = new EpisodesService($this);
        $this->audiobooks = new AudiobooksService($this);
        $this->me = new MeService($this);
        $this->chapters = new ChaptersService($this);
        $this->tracks = new TracksService($this);
        $this->search = new SearchService($this);
        $this->playlists = new PlaylistsService($this);
        $this->users = new UsersService($this);
        $this->browse = new BrowseService($this);
        $this->audioFeatures = new AudioFeaturesService($this);
        $this->audioAnalysis = new AudioAnalysisService($this);
        $this->recommendations = new RecommendationsService($this);
        $this->markets = new MarketsService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        throw new \BadMethodCallException;
    }
}
