<?php

use Aedart\Laravel\Helpers\Traits\Filesystem\FileTrait;
use Illuminate\Filesystem\Filesystem;

/**
 * Class FileTraitTest
 *
 * @group traits
 * @group filesystem
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Filesystem\FileTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class FileTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|FileTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(FileTrait::class);
    }

    /**
     * @test
     * @covers ::hasFile
     * @covers ::hasDefaultFile
     */
    public function hasNoDefaultLaravelFilesystemUtilityOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasFile(), 'Should no have filesystem set');
        $this->assertFalse($mock->hasDefaultFile(), 'Should no have a default filesystem set');
    }

    /**
     * @test
     * @covers ::getFile
     * @covers ::hasFile
     * @covers ::hasDefaultFile
     * @covers ::setFile
     * @covers ::getDefaultFile
     */
    public function canObtainLaravelFilesystemUtility()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getFile();

        $this->assertTrue($mock->hasFile(), 'An filesystem should have been set');
        $this->assertInstanceOf(Filesystem::class, $config);
    }
}