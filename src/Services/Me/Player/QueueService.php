<?php

declare(strict_types=1);

namespace Spotted\Services\Me\Player;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Player\Queue\QueueAddParams;
use Spotted\Me\Player\Queue\QueueGetResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\Player\QueueContract;

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
     * @param array{uri: string, device_id?: string}|QueueAddParams $params
     *
     * @throws APIException
     */
    public function add(
        array|QueueAddParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = QueueAddParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'me/player/queue',
            query: $parsed,
            options: $options,
            convert: null,
        );

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
        /** @var BaseResponse<QueueGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'me/player/queue',
            options: $requestOptions,
            convert: QueueGetResponse::class,
        );

        return $response->parse();
    }
}
