<?php

declare(strict_types=1);

namespace Spotted\Services\Playlists;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\ImageObject;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Playlists\ImagesContract;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class ImagesService implements ImagesContract
{
    /**
     * @api
     */
    public ImagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ImagesRawService($client);
    }

    /**
     * @api
     *
     * Replace the image used to represent a specific playlist.
     *
     * @param string $playlistID path param: The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param string $body body param: Base64 encoded JPEG image data, maximum payload size is 256 KB
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        string $body,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($playlistID, $body, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the current image associated with a specific playlist.
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param RequestOpts|null $requestOptions
     *
     * @return list<ImageObject>
     *
     * @throws APIException
     */
    public function list(
        string $playlistID,
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($playlistID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
