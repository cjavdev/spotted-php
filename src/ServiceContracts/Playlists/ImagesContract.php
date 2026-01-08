<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Playlists;

use Spotted\Core\Exceptions\APIException;
use Spotted\ImageObject;
use Spotted\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface ImagesContract
{
    /**
     * @api
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
    ): string;

    /**
     * @api
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
    ): array;
}
