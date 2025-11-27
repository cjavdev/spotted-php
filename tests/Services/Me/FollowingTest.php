<?php

namespace Tests\Services\Me;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Spotted\Client;
use Spotted\Me\Following\FollowingBulkGetResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FollowingTest extends TestCase
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
    public function testBulkRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->me->following->bulkRetrieve(['type' => 'artist']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FollowingBulkGetResponse::class, $result);
    }

    #[Test]
    public function testBulkRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->me->following->bulkRetrieve([
            'type' => 'artist', 'after' => '0I2XqVXqHScXjHhk6AYYRe', 'limit' => 10,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FollowingBulkGetResponse::class, $result);
    }

    #[Test]
    public function testCheck(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->me->following->check([
            'ids' => '2CIMQHirSU0MQqyYHq0eOx,57dN52uHvrHOxijzpIgu3E,1vCWHaC5f2uS3yhpwWbIA6',
            'type' => 'artist',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testCheckWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->me->following->check([
            'ids' => '2CIMQHirSU0MQqyYHq0eOx,57dN52uHvrHOxijzpIgu3E,1vCWHaC5f2uS3yhpwWbIA6',
            'type' => 'artist',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testFollow(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->me->following->follow(['ids' => ['string']]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testFollowWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->me->following->follow(['ids' => ['string']]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUnfollow(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->me->following->unfollow([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
