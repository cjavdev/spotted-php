<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;
use Spotted\SimplifiedArtistObject\Type;

/**
 * @phpstan-type SimplifiedArtistObjectShape = array{
 *   id?: string|null,
 *   external_urls?: ExternalURLObject|null,
 *   href?: string|null,
 *   name?: string|null,
 *   type?: value-of<Type>|null,
 *   uri?: string|null,
 * }
 */
final class SimplifiedArtistObject implements BaseModel
{
    /** @use SdkModel<SimplifiedArtistObjectShape> */
    use SdkModel;

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the artist.
     */
    #[Optional]
    public ?string $id;

    /**
     * Known external URLs for this artist.
     */
    #[Optional]
    public ?ExternalURLObject $external_urls;

    /**
     * A link to the Web API endpoint providing full details of the artist.
     */
    #[Optional]
    public ?string $href;

    /**
     * The name of the artist.
     */
    #[Optional]
    public ?string $name;

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
     * @param ExternalURLObject|array{spotify?: string|null} $external_urls
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ExternalURLObject|array|null $external_urls = null,
        ?string $href = null,
        ?string $name = null,
        Type|string|null $type = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $external_urls && $obj['external_urls'] = $external_urls;
        null !== $href && $obj['href'] = $href;
        null !== $name && $obj['name'] = $name;
        null !== $type && $obj['type'] = $type;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The [Spotify ID](/documentation/web-api/concepts/spotify-uris-ids) for the artist.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Known external URLs for this artist.
     *
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
     * A link to the Web API endpoint providing full details of the artist.
     */
    public function withHref(string $href): self
    {
        $obj = clone $this;
        $obj['href'] = $href;

        return $obj;
    }

    /**
     * The name of the artist.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

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
        $obj['uri'] = $uri;

        return $obj;
    }
}
