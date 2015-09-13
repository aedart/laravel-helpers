<?php

use Aedart\Laravel\Helpers\Traits\EventTrait;
use Illuminate\Contracts\Events\Dispatcher;

/**
 * Class EventTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\EventTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class EventTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|EventTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(EventTrait::class);
    }

    /**
     * @test
     * @covers ::hasEvent
     * @covers ::hasDefaultEvent
     */
    public function hasNoDefaultEventDispatcherOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasEvent(), 'Should no have an event dispatcher set');
        $this->assertFalse($mock->hasDefaultEvent(), 'Should no have a default event dispatcher set');
    }

    /**
     * @test
     * @covers ::getEvent
     * @covers ::hasEvent
     * @covers ::hasDefaultEvent
     * @covers ::setEvent
     * @covers ::getDefaultEvent
     */
    public function canObtainEventDispatcher()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getEvent();

        $this->assertTrue($mock->hasEvent(), 'An event dispatcher should have been set');
        $this->assertInstanceOf(Dispatcher::class, $config);
    }

}