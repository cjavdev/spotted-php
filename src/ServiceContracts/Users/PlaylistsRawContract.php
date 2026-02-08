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

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface PlaylistsRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param array<string,mixed>|PlaylistCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PlaylistNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $userID,
        array|PlaylistCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param array<string,mixed>|PlaylistListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<SimplifiedPlaylistObject>>
     *
     * @throws APIException
     */
    public function list(
        string $userID,
        array|PlaylistListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
