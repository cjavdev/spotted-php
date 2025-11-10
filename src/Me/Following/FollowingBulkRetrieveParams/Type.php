<?php

declare(strict_types=1);

namespace Spotted\Me\Following\FollowingBulkRetrieveParams;

/**
 * The ID type: currently only `artist` is supported.
 */
enum Type: string
{
    case ARTIST = 'artist';
}
