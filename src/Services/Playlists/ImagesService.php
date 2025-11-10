<?php

declare(strict_types=1);

namespace Spotted\Services\Playlists;

use Spotted\Client;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\ImageObject;
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
     * @throws APIException
     */
    public function update(
        string $playlistID,
        string $body,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['playlists/%1$s/images', $playlistID],
            headers: ['Content-Type' => 'image/jpeg'],
            body: STAINLESS_FIXME_parsed['body'],
            options: $requestOptions,
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
