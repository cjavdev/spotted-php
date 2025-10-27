<?php

namespace Spotted\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Spotted Not Found Exception';
}
