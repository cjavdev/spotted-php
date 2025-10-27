<?php

namespace Spotted\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Spotted Bad Request Exception';
}
