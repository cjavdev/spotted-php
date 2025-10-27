<?php

namespace Spotted\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Spotted Conflict Exception';
}
