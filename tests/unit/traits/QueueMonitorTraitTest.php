<?php

use Aedart\Laravel\Helpers\Traits\QueueMonitorTrait;
use Illuminate\Contracts\Queue\Monitor;

/**
 * Class QueueMonitorTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\QueueMonitorTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class QueueMonitorTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|QueueMonitorTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(QueueMonitorTrait::class);
    }

    /**
     * @test
     * @covers ::hasQueueMonitor
     * @covers ::hasDefaultQueueMonitor
     */
    public function hasNoDefaultQueueMonitorOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasQueueMonitor(), 'Should no have queue-monitor set');
        $this->assertFalse($mock->hasDefaultQueueMonitor(), 'Should no have a default queue-monitor set');
    }

    /**
     * @test
     * @covers ::getQueueMonitor
     * @covers ::hasQueueMonitor
     * @covers ::hasDefaultQueueMonitor
     * @covers ::setQueueMonitor
     * @covers ::getDefaultQueueMonitor
     */
    public function canObtainQueueMonitor()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getQueueMonitor();

        $this->assertTrue($mock->hasQueueMonitor(), 'A queue-monitor logger should have been set');
        $this->assertInstanceOf(Monitor::class, $config);
    }
}