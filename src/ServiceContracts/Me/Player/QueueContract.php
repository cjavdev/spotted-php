<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me\Player;

use Spotted\Core\Exceptions\APIException;
use Spotted\Me\Player\Queue\QueueGetResponse;
use Spotted\RequestOptions;

interface QueueContract
{
    /**
     * @api
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
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse;
}
