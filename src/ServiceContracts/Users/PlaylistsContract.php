<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Users;

use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\SimplifiedPlaylistObject;
use Spotted\Users\Playlists\PlaylistCreateParams;
use Spotted\Users\Playlists\PlaylistListParams;
use Spotted\Users\Playlists\PlaylistNewResponse;

interface PlaylistsContract
{
    /**
     * @api
     *
     * @param array<mixed>|PlaylistCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        array|PlaylistCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PlaylistNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlaylistListParams $params
     *
     * @return CursorURLPage<SimplifiedPlaylistObject>
     *
     * @throws APIException
     */
    public function list(
        string $userID,
        array|PlaylistListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;
}
