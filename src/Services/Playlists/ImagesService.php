<?php

declare(strict_types=1);

namespace Spotted\Services\Playlists;

use Spotted\Client;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\ImageObject;
use Spotted\Playlists\Images\ImageUpdateParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Playlists\ImagesContract;

final class ImagesService implements ImagesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Replace the image used to represent a specific playlist.
     *
     * @param string $body base64 encoded JPEG image data, maximum payload size is 256 KB
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        $body,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['body' => $body];

        return $this->updateRaw($playlistID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ImageUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['playlists/%1$s/images', $playlistID],
            headers: ['Content-Type' => 'image/jpeg'],
            body: $parsed['body'],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get the current image associated with a specific playlist.
     *
     * @return list<ImageObject>
     *
     * @throws APIException
     */
    public function list(
        string $playlistID,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['playlists/%1$s/images', $playlistID],
            options: $requestOptions,
            convert: new ListOf(ImageObject::class),
        );
    }
}
