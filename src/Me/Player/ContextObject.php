<?php

declare(strict_types=1);

namespace Spotted\Me\Player;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;

/**
 * @phpstan-type ContextObjectShape = array{
 *   externalURLs?: ExternalURLObject|null,
 *   href?: string|null,
 *   type?: string|null,
 *   uri?: string|null,
 * }
 */
final class ContextObject implements BaseModel
{
    /** @use SdkModel<ContextObjectShape> */
    use SdkModel;

    /**
     * External URLs for this context.
     */
    #[Optional('external_urls')]
    public ?ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    #[Optional]
    public ?string $href;

    /**
     * The object type, e.g. "artist", "playlist", "album", "show".
     */
    #[Optional]
    public ?string $type;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the context.
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
     *
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     */
    public static function with(
        ExternalURLObject|array|null $externalURLs = null,
        ?string $href = null,
        ?string $type = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $externalURLs && $self['externalURLs'] = $externalURLs;
        null !== $href && $self['href'] = $href;
        null !== $type && $self['type'] = $type;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * External URLs for this context.
     *
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     */
    public function withExternalURLs(
        ExternalURLObject|array $externalURLs
    ): self {
        $self = clone $this;
        $self['externalURLs'] = $externalURLs;

        return $self;
    }

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    /**
     * The object type, e.g. "artist", "playlist", "album", "show".
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the context.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
