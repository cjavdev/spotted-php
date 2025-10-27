<?php

declare(strict_types=1);

namespace Spotted\Playlists\Tracks;

use Spotted\Core\Attributes\Api;
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
 * @see Spotted\Playlists\Tracks->update
 *
 * @phpstan-type track_update_params = array{
 *   uris?: list<string>,
 *   insertBefore?: int,
 *   rangeLength?: int,
 *   rangeStart?: int,
 *   snapshotID?: string,
 * }
 */
final class TrackUpdateParams implements BaseModel
{
    /** @use SdkModel<track_update_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string>|null $uris */
    #[Api(list: 'string', optional: true)]
    public ?array $uris;

    /**
     * The position where the items should be inserted.<br/>To reorder the items to the end of the playlist, simply set _insert_before_ to the position after the last item.<br/>Examples:<br/>To reorder the first item to the last position in a playlist with 10 items, set _range_start_ to 0, and _insert_before_ to 10.<br/>To reorder the last item in a playlist with 10 items to the start of the playlist, set _range_start_ to 9, and _insert_before_ to 0.
     */
    #[Api('insert_before', optional: true)]
    public ?int $insertBefore;

    /**
     * The amount of items to be reordered. Defaults to 1 if not set.<br/>The range of items to be reordered begins from the _range_start_ position, and includes the _range_length_ subsequent items.<br/>Example:<br/>To move the items at index 9-10 to the start of the playlist, _range_start_ is set to 9, and _range_length_ is set to 2.
     */
    #[Api('range_length', optional: true)]
    public ?int $rangeLength;

    /**
     * The position of the first item to be reordered.
     */
    #[Api('range_start', optional: true)]
    public ?int $rangeStart;

    /**
     * The playlist's snapshot ID against which you want to make the changes.
     */
    #[Api('snapshot_id', optional: true)]
    public ?string $snapshotID;

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
        ?array $uris = null,
        ?int $insertBefore = null,
        ?int $rangeLength = null,
        ?int $rangeStart = null,
        ?string $snapshotID = null,
    ): self {
        $obj = new self;

        null !== $uris && $obj->uris = $uris;
        null !== $insertBefore && $obj->insertBefore = $insertBefore;
        null !== $rangeLength && $obj->rangeLength = $rangeLength;
        null !== $rangeStart && $obj->rangeStart = $rangeStart;
        null !== $snapshotID && $obj->snapshotID = $snapshotID;

        return $obj;
    }

    /**
     * @param list<string> $uris
     */
    public function withUris(array $uris): self
    {
        $obj = clone $this;
        $obj->uris = $uris;

        return $obj;
    }

    /**
     * The position where the items should be inserted.<br/>To reorder the items to the end of the playlist, simply set _insert_before_ to the position after the last item.<br/>Examples:<br/>To reorder the first item to the last position in a playlist with 10 items, set _range_start_ to 0, and _insert_before_ to 10.<br/>To reorder the last item in a playlist with 10 items to the start of the playlist, set _range_start_ to 9, and _insert_before_ to 0.
     */
    public function withInsertBefore(int $insertBefore): self
    {
        $obj = clone $this;
        $obj->insertBefore = $insertBefore;

        return $obj;
    }

    /**
     * The amount of items to be reordered. Defaults to 1 if not set.<br/>The range of items to be reordered begins from the _range_start_ position, and includes the _range_length_ subsequent items.<br/>Example:<br/>To move the items at index 9-10 to the start of the playlist, _range_start_ is set to 9, and _range_length_ is set to 2.
     */
    public function withRangeLength(int $rangeLength): self
    {
        $obj = clone $this;
        $obj->rangeLength = $rangeLength;

        return $obj;
    }

    /**
     * The position of the first item to be reordered.
     */
    public function withRangeStart(int $rangeStart): self
    {
        $obj = clone $this;
        $obj->rangeStart = $rangeStart;

        return $obj;
    }

    /**
     * The playlist's snapshot ID against which you want to make the changes.
     */
    public function withSnapshotID(string $snapshotID): self
    {
        $obj = clone $this;
        $obj->snapshotID = $snapshotID;

        return $obj;
    }
}
