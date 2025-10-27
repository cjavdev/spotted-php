<?php

namespace Spotted\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Spotted Rate Limit Exception';
}
