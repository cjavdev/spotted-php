<?php

declare(strict_types=1);

namespace Spotted\Users;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\FollowersObject;
use Spotted\ImageObject;
use Spotted\Users\UserGetProfileResponse\Type;

/**
 * @phpstan-type UserGetProfileResponseShape = array{
 *   id?: string|null,
 *   displayName?: string|null,
 *   externalURLs?: ExternalURLObject|null,
 *   followers?: FollowersObject|null,
 *   href?: string|null,
 *   images?: list<ImageObject>|null,
 *   type?: value-of<Type>|null,
 *   uri?: string|null,
 * }
 */
final class UserGetProfileResponse implements BaseModel
{
    /** @use SdkModel<UserGetProfileResponseShape> */
    use SdkModel;

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    #[Optional]
    public ?string $id;

    /**
     * The name displayed on the user's profile. `null` if not available.
     */
    #[Optional('display_name', nullable: true)]
    public ?string $displayName;

    /**
     * Known public external URLs for this user.
     */
    #[Optional('external_urls')]
    public ?ExternalURLObject $externalURLs;

    /**
     * Information about the followers of this user.
     */
    #[Optional]
    public ?FollowersObject $followers;

    /**
     * A link to the Web API endpoint for this user.
     */
    #[Optional]
    public ?string $href;

    /**
     * The user's profile image.
     *
     * @var list<ImageObject>|null $images
     */
    #[Optional(list: ImageObject::class)]
    public ?array $images;

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
     * @param FollowersObject|array{href?: string|null, total?: int|null} $followers
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $images
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $displayName = null,
        ExternalURLObject|array|null $externalURLs = null,
        FollowersObject|array|null $followers = null,
        ?string $href = null,
        ?array $images = null,
        Type|string|null $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $displayName && $obj['displayName'] = $displayName;
        null !== $externalURLs && $obj['externalURLs'] = $externalURLs;
        null !== $followers && $obj['followers'] = $followers;
        null !== $href && $obj['href'] = $href;
        null !== $images && $obj['images'] = $images;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj['uri'] = $uri;

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
     * The name displayed on the user's profile. `null` if not available.
     */
    public function withDisplayName(?string $displayName): self
    {
        $obj = clone $this;
        $obj['displayName'] = $displayName;

        return $obj;
    }

    /**
     * Known public external URLs for this user.
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
     * Information about the followers of this user.
     *
     * @param FollowersObject|array{href?: string|null, total?: int|null} $followers
     */
    public function withFollowers(FollowersObject|array $followers): self
    {
        $obj = clone $this;
        $obj['followers'] = $followers;

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
     * The user's profile image.
     *
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $images
     */
    public function withImages(array $images): self
    {
        $obj = clone $this;
        $obj['images'] = $images;

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
}
