<?php

declare(strict_types=1);

namespace Spotted\Users\Playlists\PlaylistNewResponse;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\PlaylistUserObject\Type;

/**
 * The user who owns the playlist.
 *
 * @phpstan-type OwnerShape = array{
 *   id?: string|null,
 *   external_urls?: ExternalURLObject|null,
 *   href?: string|null,
 *   type?: value-of<Type>|null,
 *   uri?: string|null,
 *   display_name?: string|null,
 * }
 */
final class Owner implements BaseModel
{
    /** @use SdkModel<OwnerShape> */
    use SdkModel;

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?ExternalURLObject $external_urls;

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
    #[Api(nullable: true, optional: true)]
    public ?string $display_name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExternalURLObject|array{spotify?: string|null} $external_urls
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ExternalURLObject|array|null $external_urls = null,
        ?string $href = null,
        Type|string|null $type = null,
        ?string $uri = null,
        ?string $display_name = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $external_urls && $obj['external_urls'] = $external_urls;
        null !== $href && $obj['href'] = $href;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj['uri'] = $uri;
        null !== $display_name && $obj['display_name'] = $display_name;

        return $obj;
    }

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     */
    public function withExternalURLs(
        ExternalURLObject|array $externalURLs
    ): self {
        $obj = clone $this;
        $obj['external_urls'] = $externalURLs;

        return $obj;
    }

    /**
     * A link to the Web API endpoint for this user.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

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
        $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The name displayed on the user's profile. `null` if not available.
     */
    public function withDisplayName(?string $displayName): self
    {
        $obj = clone $this;
        $obj['display_name'] = $displayName;

        return $obj;
    }
}
