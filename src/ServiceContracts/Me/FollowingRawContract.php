<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Following\FollowingBulkGetResponse;
use Spotted\Me\Following\FollowingBulkRetrieveParams;
use Spotted\Me\Following\FollowingCheckParams;
use Spotted\Me\Following\FollowingFollowParams;
use Spotted\Me\Following\FollowingUnfollowParams;
use Spotted\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface FollowingRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FollowingBulkRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FollowingBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|FollowingBulkRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|FollowingCheckParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|FollowingCheckParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|FollowingFollowParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function follow(
        array|FollowingFollowParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|FollowingUnfollowParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function unfollow(
        array|FollowingUnfollowParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
