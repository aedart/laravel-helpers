<?php

use Aedart\Laravel\Helpers\Traits\Filesystem\StorageFactoryTrait;
use Illuminate\Contracts\Filesystem\Factory;

/**
 * Class StorageFactoryTraitTest
 *
 * @group traits
 * @group filesystem
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Filesystem\StorageFactoryTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class StorageFactoryTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|StorageFactoryTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(StorageFactoryTrait::class);
    }

    /**
     * @test
     * @covers ::hasStorageFactory
     * @covers ::hasDefaultStorageFactory
     */
    public function hasNoDefaultStorageFactoryOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasStorageFactory(), 'Should no have a storage factory set');
        $this->assertFalse($mock->hasDefaultStorageFactory(), 'Should no have a default storage factory set');
    }

    /**
     * @test
     * @covers ::getStorageFactory
     * @covers ::hasStorageFactory
     * @covers ::hasDefaultStorageFactory
     * @covers ::setStorageFactory
     * @covers ::getDefaultStorageFactory
     */
    public function canObtainStorageFactory()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getStorageFactory();

        $this->assertTrue($mock->hasStorageFactory(), 'A storage factory should have been set');
        $this->assertInstanceOf(Factory::class, $config);
    }
}