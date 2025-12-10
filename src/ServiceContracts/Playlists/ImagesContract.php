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
     * @param string $playlistID path param: The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
     * @param string $body body param: Base64 encoded JPEG image data, maximum payload size is 256 KB
     *
     * @throws APIException
     */
    public function update(
        string $playlistID,
        string $body,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param string $playlistID the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) of the playlist
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
