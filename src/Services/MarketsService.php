<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Markets\MarketListResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\MarketsContract;

final class MarketsService implements MarketsContract
{
    /**
     * @api
     */
    public MarketsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MarketsRawService($client);
    }

    /**
     * @api
     *
     * Get the list of markets where Spotify is available.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MarketListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
