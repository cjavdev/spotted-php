<?php

declare(strict_types=1);

namespace Spotted\Search\SearchQueryResponse\Albums\Item;

/**
 * The type of the album.
 */
enum AlbumType: string
{
    case ALBUM = 'album';

    case SINGLE = 'single';

    case COMPILATION = 'compilation';
}
