<?php

declare(strict_types=1);

namespace Spotted\Users\Playlists\PlaylistNewResponse;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\PlaylistUserObject\Type;

/**
 * The user who owns the playlist.
 *
 * @phpstan-type OwnerShape = array{
 *   id?: string|null,
 *   externalURLs?: ExternalURLObject|null,
 *   href?: string|null,
 *   type?: value-of<Type>|null,
 *   uri?: string|null,
 *   displayName?: string|null,
 * }
 */
final class Owner implements BaseModel
{
    /** @use SdkModel<OwnerShape> */
    use SdkModel;

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    #[Optional]
    public ?string $id;

    #[Optional('external_urls')]
    public ?ExternalURLObject $externalURLs;

    /**
     * A link to the Web API endpoint for this user.
     */
    #[Optional]
    public ?string $href;

    /**
     * The object type.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    #[Optional]
    public ?string $uri;

    /**
     * The name displayed on the user's profile. `null` if not available.
     */
    #[Optional('display_name', nullable: true)]
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
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ExternalURLObject|array|null $externalURLs = null,
        ?string $href = null,
        Type|string|null $type = null,
        ?string $uri = null,
        ?string $displayName = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $externalURLs && $obj['externalURLs'] = $externalURLs;
        null !== $href && $obj['href'] = $href;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj['uri'] = $uri;
        null !== $displayName && $obj['displayName'] = $displayName;

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
        $obj['externalURLs'] = $externalURLs;

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
        $obj['displayName'] = $displayName;

        return $obj;
    }
}
