<?php

declare(strict_types=1);

namespace Spotted\Services\Playlists;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\ImageObject;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Playlists\ImagesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class ImagesRawService implements ImagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Replace the image used to represent a specific playlist.
     *
     * @param string $playlistID path param: The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param string $body body param: Base64 encoded JPEG image data, maximum payload size is 256 KB
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        string $body,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['playlists/%1$s/images', $playlistID],
            headers: [
                'Content-Type' => 'image/jpeg', 'Accept' => 'application/binary',
            ],
            body: $body,
            options: $requestOptions,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Get the current image associated with a specific playlist.
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<ImageObject>>
     *
     * @throws APIException
     */
    public function list(
        string $playlistID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['playlists/%1$s/images', $playlistID],
            options: $requestOptions,
            convert: new ListOf(ImageObject::class),
        );
    }
}
