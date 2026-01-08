<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Playlists\PlaylistListParams;
use Spotted\RequestOptions;
use Spotted\SimplifiedPlaylistObject;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface PlaylistsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PlaylistListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<SimplifiedPlaylistObject>>
     *
     * @throws APIException
     */
    public function list(
        array|PlaylistListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
