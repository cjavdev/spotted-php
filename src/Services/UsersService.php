<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\UsersContract;
use Spotted\Services\Users\PlaylistsService;
use Spotted\Users\UserGetProfileResponse;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class UsersService implements UsersContract
{
    /**
     * @api
     */
    public UsersRawService $raw;

    /**
     * @api
     */
    public PlaylistsService $playlists;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsersRawService($client);
        $this->playlists = new PlaylistsService($client);
    }

    /**
     * @api
     *
     * Get public profile information about a Spotify user.
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveProfile(
        string $userID,
        RequestOptions|array|null $requestOptions = null
    ): UserGetProfileResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveProfile($userID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
