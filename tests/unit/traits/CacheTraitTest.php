<?php

use Aedart\Laravel\Helpers\Traits\CacheTrait;
use Illuminate\Contracts\Cache\Repository;

/**
 * Class CacheTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\CacheTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class CacheTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|CacheTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(CacheTrait::class);
    }

    /**
     * @test
     * @covers ::hasCache
     * @covers ::hasDefaultCache
     */
    public function hasNoDefaultCacheRepositoryOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasCache(), 'Should no have a cache repository set');
        $this->assertFalse($mock->hasDefaultCache(), 'Should no have a default cache repository set');
    }

    /**
     * @test
     * @covers ::getDefaultCache
     */
    public function returnsNullWhenNoDefaultAvailable() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertNull($mock->getDefaultCache(), 'No default instance should be available');
    }

    /**
     * @test
     * @covers ::getCache
     * @covers ::hasCache
     * @covers ::hasDefaultCache
     * @covers ::setCache
     * @covers ::getDefaultCache
     */
    public function canObtainCacheRepository()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getCache();

        $this->assertTrue($mock->hasCache(), 'A cache repository should have been set');
        $this->assertInstanceOf(Repository::class, $config);
    }
}