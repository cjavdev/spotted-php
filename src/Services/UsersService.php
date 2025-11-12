<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\UsersContract;
use Spotted\Services\Users\PlaylistsService;
use Spotted\Users\UserGetProfileResponse;

final class UsersService implements UsersContract
{
    /**
     * @api
     */
    public PlaylistsService $playlists;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->playlists = new PlaylistsService($client);
    }

    /**
     * @api
     *
     * Get public profile information about a Spotify user.
     *
     * @throws APIException
     */
    public function retrieveProfile(
        string $userID,
        ?RequestOptions $requestOptions = null
    ): UserGetProfileResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['users/%1$s', $userID],
            options: $requestOptions,
            convert: UserGetProfileResponse::class,
        );
    }
}
