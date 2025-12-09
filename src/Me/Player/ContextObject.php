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
        $obj = new self;

        null !== $externalURLs && $obj['externalURLs'] = $externalURLs;
        null !== $href && $obj['href'] = $href;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * External URLs for this context.
     *
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     */
    public function withExternalURLs(
        ExternalURLObject|array $externalURLs
    ): self {
        $obj = clone $this;
        $obj['externalURLs'] = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * The object type, e.g. "artist", "playlist", "album", "show".
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the context.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
