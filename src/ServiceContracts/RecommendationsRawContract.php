<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Recommendations\RecommendationGetParams;
use Spotted\Recommendations\RecommendationGetResponse;
use Spotted\Recommendations\RecommendationListAvailableGenreSeedsResponse;
use Spotted\RequestOptions;

interface RecommendationsRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param array<mixed>|RecommendationGetParams $params
     *
     * @return BaseResponse<RecommendationGetResponse>
     *
     * @throws APIException
     */
    public function get(
        array|RecommendationGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @return BaseResponse<RecommendationListAvailableGenreSeedsResponse>
     *
     * @throws APIException
     */
    public function listAvailableGenreSeeds(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
