<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Spotted\ArtistObject;
use Spotted\Artists\ArtistBulkGetResponse;
use Spotted\Artists\ArtistListRelatedArtistsResponse;
use Spotted\Artists\ArtistTopTracksResponse;
use Spotted\Client;
use Spotted\CursorURLPage;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ArtistsTest extends TestCase
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

        $result = $this->client->artists->retrieve('0TnOYISbd1XYRBk9myaseg');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ArtistObject::class, $result);
    }

    #[Test]
    public function testBulkRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->artists->bulkRetrieve([
            'ids' => '2CIMQHirSU0MQqyYHq0eOx,57dN52uHvrHOxijzpIgu3E,1vCWHaC5f2uS3yhpwWbIA6',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ArtistBulkGetResponse::class, $result);
    }

    #[Test]
    public function testBulkRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->artists->bulkRetrieve([
            'ids' => '2CIMQHirSU0MQqyYHq0eOx,57dN52uHvrHOxijzpIgu3E,1vCWHaC5f2uS3yhpwWbIA6',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ArtistBulkGetResponse::class, $result);
    }

    #[Test]
    public function testListAlbums(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->artists->listAlbums('0TnOYISbd1XYRBk9myaseg', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CursorURLPage::class, $result);
    }

    #[Test]
    public function testListRelatedArtists(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->artists->listRelatedArtists(
            '0TnOYISbd1XYRBk9myaseg'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ArtistListRelatedArtistsResponse::class, $result);
    }

    #[Test]
    public function testTopTracks(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->artists->topTracks('0TnOYISbd1XYRBk9myaseg', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ArtistTopTracksResponse::class, $result);
    }
}
