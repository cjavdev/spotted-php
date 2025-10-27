<?php

declare(strict_types=1);

namespace Spotted\Me\Albums\AlbumListResponse\Album;

/**
 * The precision with which `release_date` value is known.
 */
enum ReleaseDatePrecision: string
{
    case YEAR = 'year';

    case MONTH = 'month';

    case DAY = 'day';
}
