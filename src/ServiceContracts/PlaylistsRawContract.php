<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Playlists\PlaylistGetResponse;
use Spotted\Playlists\PlaylistRetrieveParams;
use Spotted\Playlists\PlaylistUpdateParams;
use Spotted\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface PlaylistsRawContract
{
    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<string,mixed>|PlaylistRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<string,mixed>|PlaylistUpdateParams $params
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
    ): BaseResponse;
}
