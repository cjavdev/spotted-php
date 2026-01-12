<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\Playlists\PlaylistGetResponse;
use Spotted\Playlists\PlaylistRetrieveParams;
use Spotted\Playlists\PlaylistUpdateParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\PlaylistsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
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
     * Get a playlist owned by a Spotify user.
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array{
     *   additionalTypes?: string, fields?: string, market?: string
     * }|PlaylistRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlaylistGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $playlistID,
        array|PlaylistRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PlaylistRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['playlists/%1$s', $playlistID],
            query: Util::array_transform_keys(
                $parsed,
                ['additionalTypes' => 'additional_types']
            ),
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
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array{
     *   collaborative?: bool, description?: string, name?: string, published?: bool
     * }|PlaylistUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        array|PlaylistUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PlaylistUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['playlists/%1$s', $playlistID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
