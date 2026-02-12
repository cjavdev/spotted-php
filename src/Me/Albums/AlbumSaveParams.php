<?php

declare(strict_types=1);

namespace Spotted\Me\Albums;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Save one or more albums to the current user's 'Your Music' library.
 *
 * **Note:** This endpoint is deprecated. Use [Save Items to Library](/documentation/web-api/reference/save-library-items) instead.
 *
 * @deprecated
 * @see Spotted\Services\Me\AlbumsService::save()
 *
 * @phpstan-type AlbumSaveParamsShape = array{
 *   ids?: list<string>|null, published?: bool|null
 * }
 */
final class AlbumSaveParams implements BaseModel
{
    /** @use SdkModel<AlbumSaveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A JSON array of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `["4iV5W9uYEdYUVa79Axb7Rh", "1301WleyT98MSxVHPZCA6M"]`<br/>A maximum of 50 items can be specified in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._.
     *
     * @var list<string>|null $ids
     */
    #[Optional(list: 'string')]
    public ?array $ids;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $ids
     */
    public static function with(?array $ids = null, ?bool $published = null): self
    {
        $self = new self;

        null !== $ids && $self['ids'] = $ids;
        null !== $published && $self['published'] = $published;

        return $self;
    }

    /**
     * A JSON array of the [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids). For example: `["4iV5W9uYEdYUVa79Axb7Rh", "1301WleyT98MSxVHPZCA6M"]`<br/>A maximum of 50 items can be specified in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._.
     *
     * @param list<string> $ids
     */
    public function withIDs(array $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

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
}
