<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Browse;

use Spotted\Browse\Categories\CategoryGetPlaylistsResponse;
use Spotted\Browse\Categories\CategoryGetResponse;
use Spotted\Browse\Categories\CategoryListResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

interface CategoriesContract
{
    /**
     * @api
     *
     * @param string $categoryID the [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) for the category
     * @param string $locale The desired language, consisting of an [ISO 639-1](http://en.wikipedia.org/wiki/ISO_639-1) language code and an [ISO 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2), joined by an underscore. For example: `es_MX`, meaning &quot;Spanish (Mexico)&quot;. Provide this parameter if you want the category strings returned in a particular language.<br/> _**Note**: if `locale` is not supplied, or if the specified language is not available, the category strings returned will be in the Spotify default language (American English)._
     *
     * @throws APIException
     */
    public function retrieve(
        string $categoryID,
        ?string $locale = null,
        ?RequestOptions $requestOptions = null,
    ): CategoryGetResponse;

    /**
     * @api
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param string $locale The desired language, consisting of an [ISO 639-1](http://en.wikipedia.org/wiki/ISO_639-1) language code and an [ISO 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2), joined by an underscore. For example: `es_MX`, meaning &quot;Spanish (Mexico)&quot;. Provide this parameter if you want the category strings returned in a particular language.<br/> _**Note**: if `locale` is not supplied, or if the specified language is not available, the category strings returned will be in the Spotify default language (American English)._
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @throws APIException
     */
    public function list(
        int $limit = 20,
        ?string $locale = null,
        int $offset = 0,
        ?RequestOptions $requestOptions = null,
    ): CategoryListResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $categoryID the [Spotify category ID](/documentation/web-api/concepts/spotify-uris-ids) for the category
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @throws APIException
     */
    public function getPlaylists(
        string $categoryID,
        int $limit = 20,
        int $offset = 0,
        ?RequestOptions $requestOptions = null,
    ): CategoryGetPlaylistsResponse;
}
