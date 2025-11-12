<?php

declare(strict_types=1);

namespace Spotted\Playlists\Tracks;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type TrackRemoveResponseShape = array{snapshot_id?: string|null}
 */
final class TrackRemoveResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TrackRemoveResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?string $snapshot_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $snapshot_id = null): self
    {
        $obj = new self;

        null !== $snapshot_id && $obj->snapshot_id = $snapshot_id;

        return $obj;
    }

    public function withSnapshotID(string $snapshotID): self
    {
        $obj = clone $this;
        $obj->snapshot_id = $snapshotID;

        return $obj;
    }
}
