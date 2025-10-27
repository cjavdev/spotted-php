<?php

declare(strict_types=1);

namespace Spotted\Playlists\Tracks;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type track_add_response = array{snapshotID?: string}
 */
final class TrackAddResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<track_add_response> */
    use SdkModel;

    use SdkResponse;

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
     */
    public static function with(?string $snapshotID = null): self
    {
        $obj = new self;

        null !== $snapshotID && $obj->snapshotID = $snapshotID;

        return $obj;
    }

    public function withSnapshotID(string $snapshotID): self
    {
        $obj = clone $this;
        $obj->snapshotID = $snapshotID;

        return $obj;
    }
}
