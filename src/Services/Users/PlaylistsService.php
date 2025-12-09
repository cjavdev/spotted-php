<?php

declare(strict_types=1);

namespace Spotted\Services\Users;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Users\PlaylistsContract;
use Spotted\SimplifiedPlaylistObject;
use Spotted\Users\Playlists\PlaylistCreateParams;
use Spotted\Users\Playlists\PlaylistListParams;
use Spotted\Users\Playlists\PlaylistNewResponse;

final class PlaylistsService implements PlaylistsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a playlist for a Spotify user. (The playlist will be empty until
     * you [add tracks](/documentation/web-api/reference/add-tracks-to-playlist).)
     * Each user is generally limited to a maximum of 11000 playlists.
     *
     * @param array{
     *   name: string, collaborative?: bool, description?: string, public?: bool
     * }|PlaylistCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        array|PlaylistCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PlaylistNewResponse {
        [$parsed, $options] = PlaylistCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PlaylistNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['users/%1$s/playlists', $userID],
            body: (object) $parsed,
            options: $options,
            convert: PlaylistNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a list of the playlists owned or followed by a Spotify user.
     *
     * @param array{limit?: int, offset?: int}|PlaylistListParams $params
     *
     * @return CursorURLPage<SimplifiedPlaylistObject>
     *
     * @throws APIException
     */
    public function list(
        string $userID,
        array|PlaylistListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        [$parsed, $options] = PlaylistListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CursorURLPage<SimplifiedPlaylistObject>> */
        $response = $this->client->request(
            method: 'get',
            path: ['users/%1$s/playlists', $userID],
            query: $parsed,
            options: $options,
            convert: SimplifiedPlaylistObject::class,
            page: CursorURLPage::class,
        );

        return $response->parse();
    }
}
