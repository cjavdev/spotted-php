<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Exceptions\APIException;
use Spotted\Playlists\PlaylistGetResponse;
use Spotted\Playlists\PlaylistRetrieveParams;
use Spotted\Playlists\PlaylistUpdateParams;
use Spotted\RequestOptions;

interface PlaylistsContract
{
    /**
     * @api
     *
     * @param array<mixed>|PlaylistRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $playlistID,
        array|PlaylistRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): PlaylistGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|PlaylistUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        array|PlaylistUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
