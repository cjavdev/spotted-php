<?php

declare(strict_types=1);

namespace Spotted\Me\Following\FollowingFollowParams;

/**
 * The ID type.
 */
enum Type: string
{
    case ARTIST = 'artist';

    case USER = 'user';
}
