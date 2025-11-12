<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type LinkedTrackObjectShape = array{
 *   id?: string|null,
 *   external_urls?: ExternalURLObject|null,
 *   href?: string|null,
 *   type?: string|null,
 *   uri?: string|null,
 * }
 */
final class LinkedTrackObject implements BaseModel
{
    /** @use SdkModel<LinkedTrackObjectShape> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Known external URLs for this track.
     */
    #[Api(optional: true)]
    public ?ExternalURLObject $external_urls;

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    #[Api(optional: true)]
    public ?string $href;

    /**
     * The object type: "track".
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    #[Api(optional: true)]
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
    public static function with(
        ?string $id = null,
        ?ExternalURLObject $external_urls = null,
        ?string $href = null,
        ?string $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $external_urls && $obj->external_urls = $external_urls;
        null !== $href && $obj->href = $href;
        null !== $type && $obj->type = $type;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Known external URLs for this track.
     */
    public function withExternalURLs(ExternalURLObject $externalURLs): self
    {
        $obj = clone $this;
        $obj->external_urls = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the track.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * The object type: "track".
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the track.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
