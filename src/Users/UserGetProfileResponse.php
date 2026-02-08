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
 * @phpstan-import-type ExternalURLObjectShape from \Spotted\ExternalURLObject
 * @phpstan-import-type FollowersObjectShape from \Spotted\FollowersObject
 * @phpstan-import-type ImageObjectShape from \Spotted\ImageObject
 *
 * @phpstan-type UserGetProfileResponseShape = array{
 *   id?: string|null,
 *   displayName?: string|null,
 *   externalURLs?: null|ExternalURLObject|ExternalURLObjectShape,
 *   followers?: null|FollowersObject|FollowersObjectShape,
 *   href?: string|null,
 *   images?: list<ImageObject|ImageObjectShape>|null,
 *   published?: bool|null,
 *   type?: null|Type|value-of<Type>,
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
     * @deprecated
     *
     * Information about the followers of this user
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
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

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
     * @param ExternalURLObject|ExternalURLObjectShape|null $externalURLs
     * @param FollowersObject|FollowersObjectShape|null $followers
     * @param list<ImageObject|ImageObjectShape>|null $images
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $id = null,
        ?string $displayName = null,
        ExternalURLObject|array|null $externalURLs = null,
        FollowersObject|array|null $followers = null,
        ?string $href = null,
        ?array $images = null,
        ?bool $published = null,
        Type|string|null $type = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $externalURLs && $self['externalURLs'] = $externalURLs;
        null !== $followers && $self['followers'] = $followers;
        null !== $href && $self['href'] = $href;
        null !== $images && $self['images'] = $images;
        null !== $published && $self['published'] = $published;
        null !== $type && $self['type'] = $type;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The name displayed on the user's profile. `null` if not available.
     */
    public function withDisplayName(?string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * Known public external URLs for this user.
     *
     * @param ExternalURLObject|ExternalURLObjectShape $externalURLs
     */
    public function withExternalURLs(
        ExternalURLObject|array $externalURLs
    ): self {
        $self = clone $this;
        $self['externalURLs'] = $externalURLs;

        return $self;
    }

    /**
     * Information about the followers of this user.
     *
     * @param FollowersObject|FollowersObjectShape $followers
     */
    public function withFollowers(FollowersObject|array $followers): self
    {
        $self = clone $this;
        $self['followers'] = $followers;

        return $self;
    }

    /**
     * A link to the Web API endpoint for this user.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    /**
     * The user's profile image.
     *
     * @param list<ImageObject|ImageObjectShape> $images
     */
    public function withImages(array $images): self
    {
        $self = clone $this;
        $self['images'] = $images;

        return $self;
    }

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublished(bool $published): self
    {
        $self = clone $this;
        $self['published'] = $published;

        return $self;
    }

    /**
     * The object type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for this user.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
