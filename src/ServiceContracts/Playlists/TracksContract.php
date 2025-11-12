<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Playlists;

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

interface TracksContract
{
    /**
     * @api
     *
     * @param array<mixed>|TrackUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        array|TrackUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TrackUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|TrackListParams $params
     *
     * @return CursorURLPage<PlaylistTrackObject>
     *
     * @throws APIException
     */
    public function list(
        string $playlistID,
        array|TrackListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage;

    /**
     * @api
     *
     * @param array<mixed>|TrackAddParams $params
     *
     * @throws APIException
     */
    public function add(
        string $playlistID,
        array|TrackAddParams $params,
        ?RequestOptions $requestOptions = null,
    ): TrackAddResponse;

    /**
     * @api
     *
     * @param array<mixed>|TrackRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        string $playlistID,
        array|TrackRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): TrackRemoveResponse;
}
