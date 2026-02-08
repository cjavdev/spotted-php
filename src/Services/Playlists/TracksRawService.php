<?php

declare(strict_types=1);

namespace Spotted\Services\Playlists;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\CursorURLPage;
use Spotted\Playlists\Tracks\TrackAddParams;
use Spotted\Playlists\Tracks\TrackAddResponse;
use Spotted\Playlists\Tracks\TrackListParams;
use Spotted\Playlists\Tracks\TrackRemoveParams;
use Spotted\Playlists\Tracks\TrackRemoveParams\Track;
use Spotted\Playlists\Tracks\TrackRemoveResponse;
use Spotted\Playlists\Tracks\TrackUpdateParams;
use Spotted\Playlists\Tracks\TrackUpdateResponse;
use Spotted\PlaylistTrackObject;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Playlists\TracksRawContract;

/**
 * @phpstan-import-type TrackShape from \Spotted\Playlists\Tracks\TrackRemoveParams\Track
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class TracksRawService implements TracksRawContract
{
    // @phpstan-ignore-next-line
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
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array{
     *   insertBefore?: int,
     *   published?: bool,
     *   rangeLength?: int,
     *   rangeStart?: int,
     *   snapshotID?: string,
     *   uris?: list<string>,
     * }|TrackUpdateParams $params
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
    ): BaseResponse {
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
     * **Note**: This endpoint is only accessible for playlists owned by the current user.
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array{
     *   additionalTypes?: string,
     *   fields?: string,
     *   limit?: int,
     *   market?: string,
     *   offset?: int,
     * }|TrackListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = TrackListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['playlists/%1$s/tracks', $playlistID],
            query: Util::array_transform_keys(
                $parsed,
                ['additionalTypes' => 'additional_types']
            ),
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
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array{
     *   position?: int, published?: bool, uris?: list<string>
     * }|TrackAddParams $params
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
    ): BaseResponse {
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
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param array{
     *   tracks: list<Track|TrackShape>, published?: bool, snapshotID?: string
     * }|TrackRemoveParams $params
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
    ): BaseResponse {
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
