<?php

declare(strict_types=1);

namespace Spotted\Me\Albums\AlbumListResponse\Album;

/**
 * The type of the album.
 */
enum AlbumType: string
{
    case ALBUM = 'album';

    case SINGLE = 'single';

    case COMPILATION = 'compilation';
}
