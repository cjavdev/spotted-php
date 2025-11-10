<?php

declare(strict_types=1);

namespace Spotted\Search\SearchSearchParams;

enum Type: string
{
    case ALBUM = 'album';

    case ARTIST = 'artist';

    case PLAYLIST = 'playlist';

    case TRACK = 'track';

    case SHOW = 'show';

    case EPISODE = 'episode';

    case AUDIOBOOK = 'audiobook';
}
