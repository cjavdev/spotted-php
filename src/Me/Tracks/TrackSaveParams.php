<?php

declare(strict_types=1);

namespace Spotted\Me\Tracks;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Me\Tracks\TrackSaveParams\TimestampedID;

/**
 * Save one or more tracks to the current user's 'Your Music' library.
 *
 * @see Spotted\Services\Me\TracksService::save()
 *
 * @phpstan-type TrackSaveParamsShape = array{
 *   ids: list<string>,
 *   timestamped_ids?: list<TimestampedID|array{
 *     id: string, added_at: \DateTimeInterface
 *   }>,
 * }
 */
final class TrackSaveParams implements BaseModel
{
    /** @use SdkModel<TrackSaveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A JSON array of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `["4iV5W9uYEdYUVa79Axb7Rh", "1301WleyT98MSxVHPZCA6M"]`<br/>A maximum of 50 items can be specified in one request. _**Note**: if the `timestamped_ids` is present in the body, any IDs listed in the query parameters (deprecated) or the `ids` field in the body will be ignored._.
     *
     * @var list<string> $ids
     */
    #[Api(list: 'string')]
    public array $ids;

    /**
     * A JSON array of objects containing track IDs with their corresponding timestamps. Each object must include a track ID and an `added_at` timestamp. This allows you to specify when tracks were added to maintain a specific chronological order in the user's library.<br/>A maximum of 50 items can be specified in one request. _**Note**: if the `timestamped_ids` is present in the body, any IDs listed in the query parameters (deprecated) or the `ids` field in the body will be ignored._.
     *
     * @var list<TimestampedID>|null $timestamped_ids
     */
    #[Api(list: TimestampedID::class, optional: true)]
    public ?array $timestamped_ids;

    /**
     * `new TrackSaveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackSaveParams::with(ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackSaveParams)->withIDs(...)
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
     * @param list<string> $ids
     * @param list<TimestampedID|array{
     *   id: string, added_at: \DateTimeInterface
     * }> $timestamped_ids
     */
    public static function with(array $ids, ?array $timestamped_ids = null): self
    {
        $obj = new self;

        $obj['ids'] = $ids;

        null !== $timestamped_ids && $obj['timestamped_ids'] = $timestamped_ids;

        return $obj;
    }

    /**
     * A JSON array of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `["4iV5W9uYEdYUVa79Axb7Rh", "1301WleyT98MSxVHPZCA6M"]`<br/>A maximum of 50 items can be specified in one request. _**Note**: if the `timestamped_ids` is present in the body, any IDs listed in the query parameters (deprecated) or the `ids` field in the body will be ignored._.
     *
     * @param list<string> $ids
     */
    public function withIDs(array $ids): self
    {
        $obj = clone $this;
        $obj['ids'] = $ids;

        return $obj;
    }

    /**
     * A JSON array of objects containing track IDs with their corresponding timestamps. Each object must include a track ID and an `added_at` timestamp. This allows you to specify when tracks were added to maintain a specific chronological order in the user's library.<br/>A maximum of 50 items can be specified in one request. _**Note**: if the `timestamped_ids` is present in the body, any IDs listed in the query parameters (deprecated) or the `ids` field in the body will be ignored._.
     *
     * @param list<TimestampedID|array{
     *   id: string, added_at: \DateTimeInterface
     * }> $timestampedIDs
     */
    public function withTimestampedIDs(array $timestampedIDs): self
    {
        $obj = clone $this;
        $obj['timestamped_ids'] = $timestampedIDs;

        return $obj;
    }
}
