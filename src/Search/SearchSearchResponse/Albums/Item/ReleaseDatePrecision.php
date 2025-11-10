<?php

declare(strict_types=1);

namespace Spotted\Search\SearchSearchResponse\Albums\Item;

/**
 * The precision with which `release_date` value is known.
 */
enum ReleaseDatePrecision: string
{
    case YEAR = 'year';

    case MONTH = 'month';

    case DAY = 'day';
}
