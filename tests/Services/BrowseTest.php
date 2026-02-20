<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Spotted\Browse\BrowseGetFeaturedPlaylistsResponse;
use Spotted\Browse\BrowseGetNewReleasesResponse;
use Spotted\Client;
use Spotted\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BrowseTest extends TestCase
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
    public function testGetFeaturedPlaylists(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->browse->getFeaturedPlaylists();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrowseGetFeaturedPlaylistsResponse::class, $result);
    }

    #[Test]
    public function testGetNewReleases(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->browse->getNewReleases();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrowseGetNewReleasesResponse::class, $result);
    }
}
