<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Playlists;

use Spotted\Core\Exceptions\APIException;
use Spotted\ImageObject;
use Spotted\RequestOptions;

interface ImagesContract
{
    /**
     * @api
     *
     * @param string $body base64 encoded JPEG image data, maximum payload size is 256 KB
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        $body,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $playlistID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @return list<ImageObject>
     *
     * @throws APIException
     */
    public function list(
        string $playlistID,
        ?RequestOptions $requestOptions = null
    ): array;
}
