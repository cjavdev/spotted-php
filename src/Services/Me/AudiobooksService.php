<?php

declare(strict_types=1);

namespace Spotted\Services\Me;

use Spotted\Client;
use Spotted\Core\Exceptions\APIException;
use Spotted\CursorURLPage;
use Spotted\Me\Audiobooks\AudiobookListResponse;
use Spotted\RequestOptions;
use Spotted\ServiceContracts\Me\AudiobooksContract;

final class AudiobooksService implements AudiobooksContract
{
    /**
     * @api
     */
    public AudiobooksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AudiobooksRawService($client);
    }

    /**
     * @api
     *
     * Get a list of the audiobooks saved in the current Spotify user's 'Your Music' library.
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @return CursorURLPage<AudiobookListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $limit = 20,
        int $offset = 0,
        ?RequestOptions $requestOptions = null
    ): CursorURLPage {
        $params = ['limit' => $limit, 'offset' => $offset];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check if one or more audiobooks are already saved in the current Spotify user's library.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=18yVqkdbdRvS24c0Ilj2ci,1HGw3J3NxZO1TP1BTtVhpZ`. Maximum: 50 IDs.
     *
     * @return list<bool>
     *
     * @throws APIException
     */
    public function check(
        string $ids,
        ?RequestOptions $requestOptions = null
    ): array {
        $params = ['ids' => $ids];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->check(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove one or more audiobooks from the Spotify user's library.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=18yVqkdbdRvS24c0Ilj2ci,1HGw3J3NxZO1TP1BTtVhpZ`. Maximum: 50 IDs.
     *
     * @throws APIException
     */
    public function remove(
        string $ids,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['ids' => $ids];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Save one or more audiobooks to the current Spotify user's library.
     *
     * @param string $ids A comma-separated list of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `ids=18yVqkdbdRvS24c0Ilj2ci,1HGw3J3NxZO1TP1BTtVhpZ`. Maximum: 50 IDs.
     *
     * @throws APIException
     */
    public function save(
        string $ids,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['ids' => $ids];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->save(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
