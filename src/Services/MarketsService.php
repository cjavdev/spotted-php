<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Markets\MarketListResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\MarketsContract;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): MarketListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
