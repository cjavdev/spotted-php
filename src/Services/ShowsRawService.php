<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Contracts\BaseResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\ShowsRawContract;
use Spotted\Shows\ShowBulkGetResponse;
use Spotted\Shows\ShowBulkRetrieveParams;
use Spotted\Shows\ShowGetResponse;
use Spotted\Shows\ShowListEpisodesParams;
use Spotted\Shows\ShowRetrieveParams;
use Spotted\SimplifiedEpisodeObject;

/**
 * @phpstan-import-type RequestOpts from \Spotted\RequestOptions
 */
final class ShowsRawService implements ShowsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Spotify catalog information for a single show identified by its
     * unique Spotify ID.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the show
     * @param array{market?: string}|ShowRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ShowGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|ShowRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ShowRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['shows/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: ShowGetResponse::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Get Spotify catalog information for several shows based on their Spotify IDs.
     *
     * @param array{ids: string, market?: string}|ShowBulkRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ShowBulkGetResponse>
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ShowBulkRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ShowBulkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'shows',
            query: $parsed,
            options: $options,
            convert: ShowBulkGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Spotify catalog information about an show’s episodes. Optional parameters can be used to limit the number of episodes returned.
     *
     * @param string $id the [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids)
     * for the show
     * @param array{
     *   limit?: int, market?: string, offset?: int
     * }|ShowListEpisodesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CursorURLPage<SimplifiedEpisodeObject>>
     *
     * @throws APIException
     */
    public function listEpisodes(
        string $id,
        array|ShowListEpisodesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ShowListEpisodesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['shows/%1$s/episodes', $id],
            query: $parsed,
            options: $options,
            convert: SimplifiedEpisodeObject::class,
            page: CursorURLPage::class,
        );
    }
}
