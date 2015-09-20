<?php

use Aedart\Laravel\Helpers\Traits\Filesystem\StorageTrait;
use Illuminate\Contracts\Filesystem\Filesystem;

/**
 * Class StorageTraitTest
 *
 * @group traits
 * @group filesystem
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Filesystem\StorageTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class StorageTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|StorageTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(StorageTrait::class);
    }

    /**
     * @test
     * @covers ::hasStorage
     * @covers ::hasDefaultStorage
     */
    public function hasNoDefaultStorageDiskOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasStorage(), 'Should no have a storage disk set');
        $this->assertFalse($mock->hasDefaultStorage(), 'Should no have a default storage disk set');
    }

    /**
     * @test
     * @covers ::getDefaultStorage
     */
    public function returnsNullWhenNoDefaultAvailable() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertNull($mock->getDefaultStorage(), 'No default instance should be available');
    }

    /**
     * @test
     * @covers ::getStorage
     * @covers ::hasStorage
     * @covers ::hasDefaultStorage
     * @covers ::setStorage
     * @covers ::getDefaultStorage
     */
    public function canObtainStorageDisk()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getStorage();

        $this->assertTrue($mock->hasStorage(), 'A storage disk should have been set');
        $this->assertInstanceOf(Filesystem::class, $config);
    }
}