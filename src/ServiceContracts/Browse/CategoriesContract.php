<?php

declare(strict_types=1);

namespace Spotted\ServiceContracts\Browse;

use Spotted\Browse\Categories\CategoryGetPlaylistsResponse;
use Spotted\Browse\Categories\CategoryGetResponse;
use Spotted\Browse\Categories\CategoryListResponse;
use Spotted\Core\Exceptions\APIException;
use Spotted\RequestOptions;

use const Spotted\Core\OMIT as omit;

interface CategoriesContract
{
    /**
     * @api
     *
     * @param string $locale The desired language, consisting of an [ISO 639-1](http://en.wikipedia.org/wiki/ISO_639-1) language code and an [ISO 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2), joined by an underscore. For example: `es_MX`, meaning &quot;Spanish (Mexico)&quot;. Provide this parameter if you want the category strings returned in a particular language.<br/> _**Note**: if `locale` is not supplied, or if the specified language is not available, the category strings returned will be in the Spotify default language (American English)._
     *
     * @throws APIException
     */
    public function retrieve(
        string $categoryID,
        $locale = omit,
        ?RequestOptions $requestOptions = null,
    ): CategoryGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $categoryID,
        array $params,
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
        $limit = omit,
        $locale = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): CategoryListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CategoryListResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param int $limit The maximum number of items to return. Default: 20. Minimum: 1. Maximum: 50.
     * @param int $offset The index of the first item to return. Default: 0 (the first item). Use with limit to get the next set of items.
     *
     * @throws APIException
     */
    public function getPlaylists(
        string $categoryID,
        $limit = omit,
        $offset = omit,
        ?RequestOptions $requestOptions = null,
    ): CategoryGetPlaylistsResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getPlaylistsRaw(
        string $categoryID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CategoryGetPlaylistsResponse;
}
