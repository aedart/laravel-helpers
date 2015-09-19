<?php

use Aedart\Laravel\Helpers\Traits\Cache\CacheFactoryTrait;
use Illuminate\Contracts\Cache\Factory;

/**
 * Class CacheFactoryTraitTest
 *
 * @group traits
 * @group cache
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Cache\CacheFactoryTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class CacheFactoryTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|CacheFactoryTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(CacheFactoryTrait::class);
    }

    /**
     * @test
     * @covers ::hasCacheFactory
     * @covers ::hasDefaultCacheFactory
     */
    public function hasNoDefaultCacheFactoryOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasCacheFactory(), 'Should no have a cache factory set');
        $this->assertFalse($mock->hasDefaultCacheFactory(), 'Should no have a default cache factory set');
    }

    /**
     * @test
     * @covers ::getCacheFactory
     * @covers ::hasCacheFactory
     * @covers ::hasDefaultCacheFactory
     * @covers ::setCacheFactory
     * @covers ::getDefaultCacheFactory
     */
    public function canObtainCacheFactory()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getCacheFactory();

        $this->assertTrue($mock->hasCacheFactory(), 'A cache factory should have been set');
        $this->assertInstanceOf(Factory::class, $config);
    }
}