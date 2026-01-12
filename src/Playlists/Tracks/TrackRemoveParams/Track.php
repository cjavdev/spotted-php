<?php

declare(strict_types=1);

namespace Spotted\Playlists\Tracks\TrackRemoveParams;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type TrackShape = array{uri?: string|null}
 */
final class Track implements BaseModel
{
    /** @use SdkModel<TrackShape> */
    use SdkModel;

    /**
     * Spotify URI.
     */
    #[Optional]
    public ?string $uri;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $uri = null): self
    {
        $self = new self;

        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * Spotify URI.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
