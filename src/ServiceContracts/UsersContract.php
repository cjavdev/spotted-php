<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\Users\UserGetProfileResponse;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface UsersContract
{
    /**
     * @api
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveProfile(
        string $userID,
        RequestOptions|array|null $requestOptions = null
    ): UserGetProfileResponse;
}
