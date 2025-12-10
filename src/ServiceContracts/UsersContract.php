<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;
use Spotted\Users\UserGetProfileResponse;

interface UsersContract
{
    /**
     * @api
     *
     * @param string $userID the user's [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids)
     *
     * @throws APIException
     */
    public function retrieveProfile(
        string $userID,
        ?RequestOptions $requestOptions = null
    ): UserGetProfileResponse;
}
