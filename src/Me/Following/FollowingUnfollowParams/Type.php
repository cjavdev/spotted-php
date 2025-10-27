<?php

declare(strict_types=1);

namespace Spotted\Me\Following\FollowingUnfollowParams;

/**
 * The ID type: either `artist` or `user`.
 */
enum Type: string
{
    case ARTIST = 'artist';

    case USER = 'user';
}
