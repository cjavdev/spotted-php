<?php

declare(strict_types=1);

namespace Spotted\Core\Concerns;

use Spotted\Core\Conversion;
use Spotted\Core\Conversion\DumpState;
use Spotted\Core\Util;
use Spotted\RequestOptions;

/**
 * @internal
 */
trait SdkParams
{
    /**
     * @param array<string, mixed>|self|null           $params
     * @param array<string, mixed>|RequestOptions|null $options
     *
     * @return array{array<string, mixed>, RequestOptions}
     */
    public static function parseRequest(array|self|null $params, array|RequestOptions|null $options): array
    {
        $value = is_array($params) ? Util::array_filter_omit($params) : $params;
        $converter = self::converter();
        $state = new DumpState;
        $dumped = (array) Conversion::dump($converter, value: $value, state: $state);
        $opts = RequestOptions::parse($options); // @phpstan-ignore-line

        if (!$state->canRetry) {
            $opts->maxRetries = 0;
        }

        return [$dumped, $opts]; // @phpstan-ignore-line
    }
}
