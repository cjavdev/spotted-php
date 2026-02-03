<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Spotted\Client;
use Spotted\Core\Util;
use Spotted\EpisodeObject;
use Spotted\Episodes\EpisodeBulkGetResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EpisodesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->episodes->retrieve('512ojhOuo1ktJprKbVcKyQ');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EpisodeObject::class, $result);
    }

    #[Test]
    public function testBulkRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->episodes->bulkRetrieve(
            ids: '77o6BIVlYM3msb4MMIL1jH,0Q86acNRm6V9GYx55SXKwf'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EpisodeBulkGetResponse::class, $result);
    }

    #[Test]
    public function testBulkRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->episodes->bulkRetrieve(
            ids: '77o6BIVlYM3msb4MMIL1jH,0Q86acNRm6V9GYx55SXKwf',
            market: 'ES'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EpisodeBulkGetResponse::class, $result);
    }
}
