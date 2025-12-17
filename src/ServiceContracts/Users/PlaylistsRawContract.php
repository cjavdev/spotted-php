<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Users;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\SimplifiedPlaylistObject;
use Spotted\Users\Playlists\PlaylistCreateParams;
use Spotted\Users\Playlists\PlaylistListParams;
use Spotted\Users\Playlists\PlaylistNewResponse;

interface PlaylistsRawContract
{
    /**
     * @api
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param array<string,mixed>|PlaylistCreateParams $params
     *
     * @return BaseResponse<PlaylistNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        array|PlaylistCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param array<string,mixed>|PlaylistListParams $params
     *
     * @return BaseResponse<CursorURLPage<SimplifiedPlaylistObject>>
     *
     * @throws APIException
     */
    public function list(
        string $userID,
        array|PlaylistListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
