<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type CopyrightObjectShape = array{
 *   published?: bool|null, text?: string|null, type?: string|null
 * }
 */
final class CopyrightObject implements BaseModel
{
    /** @use SdkModel<CopyrightObjectShape> */
    use SdkModel;

    /**
     * The playlist's public/private status (if it should be added to the user's profile or not): `true` the playlist will be public, `false` the playlist will be private, `null` the playlist status is not relevant. For more about public/private status, see [Working with Playlists](/documentation/web-api/concepts/playlists).
     */
    #[Optional]
    public ?bool $published;

    /**
     * The copyright text for this content.
     */
    #[Optional]
    public ?string $text;

    /**
     * The type of copyright: `C` = the copyright, `P` = the sound recording (performance) copyright.
     */
    #[Optional]
    public ?string $type;

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
        ?bool $published = null,
        ?string $text = null,
        ?string $type = null
    ): self {
        $self = new self;

        null !== $published && $self['published'] = $published;
        null !== $text && $self['text'] = $text;
        null !== $type && $self['type'] = $type;

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
     * The copyright text for this content.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * The type of copyright: `C` = the copyright, `P` = the sound recording (performance) copyright.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
