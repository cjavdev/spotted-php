<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\UsersRawContract;
use Spotted\Users\UserGetProfileResponse;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class UsersRawService implements UsersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get public profile information about a Spotify user.
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserGetProfileResponse>
     *
     * @throws APIException
     */
    public function retrieveProfile(
        string $userID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['users/%1$s', $userID],
            options: $requestOptions,
            convert: UserGetProfileResponse::class,
        );
    }
}
