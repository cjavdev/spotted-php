<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\ArtistObject\Type;
use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type artist_object = array{
 *   id?: string,
 *   externalURLs?: ExternalURLObject,
 *   followers?: FollowersObject,
 *   genres?: list<string>,
 *   href?: string,
 *   images?: list<ImageObject>,
 *   name?: string,
 *   popularity?: int,
 *   type?: value-of<Type>,
 *   uri?: string,
 * }
 */
final class ArtistObject implements BaseModel
{
    /** @use SdkModel<artist_object> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the artist.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Known external URLs for this artist.
     */
    #[Api('external_urls', optional: true)]
    public ?ExternalURLObject $externalURLs;

    /**
     * Information about the followers of the artist.
     */
    #[Api(optional: true)]
    public ?FollowersObject $followers;

    /**
     * A list of the genres the artist is associated with. If not yet classified, the array is empty.
     *
     * @var list<string>|null $genres
     */
    #[Api(list: 'string', optional: true)]
    public ?array $genres;

    /**
     * A link to the Web API endpoint providing full details of the artist.
     */
    #[Api(optional: true)]
    public ?string $href;

    /**
     * Images of the artist in various sizes, widest first.
     *
     * @var list<ImageObject>|null $images
     */
    #[Api(list: ImageObject::class, optional: true)]
    public ?array $images;

    /**
     * The name of the artist.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The popularity of the artist. The value will be between 0 and 100, with 100 being the most popular. The artist's popularity is calculated from the popularity of all the artist's tracks.
     */
    #[Api(optional: true)]
    public ?int $popularity;

    /**
     * The object type.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the artist.
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
     * @param list<string> $genres
     * @param list<ImageObject> $images
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?ExternalURLObject $externalURLs = null,
        ?FollowersObject $followers = null,
        ?array $genres = null,
        ?string $href = null,
        ?array $images = null,
        ?string $name = null,
        ?int $popularity = null,
        Type|string|null $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $externalURLs && $obj->externalURLs = $externalURLs;
        null !== $followers && $obj->followers = $followers;
        null !== $genres && $obj->genres = $genres;
        null !== $href && $obj->href = $href;
        null !== $images && $obj->images = $images;
        null !== $name && $obj->name = $name;
        null !== $popularity && $obj->popularity = $popularity;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the artist.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Known external URLs for this artist.
     */
    public function withExternalURLs(ExternalURLObject $externalURLs): self
    {
        $obj = clone $this;
        $obj->externalURLs = $externalURLs;

        return $obj;
    }

    /**
     * Information about the followers of the artist.
     */
    public function withFollowers(FollowersObject $followers): self
    {
        $obj = clone $this;
        $obj->followers = $followers;

        return $obj;
    }

    /**
     * A list of the genres the artist is associated with. If not yet classified, the array is empty.
     *
     * @param list<string> $genres
     */
    public function withGenres(array $genres): self
    {
        $obj = clone $this;
        $obj->genres = $genres;

        return $obj;
    }

    /**
     * A link to the Web API endpoint providing full details of the artist.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj->href = $href;

        return $obj;
    }

    /**
     * Images of the artist in various sizes, widest first.
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
     * The name of the artist.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The popularity of the artist. The value will be between 0 and 100, with 100 being the most popular. The artist's popularity is calculated from the popularity of all the artist's tracks.
     */
    public function withPopularity(int $popularity): self
    {
        $obj = clone $this;
        $obj->popularity = $popularity;

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
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the artist.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
