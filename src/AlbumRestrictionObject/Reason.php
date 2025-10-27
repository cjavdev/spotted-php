<?php

declare(strict_types=1);

namespace Spotted\AlbumRestrictionObject;

/**
 * The reason for the restriction. Albums may be restricted if the content is not available in a given market, to the user's subscription type, or when the user's account is set to not play explicit content.
 * Additional reasons may be added in the future.
 */
enum Reason: string
{
    case MARKET = 'market';

    case PRODUCT = 'product';

    case EXPLICIT = 'explicit';
}
