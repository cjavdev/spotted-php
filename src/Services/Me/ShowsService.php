<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Shows\ShowCheckParams;
use Spotted\Me\Shows\ShowListParams;
use Spotted\Me\Shows\ShowListResponse;
use Spotted\Me\Shows\ShowRemoveParams;
use Spotted\Me\Shows\ShowSaveParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\ShowsContract;

final class ShowsService implements ShowsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a list of shows saved in the current Spotify user's library. Optional parameters can be used to limit the number of shows returned.
     *
     * @param array{limit?: int, offset?: int}|ShowListParams $params
     *
     * @return CursorURLPage<ShowListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ShowListParams $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = ShowListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/shows',
            query: $parsed,
            options: $options,
            convert: ShowListResponse::class,
            page: CursorURLPage::class,
        );
    }

    /**
     * @api
     *
     * Check if one or more shows is already saved in the current Spotify user's library.
     *
     * @param array{ids: string}|ShowCheckParams $params
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        array|ShowCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = ShowCheckParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/shows/contains',
            query: $parsed,
            options: $options,
            convert: new ListOf('bool'),
        );
    }

    /**
     * @api
     *
     * Delete one or more shows from current Spotify user's library.
     *
     * @param array{ids?: list<string>}|ShowRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        array|ShowRemoveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ShowRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: 'me/shows',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Save one or more shows to current Spotify user's library.
     *
     * @param array{ids?: list<string>}|ShowSaveParams $params
     *
     * @throws APIException
     */
    public function save(
        array|ShowSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ShowSaveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'me/shows',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
