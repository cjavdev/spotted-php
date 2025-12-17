<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Playlists\PlaylistGetResponse;
use Spotted\Playlists\PlaylistRetrieveParams;
use Spotted\Playlists\PlaylistUpdateParams;
use Spotted\RequestOptions;

interface PlaylistsRawContract
{
    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<string,mixed>|PlaylistRetrieveParams $params
     *
     * @return BaseResponse<PlaylistGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $playlistID,
        array|PlaylistRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<string,mixed>|PlaylistUpdateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        array|PlaylistUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
