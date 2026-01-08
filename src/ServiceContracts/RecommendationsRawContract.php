<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Recommendations\RecommendationGetParams;
use Spotted\Recommendations\RecommendationGetResponse;
use Spotted\Recommendations\RecommendationListAvailableGenreSeedsResponse;
use Spotted\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface RecommendationsRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|RecommendationGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecommendationGetResponse>
     *
     * @throws APIException
     */
    public function get(
        array|RecommendationGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecommendationListAvailableGenreSeedsResponse>
     *
     * @throws APIException
     */
    public function listAvailableGenreSeeds(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
