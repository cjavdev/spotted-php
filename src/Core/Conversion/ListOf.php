<?php

declare(strict_types=1);

namespace Spotted\Core\Conversion;

use Spotted\Core\Conversion\Concerns\ArrayOf;
use Spotted\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
