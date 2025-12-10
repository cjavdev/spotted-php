<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\AlbumRestrictionObject\Reason;
use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type AlbumRestrictionObjectShape = array{
 *   reason?: value-of<Reason>|null
 * }
 */
final class AlbumRestrictionObject implements BaseModel
{
    /** @use SdkModel<AlbumRestrictionObjectShape> */
    use SdkModel;

    /**
     * The reason for the restriction. Albums may be restricted if the content is not available in a given market, to the user's subscription type, or when the user's account is set to not play explicit content.
     * Additional reasons may be added in the future.
     *
     * @var value-of<Reason>|null $reason
     */
    #[Optional(enum: Reason::class)]
    public ?string $reason;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Reason|value-of<Reason> $reason
     */
    public static function with(Reason|string|null $reason = null): self
    {
        $self = new self;

        null !== $reason && $self['reason'] = $reason;

        return $self;
    }

    /**
     * The reason for the restriction. Albums may be restricted if the content is not available in a given market, to the user's subscription type, or when the user's account is set to not play explicit content.
     * Additional reasons may be added in the future.
     *
     * @param Reason|value-of<Reason> $reason
     */
    public function withReason(Reason|string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }
}
