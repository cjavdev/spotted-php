<?php

declare(strict_types=1);

namespace Spotted\Artists\ArtistListAlbumsResponse;

/**
 * This field describes the relationship between the artist and the album.
 *
 * @deprecated
 */
enum AlbumGroup: string
{
    case ALBUM = 'album';

    case SINGLE = 'single';

    case COMPILATION = 'compilation';

    case APPEARS_ON = 'appears_on';
}
