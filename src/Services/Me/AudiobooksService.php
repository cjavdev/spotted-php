<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Audiobooks\AudiobookCheckParams;
use Spotted\Me\Audiobooks\AudiobookListParams;
use Spotted\Me\Audiobooks\AudiobookListResponse;
use Spotted\Me\Audiobooks\AudiobookRemoveParams;
use Spotted\Me\Audiobooks\AudiobookSaveParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\AudiobooksContract;

final class AudiobooksService implements AudiobooksContract
{
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
     *
     * @return CursorURLPage<AudiobookListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AudiobookListParams $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = AudiobookListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @api
     *
     * Check if one or more audiobooks are already saved in the current Spotify user's library.
     *
     * @param array{ids: string}|AudiobookCheckParams $params
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        array|AudiobookCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = AudiobookCheckParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/audiobooks/contains',
            query: $parsed,
            options: $options,
            convert: new ListOf('bool'),
        );
    }

    /**
     * @api
     *
     * Remove one or more audiobooks from the Spotify user's library.
     *
     * @param array{ids: string}|AudiobookRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        array|AudiobookRemoveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AudiobookRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: 'me/audiobooks',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Save one or more audiobooks to the current Spotify user's library.
     *
     * @param array{ids: string}|AudiobookSaveParams $params
     *
     * @throws APIException
     */
    public function save(
        array|AudiobookSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AudiobookSaveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'me/audiobooks',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
