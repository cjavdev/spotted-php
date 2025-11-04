<?php

declare(strict_types=1);

namespace Spotted\Services;

use Spotted\Client;
use Spotted\ServiceContracts\WebhooksContract;

final class WebhooksService implements WebhooksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
