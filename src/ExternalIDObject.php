<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalIDObjectShape = array{
 *   ean?: string|null, isrc?: string|null, upc?: string|null
 * }
 */
final class ExternalIDObject implements BaseModel
{
    /** @use SdkModel<ExternalIDObjectShape> */
    use SdkModel;

    /**
     * [International Article Number](http://en.wikipedia.org/wiki/International_Article_Number_%28EAN%29).
     */
    #[Optional]
    public ?string $ean;

    /**
     * [International Standard Recording Code](http://en.wikipedia.org/wiki/International_Standard_Recording_Code).
     */
    #[Optional]
    public ?string $isrc;

    /**
     * [Universal Product Code](http://en.wikipedia.org/wiki/Universal_Product_Code).
     */
    #[Optional]
    public ?string $upc;

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
        ?string $ean = null,
        ?string $isrc = null,
        ?string $upc = null
    ): self {
        $self = new self;

        null !== $ean && $self['ean'] = $ean;
        null !== $isrc && $self['isrc'] = $isrc;
        null !== $upc && $self['upc'] = $upc;

        return $self;
    }

    /**
     * [International Article Number](http://en.wikipedia.org/wiki/International_Article_Number_%28EAN%29).
     */
    public function withEan(string $ean): self
    {
        $self = clone $this;
        $self['ean'] = $ean;

        return $self;
    }

    /**
     * [International Standard Recording Code](http://en.wikipedia.org/wiki/International_Standard_Recording_Code).
     */
    public function withIsrc(string $isrc): self
    {
        $self = clone $this;
        $self['isrc'] = $isrc;

        return $self;
    }

    /**
     * [Universal Product Code](http://en.wikipedia.org/wiki/Universal_Product_Code).
     */
    public function withUpc(string $upc): self
    {
        $self = clone $this;
        $self['upc'] = $upc;

        return $self;
    }
}
