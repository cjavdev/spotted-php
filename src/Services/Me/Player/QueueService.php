<?php

declare(strict_types=1);

namespace Spotted\Services\Me\Player;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Player\Queue\QueueAddParams;
use Spotted\Me\Player\Queue\QueueGetResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\Player\QueueContract;

use const Spotted\Core\OMIT as omit;

final class QueueService implements QueueContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
        $uri,
        $deviceID = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['uri' => $uri, 'deviceID' => $deviceID];

        return $this->addRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function addRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = QueueAddParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'me/player/queue',
            query: $parsed,
            options: $options,
            convert: null,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'me/player/queue',
            options: $requestOptions,
            convert: QueueGetResponse::class,
        );
    }
}
