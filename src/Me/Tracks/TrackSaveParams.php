<?php

declare(strict_types=1);

namespace Spotted\Me\Tracks;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Me\Tracks\TrackSaveParams\TimestampedID;

/**
 * Save one or more tracks to the current user's 'Your Music' library.
 *
 * **Note:** This endpoint is deprecated. Use [Save Items to Library](/documentation/web-api/reference/save-library-items) instead.
 *
 * @deprecated
 * @see Spotted\Services\Me\TracksService::save()
 *
 * @phpstan-import-type TimestampedIDShape from \Spotted\Me\Tracks\TrackSaveParams\TimestampedID
 *
 * @phpstan-type TrackSaveParamsShape = array{
 *   ids: list<string>,
 *   published?: bool|null,
 *   timestampedIDs?: list<TimestampedID|TimestampedIDShape>|null,
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
    #[Required(list: 'string')]
    public array $ids;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * A JSON array of objects containing track IDs with their corresponding timestamps. Each object must include a track ID and an `added_at` timestamp. This allows you to specify when tracks were added to maintain a specific chronological order in the user's library.<br/>A maximum of 50 items can be specified in one request. _**Note**: if the `timestamped_ids` is present in the body, any IDs listed in the query parameters (deprecated) or the `ids` field in the body will be ignored._.
     *
     * @var list<TimestampedID>|null $timestampedIDs
     */
    #[Optional('timestamped_ids', list: TimestampedID::class)]
    public ?array $timestampedIDs;

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
     * @param list<TimestampedID|TimestampedIDShape>|null $timestampedIDs
     */
    public static function with(
        array $ids,
        ?bool $published = null,
        ?array $timestampedIDs = null
    ): self {
        $self = new self;

        $self['ids'] = $ids;

        null !== $published && $self['published'] = $published;
        null !== $timestampedIDs && $self['timestampedIDs'] = $timestampedIDs;

        return $self;
    }

    /**
     * A JSON array of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `["4iV5W9uYEdYUVa79Axb7Rh", "1301WleyT98MSxVHPZCA6M"]`<br/>A maximum of 50 items can be specified in one request. _**Note**: if the `timestamped_ids` is present in the body, any IDs listed in the query parameters (deprecated) or the `ids` field in the body will be ignored._.
     *
     * @param list<string> $ids
     */
    public function withIDs(array $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

        return $self;
    }

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }

    /**
     * A JSON array of objects containing track IDs with their corresponding timestamps. Each object must include a track ID and an `added_at` timestamp. This allows you to specify when tracks were added to maintain a specific chronological order in the user's library.<br/>A maximum of 50 items can be specified in one request. _**Note**: if the `timestamped_ids` is present in the body, any IDs listed in the query parameters (deprecated) or the `ids` field in the body will be ignored._.
     *
     * @param list<TimestampedID|TimestampedIDShape> $timestampedIDs
     */
    public function withTimestampedIDs(array $timestampedIDs): self
    {
        $self = clone $this;
        $self['timestampedIDs'] = $timestampedIDs;

        return $self;
    }
}
