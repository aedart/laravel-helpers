<?php

use Aedart\Laravel\Helpers\Traits\GateTrait;
use Illuminate\Contracts\Auth\Access\Gate;

/**
 * Class GateTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\GateTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class GateTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|GateTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(GateTrait::class);
    }

    /**
     * @test
     * @covers ::hasGate
     * @covers ::hasDefaultGate
     */
    public function hasNoDefaultLaravelAccessGateOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasGate(), 'Should no have access gate set');
        $this->assertFalse($mock->hasDefaultGate(), 'Should no have a default access gate set');
    }

    /**
     * @test
     * @covers ::getGate
     * @covers ::hasGate
     * @covers ::hasDefaultGate
     * @covers ::setGate
     * @covers ::getDefaultGate
     */
    public function canObtainLaravelAccessGate()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getGate();

        $this->assertTrue($mock->hasGate(), 'An access gate should have been set');
        $this->assertInstanceOf(Gate::class, $config);
    }
}