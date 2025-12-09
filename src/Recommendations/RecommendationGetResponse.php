<?php

declare(strict_types=1);

namespace Spotted\Recommendations;

use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalIDObject;
use Spotted\ExternalURLObject;
use Spotted\LinkedTrackObject;
use Spotted\Recommendations\RecommendationGetResponse\Seed;
use Spotted\SimplifiedArtistObject;
use Spotted\TrackObject;
use Spotted\TrackObject\Album;
use Spotted\TrackObject\Type;
use Spotted\TrackRestrictionObject;

/**
 * @phpstan-type RecommendationGetResponseShape = array{
 *   seeds: list<Seed>, tracks: list<TrackObject>
 * }
 */
final class RecommendationGetResponse implements BaseModel
{
    /** @use SdkModel<RecommendationGetResponseShape> */
    use SdkModel;

    /**
     * An array of recommendation seed objects.
     *
     * @var list<Seed> $seeds
     */
    #[Required(list: Seed::class)]
    public array $seeds;

    /**
     * An array of track objects ordered according to the parameters supplied.
     *
     * @var list<TrackObject> $tracks
     */
    #[Required(list: TrackObject::class)]
    public array $tracks;

    /**
     * `new RecommendationGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecommendationGetResponse::with(seeds: ..., tracks: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecommendationGetResponse)->withSeeds(...)->withTracks(...)
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
     * @param list<Seed|array{
     *   id?: string|null,
     *   afterFilteringSize?: int|null,
     *   afterRelinkingSize?: int|null,
     *   href?: string|null,
     *   initialPoolSize?: int|null,
     *   type?: string|null,
     * }> $seeds
     * @param list<TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   availableMarkets?: list<string>|null,
     *   discNumber?: int|null,
     *   durationMs?: int|null,
     *   explicit?: bool|null,
     *   externalIDs?: ExternalIDObject|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   isLocal?: bool|null,
     *   isPlayable?: bool|null,
     *   linkedFrom?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   previewURL?: string|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   trackNumber?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }> $tracks
     */
    public static function with(array $seeds, array $tracks): self
    {
        $obj = new self;

        $obj['seeds'] = $seeds;
        $obj['tracks'] = $tracks;

        return $obj;
    }

    /**
     * An array of recommendation seed objects.
     *
     * @param list<Seed|array{
     *   id?: string|null,
     *   afterFilteringSize?: int|null,
     *   afterRelinkingSize?: int|null,
     *   href?: string|null,
     *   initialPoolSize?: int|null,
     *   type?: string|null,
     * }> $seeds
     */
    public function withSeeds(array $seeds): self
    {
        $obj = clone $this;
        $obj['seeds'] = $seeds;

        return $obj;
    }

    /**
     * An array of track objects ordered according to the parameters supplied.
     *
     * @param list<TrackObject|array{
     *   id?: string|null,
     *   album?: Album|null,
     *   artists?: list<SimplifiedArtistObject>|null,
     *   availableMarkets?: list<string>|null,
     *   discNumber?: int|null,
     *   durationMs?: int|null,
     *   explicit?: bool|null,
     *   externalIDs?: ExternalIDObject|null,
     *   externalURLs?: ExternalURLObject|null,
     *   href?: string|null,
     *   isLocal?: bool|null,
     *   isPlayable?: bool|null,
     *   linkedFrom?: LinkedTrackObject|null,
     *   name?: string|null,
     *   popularity?: int|null,
     *   previewURL?: string|null,
     *   restrictions?: TrackRestrictionObject|null,
     *   trackNumber?: int|null,
     *   type?: value-of<Type>|null,
     *   uri?: string|null,
     * }> $tracks
     */
    public function withTracks(array $tracks): self
    {
        $obj = clone $this;
        $obj['tracks'] = $tracks;

        return $obj;
    }
}
