<?php

declare(strict_types=1);

namespace Spotted\Recommendations;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type RecommendationListAvailableGenreSeedsResponseShape = array{
 *   genres: list<string>
 * }
 */
final class RecommendationListAvailableGenreSeedsResponse implements BaseModel
{
    /** @use SdkModel<RecommendationListAvailableGenreSeedsResponseShape> */
    use SdkModel;

    /** @var list<string> $genres */
    #[Required(list: 'string')]
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

        $obj['genres'] = $genres;

        return $obj;
    }

    /**
     * @param list<string> $genres
     */
    public function withGenres(array $genres): self
    {
        $obj = clone $this;
        $obj['genres'] = $genres;

        return $obj;
    }
}
