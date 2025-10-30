<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\PlaylistUserObject\Type;

/**
 * @phpstan-type PlaylistUserObjectShape = array{
 *   id?: string,
 *   externalURLs?: ExternalURLObject,
 *   href?: string,
 *   type?: value-of<Type>,
 *   uri?: string,
 * }
 */
final class PlaylistUserObject implements BaseModel
{
    /** @use SdkModel<PlaylistUserObjectShape> */
    use SdkModel;

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Known public external URLs for this user.
     */
    #[Api('external_urls', optional: true)]
    public ?ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint for this user.
     */
    #[Api(optional: true)]
    public ?string $href;

    /**
     * The object type.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for this user.
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
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?ExternalURLObject $externalURLs = null,
        ?string $href = null,
        Type|string|null $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $externalURLs && $obj->externalURLs = $externalURLs;
        null !== $href && $obj->href = $href;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Known public external URLs for this user.
     */
    public function withExternalURLs(ExternalURLObject $externalURLs): self
    {
        $obj = clone $this;
        $obj->externalURLs = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint for this user.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * The object type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
