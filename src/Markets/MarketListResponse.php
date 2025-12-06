<?php

declare(strict_types=1);

namespace Spotted\Markets;

use Spotted\Core\Attributes\Api;
use Spotted\Core\Concerns\SdkModel;
use Spotted\Core\Concerns\SdkResponse;
use Spotted\Core\Contracts\BaseModel;
use Spotted\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type MarketListResponseShape = array{markets?: list<string>|null}
 */
final class MarketListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MarketListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<string>|null $markets */
    #[Api(list: 'string', optional: true)]
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
     * @param list<string> $markets
     */
    public static function with(?array $markets = null): self
    {
        $obj = new self;

        null !== $markets && $obj['markets'] = $markets;

        return $obj;
    }

    /**
     * @param list<string> $markets
     */
    public function withMarkets(array $markets): self
    {
        $obj = clone $this;
        $obj['markets'] = $markets;

        return $obj;
    }
}
