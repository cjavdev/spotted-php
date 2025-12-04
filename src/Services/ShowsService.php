<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\ShowsContract;
use Spotted\Shows\ShowBulkGetResponse;
use Spotted\Shows\ShowBulkRetrieveParams;
use Spotted\Shows\ShowGetResponse;
use Spotted\Shows\ShowListEpisodesParams;
use Spotted\Shows\ShowRetrieveParams;
use Spotted\SimplifiedEpisodeObject;

final class ShowsService implements ShowsContract
{
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
     * @param array{market?: string}|ShowRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|ShowRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ShowGetResponse {
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
     * @api
     *
     * Get Spotify catalog information for several shows based on their Spotify IDs.
     *
     * @param array{ids: string, market?: string}|ShowBulkRetrieveParams $params
     *
     * @throws APIException
     */
    public function bulkRetrieve(
        array|ShowBulkRetrieveParams $params,
        ?RequestOptions $requestOptions = null
    ): ShowBulkGetResponse {
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
     * @param array{
     *   limit?: int, market?: string, offset?: int
     * }|ShowListEpisodesParams $params
     *
     * @return CursorURLPage<SimplifiedEpisodeObject>
     *
     * @throws APIException
     */
    public function listEpisodes(
        string $id,
        array|ShowListEpisodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): CursorURLPage {
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
