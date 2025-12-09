<?php

declare(strict_types=1);

namespace Spotted\Playlists\Tracks;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type TrackUpdateResponseShape = array{snapshotID?: string|null}
 */
final class TrackUpdateResponse implements BaseModel
{
    /** @use SdkModel<TrackUpdateResponseShape> */
    use SdkModel;

    #[Optional('snapshot_id')]
    public ?string $snapshotID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $snapshotID = null): self
    {
        $obj = new self;

        null !== $snapshotID && $obj['snapshotID'] = $snapshotID;

        return $obj;
    }

    public function withSnapshotID(string $snapshotID): self
    {
        $obj = clone $this;
        $obj['snapshotID'] = $snapshotID;

        return $obj;
    }
}
