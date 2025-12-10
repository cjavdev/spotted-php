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
 * @see Spotted\Services\Playlists\FollowersService::follow()
 *
 * @phpstan-type FollowerFollowParamsShape = array{public?: bool}
 */
final class FollowerFollowParams implements BaseModel
{
    /** @use SdkModel<FollowerFollowParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Defaults to `true`. If `true` the playlist will be included in user's public playlists (added to profile), if `false` it will remain private. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $public;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $public = null): self
    {
        $self = new self;

        null !== $public && $self['public'] = $public;

        return $self;
    }

    /**
     * Defaults to `true`. If `true` the playlist will be included in user's public playlists (added to profile), if `false` it will remain private. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withPublic(bool $public): self
    {
        $self = clone $this;
        $self['public'] = $public;

        return $self;
    }
}
