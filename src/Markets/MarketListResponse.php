<?php

declare(strict_types=1);

namespace Spotted\Markets;

use Spotted\Core\Attributes\Optional;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketListResponseShape = array{markets?: list<string>|null}
 */
final class MarketListResponse implements BaseModel
{
    /** @use SdkModel<MarketListResponseShape> */
    use SdkModel;

    /** @var list<string>|null $markets */
    #[Optional(list: 'string')]
    public ?array $markets;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $markets
     */
    public static function with(?array $markets = null): self
    {
        $self = new self;

        null !== $markets && $self['markets'] = $markets;

        return $self;
    }

    /**
     * @param list<string> $markets
     */
    public function withMarkets(array $markets): self
    {
        $self = clone $this;
        $self['markets'] = $markets;

        return $self;
    }
}
