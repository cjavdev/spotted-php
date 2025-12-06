<?php

declare(strict_types=1);

namespace Spotted;

use Spotted\Core\Attributes\Api;
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
    #[Api(optional: true)]
    public ?string $ean;

    /**
     * [International Standard Recording Code](http://en.wikipedia.org/wiki/International_Standard_Recording_Code).
     */
    #[Api(optional: true)]
    public ?string $isrc;

    /**
     * [Universal Product Code](http://en.wikipedia.org/wiki/Universal_Product_Code).
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $ean && $obj['ean'] = $ean;
        null !== $isrc && $obj['isrc'] = $isrc;
        null !== $upc && $obj['upc'] = $upc;

        return $obj;
    }

    /**
     * [International Article Number](http://en.wikipedia.org/wiki/International_Article_Number_%28EAN%29).
     */
    public function withEan(string $ean): self
    {
        $obj = clone $this;
        $obj['ean'] = $ean;

        return $obj;
    }

    /**
     * [International Standard Recording Code](http://en.wikipedia.org/wiki/International_Standard_Recording_Code).
     */
    public function withIsrc(string $isrc): self
    {
        $obj = clone $this;
        $obj['isrc'] = $isrc;

        return $obj;
    }

    /**
     * [Universal Product Code](http://en.wikipedia.org/wiki/Universal_Product_Code).
     */
    public function withUpc(string $upc): self
    {
        $obj = clone $this;
        $obj['upc'] = $upc;

        return $obj;
    }
}
