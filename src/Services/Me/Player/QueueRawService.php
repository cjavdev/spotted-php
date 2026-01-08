<?php

declare(strict_types=1);

namespace Spotted\Services\Me\Player;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\Core\Util;
use Spotted\Me\Player\Queue\QueueAddParams;
use Spotted\Me\Player\Queue\QueueGetResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\Player\QueueRawContract;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class QueueRawService implements QueueRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add an item to be played next in the user's current playback queue. This API only works for users who have Spotify Premium. The order of execution is not guaranteed when you use this API with other Player API endpoints.
     *
     * @param array{uri: string, deviceID?: string}|QueueAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function add(
        array|QueueAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueueAddParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'me/player/queue',
            query: Util::array_transform_keys($parsed, ['deviceID' => 'device_id']),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get the list of objects that make up the user's queue.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueGetResponse>
     *
     * @throws APIException
     */
    public function get(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/player/queue',
            options: $requestOptions,
            convert: QueueGetResponse::class,
        );
    }
}
