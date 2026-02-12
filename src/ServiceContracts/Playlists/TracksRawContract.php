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

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface TracksRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<string,mixed>|TrackUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        array|TrackUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<string,mixed>|TrackListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<PlaylistTrackObject>>
     *
     * @throws APIException
     */
    public function list(
        string $playlistID,
        array|TrackListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<string,mixed>|TrackAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $playlistID,
        array|TrackAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array<string,mixed>|TrackRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $playlistID,
        array|TrackRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
