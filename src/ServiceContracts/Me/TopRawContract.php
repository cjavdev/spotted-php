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

interface TopRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|TopListTopArtistsParams $params
     *
     * @return BaseResponse<CursorURLPage<ArtistObject>>
     *
     * @throws APIException
     */
    public function listTopArtists(
        array|TopListTopArtistsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|TopListTopTracksParams $params
     *
     * @return BaseResponse<CursorURLPage<TrackObject>>
     *
     * @throws APIException
     */
    public function listTopTracks(
        array|TopListTopTracksParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
