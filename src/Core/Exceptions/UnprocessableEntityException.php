<?php

namespace Spotted\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Spotted Unprocessable Entity Exception';
}
