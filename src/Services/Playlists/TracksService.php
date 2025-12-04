<?php

declare(strict_types=1);

namespace Spotted\Services\Playlists;

use Spotted\Client;
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
use Spotted\ServiceContracts\Playlists\TracksContract;

final class TracksService implements TracksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Either reorder or replace items in a playlist depending on the request's parameters.
     * To reorder items, include `range_start`, `insert_before`, `range_length` and `snapshot_id` in the request's body.
     * To replace items, include `uris` as either a query parameter or in the request's body.
     * Replacing items in a playlist will overwrite its existing items. This operation can be used for replacing or clearing items in a playlist.
     * <br/>
     * **Note**: Replace and reorder are mutually exclusive operations which share the same endpoint, but have different parameters.
     * These operations can't be applied together in a single request.
     *
     * @param array{
     *   insert_before?: int,
     *   range_length?: int,
     *   range_start?: int,
     *   snapshot_id?: string,
     *   uris?: list<string>,
     * }|TrackUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        array|TrackUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TrackUpdateResponse {
        [$parsed, $options] = TrackUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['playlists/%1$s/tracks', $playlistID],
            body: (object) $parsed,
            options: $options,
            convert: TrackUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get full details of the items of a playlist owned by a Spotify user.
     *
     * @param array{
     *   additional_types?: string,
     *   fields?: string,
     *   limit?: int,
     *   market?: string,
     *   offset?: int,
     * }|TrackListParams $params
     *
     * @return CursorURLPage<PlaylistTrackObject>
     *
     * @throws APIException
     */
    public function list(
        string $playlistID,
        array|TrackListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
        [$parsed, $options] = TrackListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['playlists/%1$s/tracks', $playlistID],
            query: $parsed,
            options: $options,
            convert: PlaylistTrackObject::class,
            page: CursorURLPage::class,
        );
    }

    /**
     * @api
     *
     * Add one or more items to a user's playlist.
     *
     * @param array{position?: int, uris?: list<string>}|TrackAddParams $params
     *
     * @throws APIException
     */
    public function add(
        string $playlistID,
        array|TrackAddParams $params,
        ?RequestOptions $requestOptions = null,
    ): TrackAddResponse {
        [$parsed, $options] = TrackAddParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['playlists/%1$s/tracks', $playlistID],
            body: (object) $parsed,
            options: $options,
            convert: TrackAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove one or more items from a user's playlist.
     *
     * @param array{
     *   tracks: list<array{uri?: string}>, snapshot_id?: string
     * }|TrackRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        string $playlistID,
        array|TrackRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): TrackRemoveResponse {
        [$parsed, $options] = TrackRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['playlists/%1$s/tracks', $playlistID],
            body: (object) $parsed,
            options: $options,
            convert: TrackRemoveResponse::class,
        );
    }
}
