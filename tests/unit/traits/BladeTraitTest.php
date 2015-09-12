<?php

use Aedart\Facade\Helpers\Traits\BladeTrait;
use Illuminate\View\Compilers\BladeCompiler;

/**
 * Class BladeTraitTest
 *
 * @coversDefaultClass Aedart\Facade\Helpers\Traits\BladeTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class BladeTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|BladeTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(BladeTrait::class);
    }

    /**
     * @test
     * @covers ::hasBlade
     * @covers ::hasDefaultBlade
     */
    public function hasNoDefaultBladeCompilerOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasBlade(), 'Should no have the blade compiler set');
        $this->assertFalse($mock->hasDefaultBlade(), 'Should no have a default blade compiler set');
    }

    /**
     * @test
     * @covers ::getDefaultBlade
     */
    public function returnsNullWhenNoDefaultAvailable() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertNull($mock->getDefaultBlade(), 'No default instance should be available');
    }

    /**
     * @test
     * @covers ::getBlade
     * @covers ::hasBlade
     * @covers ::hasDefaultBlade
     * @covers ::setBlade
     * @covers ::getDefaultBlade
     */
    public function canObtainBladeCompiler()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getBlade();

        $this->assertTrue($mock->hasBlade(), 'An blade compiler should have been set');
        $this->assertInstanceOf(BladeCompiler::class, $config);
    }

}