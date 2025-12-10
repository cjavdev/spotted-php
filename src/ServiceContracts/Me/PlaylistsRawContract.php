<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Playlists\PlaylistListParams;
use Spotted\RequestOptions;
use Spotted\SimplifiedPlaylistObject;

interface PlaylistsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PlaylistListParams $params
     *
     * @return BaseResponse<CursorURLPage<SimplifiedPlaylistObject>>
     *
     * @throws APIException
     */
    public function list(
        array|PlaylistListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
