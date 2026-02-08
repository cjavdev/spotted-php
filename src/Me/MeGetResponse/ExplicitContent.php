<?php

declare(strict_types=1);

namespace Spotted\Me\MeGetResponse;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * The user's explicit content settings. _This field is only available when the current user has granted access to the [user-read-private](/documentation/web-api/concepts/scopes/#list-of-scopes) scope._.
 *
 * @deprecated
 *
 * @phpstan-type ExplicitContentShape = array{
 *   filterEnabled?: bool|null, filterLocked?: bool|null, published?: bool|null
 * }
 */
final class ExplicitContent implements BaseModel
{
    /** @use SdkModel<ExplicitContentShape> */
    use SdkModel;

    /**
     * When `true`, indicates that explicit content should not be played.
     */
    #[Optional('filter_enabled')]
    public ?bool $filterEnabled;

    /**
     * When `true`, indicates that the explicit content setting is locked and can't be changed by the user.
     */
    #[Optional('filter_locked')]
    public ?bool $filterLocked;

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
    public static function with(
        ?bool $filterEnabled = null,
        ?bool $filterLocked = null,
        ?bool $published = null,
    ): self {
        $self = new self;

        null !== $filterEnabled && $self['filterEnabled'] = $filterEnabled;
        null !== $filterLocked && $self['filterLocked'] = $filterLocked;
        null !== $published && $self['published'] = $published;

        return $self;
    }

    /**
     * When `true`, indicates that explicit content should not be played.
     */
    public function withFilterEnabled(bool $filterEnabled): self
    {
        $self = clone $this;
        $self['filterEnabled'] = $filterEnabled;

        return $self;
    }

    /**
     * When `true`, indicates that the explicit content setting is locked and can't be changed by the user.
     */
    public function withFilterLocked(bool $filterLocked): self
    {
        $self = clone $this;
        $self['filterLocked'] = $filterLocked;

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
