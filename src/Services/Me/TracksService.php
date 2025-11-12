<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Tracks\TrackCheckParams;
use Spotted\Me\Tracks\TrackListParams;
use Spotted\Me\Tracks\TrackListResponse;
use Spotted\Me\Tracks\TrackRemoveParams;
use Spotted\Me\Tracks\TrackSaveParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\TracksContract;

final class TracksService implements TracksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a list of the songs saved in the current Spotify user's 'Your Music' library.
     *
     * @param array{limit?: int, market?: string, offset?: int}|TrackListParams $params
     *
     * @return CursorURLPage<TrackListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|TrackListParams $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = TrackListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/tracks',
            query: $parsed,
            options: $options,
            convert: TrackListResponse::class,
            page: CursorURLPage::class,
        );
    }

    /**
     * @api
     *
     * Check if one or more tracks is already saved in the current Spotify user's 'Your Music' library.
     *
     * @param array{ids: string}|TrackCheckParams $params
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        array|TrackCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = TrackCheckParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/tracks/contains',
            query: $parsed,
            options: $options,
            convert: new ListOf('bool'),
        );
    }

    /**
     * @api
     *
     * Remove one or more tracks from the current user's 'Your Music' library.
     *
     * @param array{ids?: list<string>}|TrackRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        array|TrackRemoveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = TrackRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: 'me/tracks',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Save one or more tracks to the current user's 'Your Music' library.
     *
     * @param array{
     *   ids: list<string>,
     *   timestamped_ids?: list<array{
     *     id: string, added_at: string|\DateTimeInterface
     *   }>,
     * }|TrackSaveParams $params
     *
     * @throws APIException
     */
    public function save(
        array|TrackSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = TrackSaveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/tracks',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
