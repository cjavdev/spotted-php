<?php

namespace Spotted\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Spotted Authentication Exception';
}
