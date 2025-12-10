<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalURLObjectShape = array{spotify?: string|null}
 */
final class ExternalURLObject implements BaseModel
{
    /** @use SdkModel<ExternalURLObjectShape> */
    use SdkModel;

    /**
     * The [Spotify URL](/documentation/web-api/concepts/spotify-uris-ids) for the object.
     */
    #[Optional]
    public ?string $spotify;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $spotify = null): self
    {
        $self = new self;

        null !== $spotify && $self['spotify'] = $spotify;

        return $self;
    }

    /**
     * The [Spotify URL](/documentation/web-api/concepts/spotify-uris-ids) for the object.
     */
    public function withSpotify(string $spotify): self
    {
        $self = clone $this;
        $self['spotify'] = $spotify;

        return $self;
    }
}
