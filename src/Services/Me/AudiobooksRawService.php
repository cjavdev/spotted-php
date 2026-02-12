<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Audiobooks\AudiobookCheckParams;
use Spotted\Me\Audiobooks\AudiobookListParams;
use Spotted\Me\Audiobooks\AudiobookListResponse;
use Spotted\Me\Audiobooks\AudiobookRemoveParams;
use Spotted\Me\Audiobooks\AudiobookSaveParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\AudiobooksRawContract;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class AudiobooksRawService implements AudiobooksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a list of the audiobooks saved in the current Spotify user's 'Your Music' library.
     *
     * @param array{limit?: int, offset?: int}|AudiobookListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<AudiobookListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AudiobookListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AudiobookListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/audiobooks',
            query: $parsed,
            options: $options,
            convert: AudiobookListResponse::class,
            page: CursorURLPage::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Check if one or more audiobooks are already saved in the current Spotify user's library.
     *
     * **Note:** This endpoint is deprecated. Use [Check User's Saved Items](/documentation/web-api/reference/check-library-contains) instead.
     *
     * @param array{ids: string}|AudiobookCheckParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|AudiobookCheckParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AudiobookCheckParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/audiobooks/contains',
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
     * Remove one or more audiobooks from the Spotify user's library.
     *
     * **Note:** This endpoint is deprecated. Use [Remove Items from Library](/documentation/web-api/reference/remove-library-items) instead.
     *
     * @param array{ids: string}|AudiobookRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        array|AudiobookRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AudiobookRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: 'me/audiobooks',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Save one or more audiobooks to the current Spotify user's library.
     *
     * **Note:** This endpoint is deprecated. Use [Save Items to Library](/documentation/web-api/reference/save-library-items) instead.
     *
     * @param array{ids: string}|AudiobookSaveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function save(
        array|AudiobookSaveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AudiobookSaveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'me/audiobooks',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
