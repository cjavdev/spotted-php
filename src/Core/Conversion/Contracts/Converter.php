<?php

declare(strict_types=1);

namespace Spotted\Core\Conversion\Contracts;

use Spotted\Core\Conversion\CoerceState;
use Spotted\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
