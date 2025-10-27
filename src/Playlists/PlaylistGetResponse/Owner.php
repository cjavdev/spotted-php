<?php

declare(strict_types=1);

namespace Spotted\Playlists\PlaylistGetResponse;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\PlaylistUserObject\Type;

/**
 * The user who owns the playlist.
 *
 * @phpstan-type owner_alias = array{
 *   id?: string,
 *   externalURLs?: ExternalURLObject,
 *   href?: string,
 *   type?: value-of<Type>,
 *   uri?: string,
 *   displayName?: string|null,
 * }
 */
final class Owner implements BaseModel
{
    /** @use SdkModel<owner_alias> */
    use SdkModel;

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    #[Api(optional: true)]
    public ?string $id;

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

    /**
     * The name displayed on the user's profile. `null` if not available.
     */
    #[Api('display_name', nullable: true, optional: true)]
    public ?string $displayName;

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
        ?string $displayName = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $externalURLs && $obj->externalURLs = $externalURLs;
        null !== $href && $obj->href = $href;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj->uri = $uri;
        null !== $displayName && $obj->displayName = $displayName;

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

    /**
     * The name displayed on the user's profile. `null` if not available.
     */
    public function withDisplayName(?string $displayName): self
    {
        $obj = clone $this;
        $obj->displayName = $displayName;

        return $obj;
    }
}
