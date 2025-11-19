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
