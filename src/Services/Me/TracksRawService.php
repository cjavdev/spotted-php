<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Tracks\TrackCheckParams;
use Spotted\Me\Tracks\TrackListParams;
use Spotted\Me\Tracks\TrackListResponse;
use Spotted\Me\Tracks\TrackRemoveParams;
use Spotted\Me\Tracks\TrackSaveParams;
use Spotted\Me\Tracks\TrackSaveParams\TimestampedID;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\TracksRawContract;

/**
 * @phpstan-import-type TimestampedIDShape from \Spotted\Me\Tracks\TrackSaveParams\TimestampedID
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
     * Get a list of the songs saved in the current Spotify user's 'Your Music' library.
     *
     * @param array{limit?: int, market?: string, offset?: int}|TrackListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<TrackListResponse>>
     *
     * @throws APIException
     */
    public function list(
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
            path: 'me/tracks',
            query: $parsed,
            options: $options,
            convert: TrackListResponse::class,
            page: CursorURLPage::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Check if one or more tracks is already saved in the current Spotify user's 'Your Music' library.
     *
     * **Note:** This endpoint is deprecated. Use [Check User's Saved Items](/documentation/web-api/reference/check-library-contains) instead.
     *
     * @param array{ids: string}|TrackCheckParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|TrackCheckParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackCheckParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/tracks/contains',
            query: $parsed,
            options: $options,
            convert: new ListOf('bool'),
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Remove one or more tracks from the current user's 'Your Music' library.
     *
     * **Note:** This endpoint is deprecated. Use [Remove Items from Library](/documentation/web-api/reference/remove-library-items) instead.
     *
     * @param array{ids?: list<string>, published?: bool}|TrackRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
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
            path: 'me/tracks',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Save one or more tracks to the current user's 'Your Music' library.
     *
     * **Note:** This endpoint is deprecated. Use [Save Items to Library](/documentation/web-api/reference/save-library-items) instead.
     *
     * @param array{
     *   ids: list<string>,
     *   published?: bool,
     *   timestampedIDs?: list<TimestampedID|TimestampedIDShape>,
     * }|TrackSaveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function save(
        array|TrackSaveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackSaveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'me/tracks',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
