<?php

namespace Spotted\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Spotted Permission Denied Exception';
}
