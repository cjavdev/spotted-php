<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Conversion\ListOf;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Episodes\EpisodeCheckParams;
use Spotted\Me\Episodes\EpisodeListParams;
use Spotted\Me\Episodes\EpisodeListResponse;
use Spotted\Me\Episodes\EpisodeRemoveParams;
use Spotted\Me\Episodes\EpisodeSaveParams;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\EpisodesRawContract;

final class EpisodesRawService implements EpisodesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a list of the episodes saved in the current Spotify user's library.<br/>
     * This API endpoint is in __beta__ and could change without warning. Please share any feedback that you have, or issues that you discover, in our [developer community forum](https://community.spotify.com/t5/Spotify-for-Developers/bd-p/Spotify_Developer).
     *
     * @param array{
     *   limit?: int, market?: string, offset?: int
     * }|EpisodeListParams $params
     *
     * @return BaseResponse<CursorURLPage<EpisodeListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|EpisodeListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = EpisodeListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/episodes',
            query: $parsed,
            options: $options,
            convert: EpisodeListResponse::class,
            page: CursorURLPage::class,
        );
    }

    /**
     * @api
     *
     * Check if one or more episodes is already saved in the current Spotify user's 'Your Episodes' library.<br/>
     * This API endpoint is in __beta__ and could change without warning. Please share any feedback that you have, or issues that you discover, in our [developer community forum](https://community.spotify.com/t5/Spotify-for-Developers/bd-p/Spotify_Developer)..
     *
     * @param array{ids: string}|EpisodeCheckParams $params
     *
     * @return BaseResponse<list<bool>>
     *
     * @throws APIException
     */
    public function check(
        array|EpisodeCheckParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = EpisodeCheckParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'me/episodes/contains',
            query: $parsed,
            options: $options,
            convert: new ListOf('bool'),
        );
    }

    /**
     * @api
     *
     * Remove one or more episodes from the current user's library.<br/>
     * This API endpoint is in __beta__ and could change without warning. Please share any feedback that you have, or issues that you discover, in our [developer community forum](https://community.spotify.com/t5/Spotify-for-Developers/bd-p/Spotify_Developer).
     *
     * @param array{ids?: list<string>}|EpisodeRemoveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        array|EpisodeRemoveParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = EpisodeRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: 'me/episodes',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Save one or more episodes to the current user's library.<br/>
     * This API endpoint is in __beta__ and could change without warning. Please share any feedback that you have, or issues that you discover, in our [developer community forum](https://community.spotify.com/t5/Spotify-for-Developers/bd-p/Spotify_Developer).
     *
     * @param array{ids: list<string>}|EpisodeSaveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function save(
        array|EpisodeSaveParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = EpisodeSaveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'me/episodes',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
