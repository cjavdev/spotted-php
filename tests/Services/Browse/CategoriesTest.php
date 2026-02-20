<?php

namespace Tests\Services\Browse;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Spotted\Browse\Categories\CategoryGetPlaylistsResponse;
use Spotted\Browse\Categories\CategoryGetResponse;
use Spotted\Browse\Categories\CategoryListResponse;
use Spotted\Client;
use Spotted\Core\Util;
use Spotted\CursorURLPage;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CategoriesTest extends TestCase
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->browse->categories->retrieve('dinner');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CategoryGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->browse->categories->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CursorURLPage::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(CategoryListResponse::class, $item);
        }
    }

    #[Test]
    public function testGetPlaylists(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->browse->categories->getPlaylists('dinner');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CategoryGetPlaylistsResponse::class, $result);
    }
}
