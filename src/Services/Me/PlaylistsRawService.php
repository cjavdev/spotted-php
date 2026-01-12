<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Playlists\PlaylistListParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\PlaylistsRawContract;
use Spotted\SimplifiedPlaylistObject;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class PlaylistsRawService implements PlaylistsRawContract
{
    // @phpstan-ignore-next-line
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<SimplifiedPlaylistObject>>
     *
     * @throws APIException
     */
    public function list(
        array|PlaylistListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
