<?php

declare(strict_types=1);

namespace Spotted\Services\Users;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Users\PlaylistsRawContract;
use Spotted\SimplifiedPlaylistObject;
use Spotted\Users\Playlists\PlaylistCreateParams;
use Spotted\Users\Playlists\PlaylistListParams;
use Spotted\Users\Playlists\PlaylistNewResponse;

final class PlaylistsRawService implements PlaylistsRawContract
{
    // @phpstan-ignore-next-line
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
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param array{
     *   name: string,
     *   collaborative?: bool,
     *   description?: string,
     *   public?: bool,
     *   published?: bool,
     * }|PlaylistCreateParams $params
     *
     * @return BaseResponse<PlaylistNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        array|PlaylistCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PlaylistCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['users/%1$s/playlists', $userID],
            body: (object) $parsed,
            options: $options,
            convert: PlaylistNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a list of the playlists owned or followed by a Spotify user.
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param array{limit?: int, offset?: int}|PlaylistListParams $params
     *
     * @return BaseResponse<CursorURLPage<SimplifiedPlaylistObject>>
     *
     * @throws APIException
     */
    public function list(
        string $userID,
        array|PlaylistListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PlaylistListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['users/%1$s/playlists', $userID],
            query: $parsed,
            options: $options,
            convert: SimplifiedPlaylistObject::class,
            page: CursorURLPage::class,
        );
    }
}
