<?php

declare(strict_types=1);

namespace Spotted\Me\Following;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Attributes\Required;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Add the current user as a follower of one or more artists or other Spotify users.
 *
 * **Note:** This endpoint is deprecated. Use [Save Items to Library](/documentation/web-api/reference/save-library-items) instead.
 *
 * @deprecated
 * @see Spotted\Services\Me\FollowingService::follow()
 *
 * @phpstan-type FollowingFollowParamsShape = array{
 *   ids: list<string>, published?: bool|null
 * }
 */
final class FollowingFollowParams implements BaseModel
{
    /** @use SdkModel<FollowingFollowParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids).
     * For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._.
     *
     * @var list<string> $ids
     */
    #[Required(list: 'string')]
    public array $ids;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * `new FollowingFollowParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FollowingFollowParams::with(ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FollowingFollowParams)->withIDs(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $ids
     */
    public static function with(array $ids, ?bool $published = null): self
    {
        $self = new self;

        $self['ids'] = $ids;

        null !== $published && $self['published'] = $published;

        return $self;
    }

    /**
     * A JSON array of the artist or user [Spotify IDs](/documentation/web-api/concepts/spotify-uris-ids).
     * For example: `{ids:["74ASZWbe4lXaubB36ztrGX", "08td7MxkoHQkXnWAYD8d6Q"]}`. A maximum of 50 IDs can be sent in one request. _**Note**: if the `ids` parameter is present in the query string, any IDs listed here in the body will be ignored._.
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
