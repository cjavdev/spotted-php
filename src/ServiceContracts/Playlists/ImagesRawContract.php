<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Playlists;

use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\ImageObject;
use Spotted\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface ImagesRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
