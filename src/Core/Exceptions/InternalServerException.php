<?php

namespace Spotted\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Spotted Internal Server Exception';
}
