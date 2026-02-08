<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\ArtistObject\Type;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalURLObjectShape from \Spotted\ExternalURLObject
 * @phpstan-import-type FollowersObjectShape from \Spotted\FollowersObject
 * @phpstan-import-type ImageObjectShape from \Spotted\ImageObject
 *
 * @phpstan-type ArtistObjectShape = array{
 *   id?: string|null,
 *   externalURLs?: null|ExternalURLObject|ExternalURLObjectShape,
 *   followers?: null|FollowersObject|FollowersObjectShape,
 *   genres?: list<string>|null,
 *   href?: string|null,
 *   images?: list<ImageObject|ImageObjectShape>|null,
 *   name?: string|null,
 *   popularity?: int|null,
 *   published?: bool|null,
 *   type?: null|Type|value-of<Type>,
 *   uri?: string|null,
 * }
 */
final class ArtistObject implements BaseModel
{
    /** @use SdkModel<ArtistObjectShape> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the artist.
     */
    #[Optional]
    public ?string $id;

    /**
     * Known external URLs for this artist.
     */
    #[Optional('external_urls')]
    public ?ExternalURLObject $externalURLs;

    /**
     * @deprecated
     *
     * Information about the followers of the artist
     */
    #[Optional]
    public ?FollowersObject $followers;

    /**
     * @deprecated
     *
     * A list of the genres the artist is associated with. If not yet classified, the array is empty.
     *
     * @var list<string>|null $genres
     */
    #[Optional(list: 'string')]
    public ?array $genres;

    /**
     * A link to the Web API endpoint providing full details of the artist.
     */
    #[Optional]
    public ?string $href;

    /**
     * Images of the artist in various sizes, widest first.
     *
     * @var list<ImageObject>|null $images
     */
    #[Optional(list: ImageObject::class)]
    public ?array $images;

    /**
     * The name of the artist.
     */
    #[Optional]
    public ?string $name;

    /**
     * @deprecated
     *
     * The popularity of the artist. The value will be between 0 and 100, with 100 being the most popular. The artist's popularity is calculated from the popularity of all the artist's tracks.
     */
    #[Optional]
    public ?int $popularity;

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
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the artist.
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
     * @param list<string>|null $genres
     * @param list<ImageObject|ImageObjectShape>|null $images
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $id = null,
        ExternalURLObject|array|null $externalURLs = null,
        FollowersObject|array|null $followers = null,
        ?array $genres = null,
        ?string $href = null,
        ?array $images = null,
        ?string $name = null,
        ?int $popularity = null,
        ?bool $published = null,
        Type|string|null $type = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $externalURLs && $self['externalURLs'] = $externalURLs;
        null !== $followers && $self['followers'] = $followers;
        null !== $genres && $self['genres'] = $genres;
        null !== $href && $self['href'] = $href;
        null !== $images && $self['images'] = $images;
        null !== $name && $self['name'] = $name;
        null !== $popularity && $self['popularity'] = $popularity;
        null !== $published && $self['published'] = $published;
        null !== $type && $self['type'] = $type;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the artist.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Known external URLs for this artist.
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
     * Information about the followers of the artist.
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
     * A list of the genres the artist is associated with. If not yet classified, the array is empty.
     *
     * @param list<string> $genres
     */
    public function withGenres(array $genres): self
    {
        $self = clone $this;
        $self['genres'] = $genres;

        return $self;
    }

    /**
     * A link to the Web API endpoint providing full details of the artist.
     */
    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    /**
     * Images of the artist in various sizes, widest first.
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
     * The name of the artist.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The popularity of the artist. The value will be between 0 and 100, with 100 being the most popular. The artist's popularity is calculated from the popularity of all the artist's tracks.
     */
    public function withPopularity(int $popularity): self
    {
        $self = clone $this;
        $self['popularity'] = $popularity;

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
     * The [Spotify URI](/documentation/web-api/concepts/spotify-uris-ids) for the artist.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
