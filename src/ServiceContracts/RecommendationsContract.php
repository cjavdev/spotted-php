<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts;

use Spotted\Core\Exceptions\APIException;
use Spotted\Recommendations\RecommendationGetParams;
use Spotted\Recommendations\RecommendationGetResponse;
use Spotted\Recommendations\RecommendationListAvailableGenreSeedsResponse;
use Spotted\RequestOptions;

interface RecommendationsContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param array<mixed>|RecommendationGetParams $params
     *
     * @throws APIException
     */
    public function get(
        array|RecommendationGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecommendationGetResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @throws APIException
     */
    public function listAvailableGenreSeeds(
        ?RequestOptions $requestOptions = null
    ): RecommendationListAvailableGenreSeedsResponse;
}
