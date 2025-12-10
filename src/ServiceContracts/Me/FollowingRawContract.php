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

interface FollowingRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|FollowingBulkRetrieveParams $params
     *
     * @return BaseResponse<FollowingBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|FollowingBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FollowingCheckParams $params
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|FollowingCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FollowingFollowParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function follow(
        array|FollowingFollowParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FollowingUnfollowParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function unfollow(
        array|FollowingUnfollowParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
