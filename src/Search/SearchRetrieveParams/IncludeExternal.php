<?php

declare(strict_types=1);

namespace Spotted\Search\SearchRetrieveParams;

/**
 * If `include_external=audio` is specified it signals that the client can play externally hosted audio content, and marks
 * the content as playable in the response. By default externally hosted audio content is marked as unplayable in the response.
 */
enum IncludeExternal: string
{
    case AUDIO = 'audio';
}
