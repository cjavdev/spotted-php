<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Albums\AlbumCheckParams;
use Spotted\Me\Albums\AlbumListParams;
use Spotted\Me\Albums\AlbumListResponse;
use Spotted\Me\Albums\AlbumRemoveParams;
use Spotted\Me\Albums\AlbumSaveParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\AlbumsContract;

final class AlbumsService implements AlbumsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a list of the albums saved in the current Spotify user's 'Your Music' library.
     *
     * @param array{limit?: int, market?: string, offset?: int}|AlbumListParams $params
     *
     * @return CursorURLPage<AlbumListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AlbumListParams $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = AlbumListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/albums',
            query: $parsed,
            options: $options,
            convert: AlbumListResponse::class,
            page: CursorURLPage::class,
        );
    }

    /**
     * @api
     *
     * Check if one or more albums is already saved in the current Spotify user's 'Your Music' library.
     *
     * @param array{ids: string}|AlbumCheckParams $params
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        array|AlbumCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = AlbumCheckParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/albums/contains',
            query: $parsed,
            options: $options,
            convert: new ListOf('bool'),
        );
    }

    /**
     * @api
     *
     * Remove one or more albums from the current user's 'Your Music' library.
     *
     * @param array{ids?: list<string>}|AlbumRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        array|AlbumRemoveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AlbumRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: 'me/albums',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Save one or more albums to the current user's 'Your Music' library.
     *
     * @param array{ids?: list<string>}|AlbumSaveParams $params
     *
     * @throws APIException
     */
    public function save(
        array|AlbumSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AlbumSaveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'me/albums',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
