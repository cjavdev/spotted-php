<?php

declare(strict_types=1);

namespace Spotted\Users;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;
use Spotted\ExternalURLObject;
use Spotted\FollowersObject;
use Spotted\ImageObject;
use Spotted\Users\UserGetProfileResponse\Type;

/**
 * @phpstan-type UserGetProfileResponseShape = array{
 *   id?: string,
 *   displayName?: string|null,
 *   externalURLs?: ExternalURLObject,
 *   followers?: FollowersObject,
 *   href?: string,
 *   images?: list<ImageObject>,
 *   type?: value-of<Type>,
 *   uri?: string,
 * }
 */
final class UserGetProfileResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<UserGetProfileResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The name displayed on the user's profile. `null` if not available.
     */
    #[Api('display_name', nullable: true, optional: true)]
    public ?string $displayName;

    /**
     * Known public external URLs for this user.
     */
    #[Api('external_urls', optional: true)]
    public ?ExternalURLObject $externalURLs;

    /**
     * Information about the followers of this user.
     */
    #[Api(optional: true)]
    public ?FollowersObject $followers;

    /**
     * A link to the Web API endpoint for this user.
     */
    #[Api(optional: true)]
    public ?string $href;

    /**
     * The user's profile image.
     *
     * @var list<ImageObject>|null $images
     */
    #[Api(list: ImageObject::class, optional: true)]
    public ?array $images;

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
     * @param list<ImageObject> $images
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $displayName = null,
        ?ExternalURLObject $externalURLs = null,
        ?FollowersObject $followers = null,
        ?string $href = null,
        ?array $images = null,
        Type|string|null $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $displayName && $obj->displayName = $displayName;
        null !== $externalURLs && $obj->externalURLs = $externalURLs;
        null !== $followers && $obj->followers = $followers;
        null !== $href && $obj->href = $href;
        null !== $images && $obj->images = $images;
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
     * The name displayed on the user's profile. `null` if not available.
     */
    public function withDisplayName(?string $displayName): self
    {
        $obj = clone $this;
        $obj->displayName = $displayName;

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
     * Information about the followers of this user.
     */
    public function withFollowers(FollowersObject $followers): self
    {
        $obj = clone $this;
        $obj->followers = $followers;

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
     * The user's profile image.
     *
     * @param list<ImageObject> $images
     */
    public function withImages(array $images): self
    {
        $obj = clone $this;
        $obj->images = $images;

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
