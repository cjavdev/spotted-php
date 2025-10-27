<?php

declare(strict_types=1);

namespace Spotted\Me\Following\FollowingCheckParams;

/**
 * The ID type: either `artist` or `user`.
 */
enum Type: string
{
    case ARTIST = 'artist';

    case USER = 'user';
}
