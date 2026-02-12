<?php

declare(strict_types=1);

namespace Spotted\Playlists\Followers;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Add the current user as a follower of a playlist.
 *
 * **Note:** This endpoint is deprecated. Use [Save Items to Library](/documentation/web-api/reference/save-library-items) instead.
 *
 * @deprecated
 * @see Spotted\Services\Playlists\FollowersService::follow()
 *
 * @phpstan-type FollowerFollowParamsShape = array{published?: bool|null}
 */
final class FollowerFollowParams implements BaseModel
{
    /** @use SdkModel<FollowerFollowParamsShape> */
    use SdkModel;
    use SdkParams;

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
     */
    public static function with(?bool $published = null): self
    {
        $self = new self;

        null !== $published && $self['published'] = $published;

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
