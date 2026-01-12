<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Me;

use Spotted\ArtistObject;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Top\TopListTopArtistsParams;
use Spotted\Me\Top\TopListTopTracksParams;
use Spotted\RequestOptions;
use Spotted\TrackObject;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
interface TopRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TopListTopArtistsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<ArtistObject>>
     *
     * @throws APIException
     */
    public function listTopArtists(
        array|TopListTopArtistsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TopListTopTracksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<TrackObject>>
     *
     * @throws APIException
     */
    public function listTopTracks(
        array|TopListTopTracksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
