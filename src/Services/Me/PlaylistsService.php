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
     * @param array{limit?: int, offset?: int}|PlaylistListParams $params
     *
     * @return CursorURLPage<SimplifiedPlaylistObject>
     *
     * @throws APIException
     */
    public function list(
        array|PlaylistListParams $params,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        [$parsed, $options] = PlaylistListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
