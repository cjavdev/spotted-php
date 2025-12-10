<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Playlists;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Playlists\Tracks\TrackAddParams;
use Spotted\Playlists\Tracks\TrackAddResponse;
use Spotted\Playlists\Tracks\TrackListParams;
use Spotted\Playlists\Tracks\TrackRemoveParams;
use Spotted\Playlists\Tracks\TrackRemoveResponse;
use Spotted\Playlists\Tracks\TrackUpdateParams;
use Spotted\Playlists\Tracks\TrackUpdateResponse;
use Spotted\PlaylistTrackObject;
use Spotted\RequestOptions;

interface TracksRawContract
{
    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<mixed>|TrackUpdateParams $params
     *
     * @return BaseResponse<TrackUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        array|TrackUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<mixed>|TrackListParams $params
     *
     * @return BaseResponse<CursorURLPage<PlaylistTrackObject>>
     *
     * @throws APIException
     */
    public function list(
        string $playlistID,
        array|TrackListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<mixed>|TrackAddParams $params
     *
     * @return BaseResponse<TrackAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $playlistID,
        array|TrackAddParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<mixed>|TrackRemoveParams $params
     *
     * @return BaseResponse<TrackRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $playlistID,
        array|TrackRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
