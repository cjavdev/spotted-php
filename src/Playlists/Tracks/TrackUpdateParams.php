<?php

declare(strict_types=1);

namespace Spotted\Playlists\Tracks;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Either reorder or replace items in a playlist depending on the request's parameters.
 * To reorder items, include `range_start`, `insert_before`, `range_length` and `snapshot_id` in the request's body.
 * To replace items, include `uris` as either a query parameter or in the request's body.
 * Replacing items in a playlist will overwrite its existing items. This operation can be used for replacing or clearing items in a playlist.
 * <br/>
 * **Note**: Replace and reorder are mutually exclusive operations which share the same endpoint, but have different parameters.
 * These operations can't be applied together in a single request.
 *
 * @see Spotted\Services\Playlists\TracksService::update()
 *
 * @phpstan-type TrackUpdateParamsShape = array{
 *   insertBefore?: int|null,
 *   published?: bool|null,
 *   rangeLength?: int|null,
 *   rangeStart?: int|null,
 *   snapshotID?: string|null,
 *   uris?: list<string>|null,
 * }
 */
final class TrackUpdateParams implements BaseModel
{
    /** @use SdkModel<TrackUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The position where the items should be inserted.<br/>To reorder the items to the end of the playlist, simply set _insert_before_ to the position after the last item.<br/>Examples:<br/>To reorder the first item to the last position in a playlist with 10 items, set _range_start_ to 0, and _insert_before_ to 10.<br/>To reorder the last item in a playlist with 10 items to the start of the playlist, set _range_start_ to 9, and _insert_before_ to 0.
     */
    #[Optional('insert_before')]
    public ?int $insertBefore;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * The amount of items to be reordered. Defaults to 1 if not set.<br/>The range of items to be reordered begins from the _range_start_ position, and includes the _range_length_ subsequent items.<br/>Example:<br/>To move the items at index 9-10 to the start of the playlist, _range_start_ is set to 9, and _range_length_ is set to 2.
     */
    #[Optional('range_length')]
    public ?int $rangeLength;

    /**
     * The position of the first item to be reordered.
     */
    #[Optional('range_start')]
    public ?int $rangeStart;

    /**
     * The playlist's snapshot ID against which you want to make the changes.
     */
    #[Optional('snapshot_id')]
    public ?string $snapshotID;

    /** @var list<string>|null $uris */
    #[Optional(list: 'string')]
    public ?array $uris;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $uris
     */
    public static function with(
        ?int $insertBefore = null,
        ?bool $published = null,
        ?int $rangeLength = null,
        ?int $rangeStart = null,
        ?string $snapshotID = null,
        ?array $uris = null,
    ): self {
        $self = new self;

        null !== $insertBefore && $self['insertBefore'] = $insertBefore;
        null !== $published && $self['published'] = $published;
        null !== $rangeLength && $self['rangeLength'] = $rangeLength;
        null !== $rangeStart && $self['rangeStart'] = $rangeStart;
        null !== $snapshotID && $self['snapshotID'] = $snapshotID;
        null !== $uris && $self['uris'] = $uris;

        return $self;
    }

    /**
     * The position where the items should be inserted.<br/>To reorder the items to the end of the playlist, simply set _insert_before_ to the position after the last item.<br/>Examples:<br/>To reorder the first item to the last position in a playlist with 10 items, set _range_start_ to 0, and _insert_before_ to 10.<br/>To reorder the last item in a playlist with 10 items to the start of the playlist, set _range_start_ to 9, and _insert_before_ to 0.
     */
    public function withInsertBefore(int $insertBefore): self
    {
        $self = clone $this;
        $self['insertBefore'] = $insertBefore;

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
     * The amount of items to be reordered. Defaults to 1 if not set.<br/>The range of items to be reordered begins from the _range_start_ position, and includes the _range_length_ subsequent items.<br/>Example:<br/>To move the items at index 9-10 to the start of the playlist, _range_start_ is set to 9, and _range_length_ is set to 2.
     */
    public function withRangeLength(int $rangeLength): self
    {
        $self = clone $this;
        $self['rangeLength'] = $rangeLength;

        return $self;
    }

    /**
     * The position of the first item to be reordered.
     */
    public function withRangeStart(int $rangeStart): self
    {
        $self = clone $this;
        $self['rangeStart'] = $rangeStart;

        return $self;
    }

    /**
     * The playlist's snapshot ID against which you want to make the changes.
     */
    public function withSnapshotID(string $snapshotID): self
    {
        $self = clone $this;
        $self['snapshotID'] = $snapshotID;

        return $self;
    }

    /**
     * @param list<string> $uris
     */
    public function withUris(array $uris): self
    {
        $self = clone $this;
        $self['uris'] = $uris;

        return $self;
    }
}
