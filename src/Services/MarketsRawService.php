<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Markets\MarketListResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\MarketsRawContract;

final class MarketsRawService implements MarketsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the list of markets where Spotify is available.
     *
     * @return BaseResponse<MarketListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'markets',
            options: $requestOptions,
            convert: MarketListResponse::class,
        );
    }
}
