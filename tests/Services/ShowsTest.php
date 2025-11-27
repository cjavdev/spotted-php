<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Spotted\Client;
use Spotted\CursorURLPage;
use Spotted\Shows\ShowBulkGetResponse;
use Spotted\Shows\ShowGetResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ShowsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            clientID: 'My Client ID',
            clientSecret: 'My Client Secret',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->shows->retrieve('38bS44xjbVVZ3No3ByF1dJ', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ShowGetResponse::class, $result);
    }

    #[Test]
    public function testBulkRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->shows->bulkRetrieve([
            'ids' => '5CfCWKI5pZ28U0uOzXkDHe,5as3aKmN2k11yfDDDSrvaZ',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ShowBulkGetResponse::class, $result);
    }

    #[Test]
    public function testBulkRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->shows->bulkRetrieve([
            'ids' => '5CfCWKI5pZ28U0uOzXkDHe,5as3aKmN2k11yfDDDSrvaZ', 'market' => 'ES',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ShowBulkGetResponse::class, $result);
    }

    #[Test]
    public function testListEpisodes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->shows->listEpisodes('38bS44xjbVVZ3No3ByF1dJ', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CursorURLPage::class, $result);
    }
}
