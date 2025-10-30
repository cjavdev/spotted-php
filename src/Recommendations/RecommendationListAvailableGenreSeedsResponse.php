<?php

declare(strict_types=1);

namespace Spotted\Recommendations;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type RecommendationListAvailableGenreSeedsResponseShape = array{
 *   genres: list<string>
 * }
 */
final class RecommendationListAvailableGenreSeedsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RecommendationListAvailableGenreSeedsResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<string> $genres */
    #[Api(list: 'string')]
    public array $genres;

    /**
     * `new RecommendationListAvailableGenreSeedsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecommendationListAvailableGenreSeedsResponse::with(genres: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecommendationListAvailableGenreSeedsResponse)->withGenres(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $genres
     */
    public static function with(array $genres): self
    {
        $obj = new self;

        $obj->genres = $genres;

        return $obj;
    }

    /**
     * @param list<string> $genres
     */
    public function withGenres(array $genres): self
    {
        $obj = clone $this;
        $obj->genres = $genres;

        return $obj;
    }
}
