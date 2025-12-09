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
 * @phpstan-type MeGetResponseShape = array{
 *   id?: string|null,
 *   country?: string|null,
 *   displayName?: string|null,
 *   email?: string|null,
 *   explicitContent?: ExplicitContent|null,
 *   externalURLs?: ExternalURLObject|null,
 *   followers?: FollowersObject|null,
 *   href?: string|null,
 *   images?: list<ImageObject>|null,
 *   product?: string|null,
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
     * @param ExplicitContent|array{
     *   filterEnabled?: bool|null, filterLocked?: bool|null
     * } $explicitContent
     * @param ExternalURLObject|array{spotify?: string|null} $externalURLs
     * @param FollowersObject|array{href?: string|null, total?: int|null} $followers
     * @param list<ImageObject|array{
     *   height: int|null, url: string, width: int|null
     * }> $images
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
        ?string $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $country && $obj['country'] = $country;
        null !== $displayName && $obj['displayName'] = $displayName;
        null !== $email && $obj['email'] = $email;
        null !== $explicitContent && $obj['explicitContent'] = $explicitContent;
        null !== $externalURLs && $obj['externalURLs'] = $externalURLs;
        null !== $followers && $obj['followers'] = $followers;
        null !== $href && $obj['href'] = $href;
        null !== $images && $obj['images'] = $images;
        null !== $product && $obj['product'] = $product;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The [Spotify user ID](/documentation/web-api/concepts/spotify-uris-ids) for the user.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The country of the user, as set in the user's account profile. An [ISO 3166-1 alpha-2 country code](http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). _This field is only available when the current user has granted access to the [user-read-private](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     */
    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj['country'] = $country;

        return $obj;
    }

    /**
     * The name displayed on the user's profile. `null` if not available.
     */
    public function withDisplayName(string $displayName): self
    {
        $obj = clone $this;
        $obj['displayName'] = $displayName;

        return $obj;
    }

    /**
     * The user's email address, as entered by the user when creating their account. _**Important!** This email address is unverified; there is no proof that it actually belongs to the user._ _This field is only available when the current user has granted access to the [user-read-email](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * The user's explicit content settings. _This field is only available when the current user has granted access to the [user-read-private](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     *
     * @param ExplicitContent|array{
     *   filterEnabled?: bool|null, filterLocked?: bool|null
     * } $explicitContent
     */
    public function withExplicitContent(
        ExplicitContent|array $explicitContent
    ): self {
        $obj = clone $this;
        $obj['explicitContent'] = $explicitContent;

        return $obj;
    }

    /**
     * Known external URLs for this user.
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
     * Information about the followers of the user.
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
     * The user's Spotify subscription level: "premium", "free", etc. (The subscription level "open" can be considered the same as "free".) _This field is only available when the current user has granted access to the [user-read-private](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
     */
    public function withProduct(string $product): self
    {
        $obj = clone $this;
        $obj['product'] = $product;

        return $obj;
    }

    /**
     * The object type: "user".
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the user.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
