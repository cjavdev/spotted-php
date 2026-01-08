<?php

declare(strict_types=1);

namespace Spotted\Me;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\ExternalURLObject;
use Spotted\FollowersObject;
use Spotted\ImageObject;
use Spotted\Me\MeGetResponse\ExplicitContent;

/**
 * @phpstan-import-type ExplicitContentShape from \Spotted\Me\MeGetResponse\ExplicitContent
 * @phpstan-import-type ExternalURLObjectShape from \Spotted\ExternalURLObject
 * @phpstan-import-type FollowersObjectShape from \Spotted\FollowersObject
 * @phpstan-import-type ImageObjectShape from \Spotted\ImageObject
 *
 * @phpstan-type MeGetResponseShape = array{
 *   id?: string|null,
 *   country?: string|null,
 *   displayName?: string|null,
 *   email?: string|null,
 *   explicitContent?: null|ExplicitContent|ExplicitContentShape,
 *   externalURLs?: null|ExternalURLObject|ExternalURLObjectShape,
 *   followers?: null|FollowersObject|FollowersObjectShape,
 *   href?: string|null,
 *   images?: list<ImageObject|ImageObjectShape>|null,
 *   product?: string|null,
 *   published?: bool|null,
 *   type?: string|null,
 *   uri?: string|null,
 * }
 */
final class MeGetResponse implements BaseModel
{
    /** @use SdkModel<MeGetResponseShape> */
    use SdkModel;

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for the user.
     */
    #[Optional]
    public ?string $id;

    /**
     * The country of the user, as set in the user's account profile. An [ISO 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). _This field is only available when the current user has granted access to the [user-read-private](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     */
    #[Optional]
    public ?string $country;

    /**
     * The name displayed on the user's profile. `null` if not available.
     */
    #[Optional('display_name')]
    public ?string $displayName;

    /**
     * The user's email address, as entered by the user when creating their account. _**Important!** This email address is unverified; there is no proof that it actually belongs to the user._ _This field is only available when the current user has granted access to the [user-read-email](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     */
    #[Optional]
    public ?string $email;

    /**
     * The user's explicit content settings. _This field is only available when the current user has granted access to the [user-read-private](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     */
    #[Optional('explicit_content')]
    public ?ExplicitContent $explicitContent;

    /**
     * Known external URLs for this user.
     */
    #[Optional('external_urls')]
    public ?ExternalURLObject $externalURLs;

    /**
     * Information about the followers of the user.
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
     * The user's Spotify subscription level: "premium", "free", etc. (The subscription level "open" can be considered the same as "free".) _This field is only available when the current user has granted access to the [user-read-private](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     */
    #[Optional]
    public ?string $product;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * The object type: "user".
     */
    #[Optional]
    public ?string $type;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the user.
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
     * @param ExplicitContent|ExplicitContentShape|null $explicitContent
     * @param ExternalURLObject|ExternalURLObjectShape|null $externalURLs
     * @param FollowersObject|FollowersObjectShape|null $followers
     * @param list<ImageObject|ImageObjectShape>|null $images
     */
    public static function with(
        ?string $id = null,
        ?string $country = null,
        ?string $displayName = null,
        ?string $email = null,
        ExplicitContent|array|null $explicitContent = null,
        ExternalURLObject|array|null $externalURLs = null,
        FollowersObject|array|null $followers = null,
        ?string $href = null,
        ?array $images = null,
        ?string $product = null,
        ?bool $published = null,
        ?string $type = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $country && $self['country'] = $country;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $email && $self['email'] = $email;
        null !== $explicitContent && $self['explicitContent'] = $explicitContent;
        null !== $externalURLs && $self['externalURLs'] = $externalURLs;
        null !== $followers && $self['followers'] = $followers;
        null !== $href && $self['href'] = $href;
        null !== $images && $self['images'] = $images;
        null !== $product && $self['product'] = $product;
        null !== $published && $self['published'] = $published;
        null !== $type && $self['type'] = $type;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for the user.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The country of the user, as set in the user's account profile. An [ISO 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). _This field is only available when the current user has granted access to the [user-read-private](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * The name displayed on the user's profile. `null` if not available.
     */
    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * The user's email address, as entered by the user when creating their account. _**Important!** This email address is unverified; there is no proof that it actually belongs to the user._ _This field is only available when the current user has granted access to the [user-read-email](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The user's explicit content settings. _This field is only available when the current user has granted access to the [user-read-private](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     *
     * @param ExplicitContent|ExplicitContentShape $explicitContent
     */
    public function withExplicitContent(
        ExplicitContent|array $explicitContent
    ): self {
        $self = clone $this;
        $self['explicitContent'] = $explicitContent;

        return $self;
    }

    /**
     * Known external URLs for this user.
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
     * Information about the followers of the user.
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
     * The user's Spotify subscription level: "premium", "free", etc. (The subscription level "open" can be considered the same as "free".) _This field is only available when the current user has granted access to the [user-read-private](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     */
    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

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
     * The object type: "user".
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the user.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
