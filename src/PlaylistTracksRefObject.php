<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type PlaylistTracksRefObjectShape = array{
 *   href?: string|null, total?: int|null
 * }
 */
final class PlaylistTracksRefObject implements BaseModel
{
    /** @use SdkModel<PlaylistTracksRefObjectShape> */
    use SdkModel;

    /**
     * A link to the Web API endpoint where full details of the playlist's tracks can be retrieved.
     */
    #[Api(optional: true)]
    public ?string $href;

    /**
     * Number of tracks in the playlist.
     */
    #[Api(optional: true)]
    public ?int $total;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $href = null, ?int $total = null): self
    {
        $obj = new self;

        null !== $href && $obj['href'] = $href;
        null !== $total && $obj['total'] = $total;

        return $obj;
    }

    /**
     * A link to the Web API endpoint where full details of the playlist's tracks can be retrieved.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * Number of tracks in the playlist.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }
}
