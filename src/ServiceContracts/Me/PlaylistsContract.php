<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\SimplifiedPlaylistObject;

use const Spotted\Core\OMIT as omit;

interface PlaylistsContract
{
    /**
     * @api
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
    ): CursorURLPage;

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
    ): CursorURLPage;
}
