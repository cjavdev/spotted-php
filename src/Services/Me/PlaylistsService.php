<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Playlists\PlaylistListParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\PlaylistsContract;
use Spotted\SimplifiedPlaylistObject;

use const Spotted\Core\OMIT as omit;

final class PlaylistsService implements PlaylistsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a list of the playlists owned or followed by the current Spotify
     * user.
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset 'The index of the first playlist to return. Default:
     * 0 (the first object). Maximum offset: 100.000\. Use with `limit` to get the
     * next set of playlists.'
     *
     * @return CursorURLPage<SimplifiedPlaylistObject>
     *
     * @throws APIException
     */
    public function list(
        $limit = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        $params = ['limit' => $limit, 'offset' => $offset];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CursorURLPage<SimplifiedPlaylistObject>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = PlaylistListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/playlists',
            query: $parsed,
            options: $options,
            convert: SimplifiedPlaylistObject::class,
            page: CursorURLPage::class,
        );
    }
}
