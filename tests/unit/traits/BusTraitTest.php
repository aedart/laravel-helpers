<?php

use Aedart\Laravel\Helpers\Traits\BusTrait;
use Illuminate\Contracts\Bus\Dispatcher;

/**
 * Class BusTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\BusTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class BusTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|BusTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(BusTrait::class);
    }

    /**
     * @test
     * @covers ::hasBus
     * @covers ::hasDefaultBus
     */
    public function hasNoDefaultCommandBusDispatcherOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasBus(), 'Should no have a command bus dispatcher set');
        $this->assertFalse($mock->hasDefaultBus(), 'Should no have a default command bus dispatcher set');
    }

    /**
     * @test
     * @covers ::getBus
     * @covers ::hasBus
     * @covers ::hasDefaultBus
     * @covers ::setBus
     * @covers ::getDefaultBus
     */
    public function canObtainCommandBusDispatcher()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getBus();

        $this->assertTrue($mock->hasBus(), 'A command bus dispatcher should have been set');
        $this->assertInstanceOf(Dispatcher::class, $config);
    }

}