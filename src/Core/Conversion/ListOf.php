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

    private function empty(): array|object // @phpstan-ignore-line
    {
        return [];
    }
}
