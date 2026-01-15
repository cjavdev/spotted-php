<?php

declare(strict_types=1);

namespace Spotted;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Spotted\Core\BaseClient;
use Spotted\Core\Util;
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

/**
 * @phpstan-import-type NormalizedRequest from \Spotted\Core\BaseClient
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
class Client extends BaseClient
{
    public string $accessToken;

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

    /**
     * @param RequestOpts|null $requestOptions
     */
    public function __construct(
        ?string $accessToken = null,
        ?string $baseUrl = null,
        RequestOptions|array|null $requestOptions = null,
    ) {
        $this->accessToken = (string) ($accessToken ?? getenv('SPOTIFY_ACCESS_TOKEN'));

        $baseUrl ??= getenv('SPOTTED_BASE_URL') ?: 'https://api.spotify.com/v1';

        $options = RequestOptions::parse(
            RequestOptions::with(
                uriFactory: Psr17FactoryDiscovery::findUriFactory(),
                streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
                requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
                transporter: Psr18ClientDiscovery::find(),
            ),
            $requestOptions,
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('spotted/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.6.1',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
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

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return $this->accessToken ? [
            'Authorization' => "Bearer {$this->accessToken}",
        ] : [];
    }

    /**
     * @internal
     *
     * @param string|list<string> $path
     * @param array<string,mixed> $query
     * @param array<string,string|int|list<string|int>|null> $headers
     * @param RequestOpts|null $opts
     *
     * @return array{NormalizedRequest, RequestOptions}
     */
    protected function buildRequest(
        string $method,
        string|array $path,
        array $query,
        array $headers,
        mixed $body,
        RequestOptions|array|null $opts,
    ): array {
        return parent::buildRequest(
            method: $method,
            path: $path,
            query: $query,
            headers: [...$this->authHeaders(), ...$headers],
            body: $body,
            opts: $opts,
        );
    }
}
