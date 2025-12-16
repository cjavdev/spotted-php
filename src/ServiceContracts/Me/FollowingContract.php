<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Following\FollowingBulkGetResponse;
use Spotted\Me\Following\FollowingCheckParams\Type;
use Spotted\RequestOptions;

interface FollowingContract
{
    /**
     * @api
     *
     * @param 'artist' $type the ID type: currently only `artist` is supported
     * @param string $after the last artist ID retrieved from the previous request
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        string $type = 'artist',
        ?string $after = null,
        int $limit = 20,
        ?RequestOptions $requestOptions = null,
    ): FollowingBulkGetResponse;

    /**
     * @api
     *
     * @param string $ids A comma-separated list of the artist or the user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids) to check. For example: `ids=74ASZWbe4lXaubB36ztrGX,08td7MxkoHQkXnWAYD8d6Q`. A maximum of 50 IDs can be sent in one request.
     * @param 'artist'|'user'|Type $type the ID type: either `artist` or `user`
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        string $ids,
        string|Type $type,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param list<string> $ids A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids).
     * For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     *
     * @throws APIException
     */
    public function follow(
        array $ids,
        ?bool $published = null,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $ids A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._
     * @param bool $published The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists)
     *
     * @throws APIException
     */
    public function unfollow(
        ?array $ids = null,
        ?bool $published = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
