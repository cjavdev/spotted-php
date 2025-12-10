<?php

declare(strict_types=1);

namespace Spotted\Services\Me\Player;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Player\Queue\QueueGetResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\Player\QueueContract;

final class QueueService implements QueueContract
{
    /**
     * @api
     */
    public QueueRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new QueueRawService($client);
    }

    /**
     * @api
     *
     * Add an item to be played next in the user's current playback queue. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param string $uri The uri of the item to add to the queue. Must be a track or an episode uri.
     * @param string $deviceID The id of the device this command is targeting. If
     * not supplied, the user's currently active device is the target.
     *
     * @throws APIException
     */
    public function add(
        string $uri,
        ?string $deviceID = null,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['uri' => $uri, 'deviceID' => $deviceID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the list of objects that make up the user's queue.
     *
     * @throws APIException
     */
    public function get(
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(requestOptions: $requestOptions);

        return $response->parse();
    }
}
