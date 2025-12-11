<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\PlaylistsContract;
use Spotted\SimplifiedPlaylistObject;

final class PlaylistsService implements PlaylistsContract
{
    /**
     * @api
     */
    public PlaylistsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PlaylistsRawService($client);
    }

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
        int $limit = 20,
        int $offset = 0,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        $params = Util::removeNulls(['limit' => $limit, 'offset' => $offset]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
