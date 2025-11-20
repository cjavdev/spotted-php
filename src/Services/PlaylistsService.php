<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Playlists\PlaylistGetResponse;
use Spotted\Playlists\PlaylistRetrieveParams;
use Spotted\Playlists\PlaylistUpdateParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\PlaylistsContract;
use Spotted\Services\Playlists\FollowersService;
use Spotted\Services\Playlists\ImagesService;
use Spotted\Services\Playlists\TracksService;

final class PlaylistsService implements PlaylistsContract
{
    /**
     * @api
     */
    public TracksService $tracks;

    /**
     * @api
     */
    public FollowersService $followers;

    /**
     * @api
     */
    public ImagesService $images;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->tracks = new TracksService($client);
        $this->followers = new FollowersService($client);
        $this->images = new ImagesService($client);
    }

    /**
     * @api
     *
     * Get a playlist owned by a Spotify user.
     *
     * @param array{
     *   additional_types?: string, fields?: string, market?: string
     * }|PlaylistRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $playlistID,
        array|PlaylistRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): PlaylistGetResponse {
        [$parsed, $options] = PlaylistRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['playlists/%1$s', $playlistID],
            query: $parsed,
            options: $options,
            convert: PlaylistGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Change a playlist's name and public/private state. (The user must, of
     * course, own the playlist.)
     *
     * @param array{
     *   dollar_components_schemas___properties_published?: bool,
     *   collaborative?: bool,
     *   description?: string,
     *   name?: string,
     * }|PlaylistUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        array|PlaylistUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PlaylistUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['playlists/%1$s', $playlistID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
