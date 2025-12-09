<?php

declare(strict_types=1);

namespace Spotted\Recommendations\RecommendationGetResponse;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type SeedShape = array{
 *   id?: string|null,
 *   afterFilteringSize?: int|null,
 *   afterRelinkingSize?: int|null,
 *   href?: string|null,
 *   initialPoolSize?: int|null,
 *   type?: string|null,
 * }
 */
final class Seed implements BaseModel
{
    /** @use SdkModel<SeedShape> */
    use SdkModel;

    /**
     * The id used to select this seed. This will be the same as the string used in the `seed_artists`, `seed_tracks` or `seed_genres` parameter.
     */
    #[Optional]
    public ?string $id;

    /**
     * The number of tracks available after min\_\* and max\_\* filters have been applied.
     */
    #[Optional]
    public ?int $afterFilteringSize;

    /**
     * The number of tracks available after relinking for regional availability.
     */
    #[Optional]
    public ?int $afterRelinkingSize;

    /**
     * A link to the full track or artist data for this seed. For tracks this will be a link to a Track Object. For artists a link to an Artist Object. For genre seeds, this value will be `null`.
     */
    #[Optional]
    public ?string $href;

    /**
     * The number of recommended tracks available for this seed.
     */
    #[Optional]
    public ?int $initialPoolSize;

    /**
     * The entity type of this seed. One of `artist`, `track` or `genre`.
     */
    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?int $afterFilteringSize = null,
        ?int $afterRelinkingSize = null,
        ?string $href = null,
        ?int $initialPoolSize = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $afterFilteringSize && $obj['afterFilteringSize'] = $afterFilteringSize;
        null !== $afterRelinkingSize && $obj['afterRelinkingSize'] = $afterRelinkingSize;
        null !== $href && $obj['href'] = $href;
        null !== $initialPoolSize && $obj['initialPoolSize'] = $initialPoolSize;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * The id used to select this seed. This will be the same as the string used in the `seed_artists`, `seed_tracks` or `seed_genres` parameter.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The number of tracks available after min\_\* and max\_\* filters have been applied.
     */
    public function withAfterFilteringSize(int $afterFilteringSize): self
    {
        $obj = clone $this;
        $obj['afterFilteringSize'] = $afterFilteringSize;

        return $obj;
    }

    /**
     * The number of tracks available after relinking for regional availability.
     */
    public function withAfterRelinkingSize(int $afterRelinkingSize): self
    {
        $obj = clone $this;
        $obj['afterRelinkingSize'] = $afterRelinkingSize;

        return $obj;
    }

    /**
     * A link to the full track or artist data for this seed. For tracks this will be a link to a Track Object. For artists a link to an Artist Object. For genre seeds, this value will be `null`.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * The number of recommended tracks available for this seed.
     */
    public function withInitialPoolSize(int $initialPoolSize): self
    {
        $obj = clone $this;
        $obj['initialPoolSize'] = $initialPoolSize;

        return $obj;
    }

    /**
     * The entity type of this seed. One of `artist`, `track` or `genre`.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
