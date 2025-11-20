<?php

declare(strict_types=1);

namespace Spotted\Playlists\Followers;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkParams;
use Spotted\Core\Contracts\BaseModel;

/**
 * Add the current user as a follower of a playlist.
 *
 * @see Spotted\Services\Playlists\FollowersService::follow()
 *
 * @phpstan-type FollowerFollowParamsShape = array{
 *   dollar_components_schemas___properties_published?: bool
 * }
 */
final class FollowerFollowParams implements BaseModel
{
    /** @use SdkModel<FollowerFollowParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Defaults to `true`. If `true` the playlist will be included in user's public playlists (added to profile), if `false` it will remain private. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Api('$.components.schemas.*.properties.published', optional: true)]
    public ?bool $dollar_components_schemas___properties_published;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $dollar_components_schemas___properties_published = null
    ): self {
        $obj = new self;

        null !== $dollar_components_schemas___properties_published && $obj->dollar_components_schemas___properties_published = $dollar_components_schemas___properties_published;

        return $obj;
    }

    /**
     * Defaults to `true`. If `true` the playlist will be included in user's public playlists (added to profile), if `false` it will remain private. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    public function withComponentsSchemasPropertiesPublished(
        bool $componentsSchemasPropertiesPublished
    ): self {
        $obj = clone $this;
        $obj->dollar_components_schemas___properties_published = $componentsSchemasPropertiesPublished;

        return $obj;
    }
}
