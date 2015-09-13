<?php

use Aedart\Laravel\Helpers\Traits\ArtisanTrait;
use Illuminate\Contracts\Console\Kernel;

/**
 * Class ArtisanTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\ArtisanTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ArtisanTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|ArtisanTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(ArtisanTrait::class);
    }

    /**
     * @test
     * @covers ::hasArtisan
     * @covers ::hasDefaultArtisan
     */
    public function hasNoDefaultArtisanKernelOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasArtisan(), 'Should no have an artisan kernel set');
        $this->assertFalse($mock->hasDefaultArtisan(), 'Should no have a default artisan kernel set');
    }

    /**
     * @test
     * @covers ::getArtisan
     * @covers ::hasArtisan
     * @covers ::hasDefaultArtisan
     * @covers ::setArtisan
     * @covers ::getDefaultArtisan
     */
    public function canObtainArtisanKernel()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getArtisan();

        $this->assertTrue($mock->hasArtisan(), 'An artisan kernel should have been set');
        $this->assertInstanceOf(Kernel::class, $config);
    }
}