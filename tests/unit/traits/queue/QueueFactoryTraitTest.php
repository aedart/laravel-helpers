<?php

use Aedart\Laravel\Helpers\Traits\Queue\QueueFactoryTrait;
use Illuminate\Contracts\Queue\Factory;

/**
 * Class QueueFactoryTraitTest
 *
 * @group traits
 * @group queue
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Queue\QueueFactoryTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class QueueFactoryTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|QueueFactoryTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(QueueFactoryTrait::class);
    }

    /**
     * @test
     * @covers ::hasQueueFactory
     * @covers ::hasDefaultQueueFactory
     */
    public function hasNoDefaultQueueFactoryOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasQueueFactory(), 'Should no have queue-factory set');
        $this->assertFalse($mock->hasDefaultQueueFactory(), 'Should no have a default queue-factory set');
    }

    /**
     * @test
     * @covers ::getQueueFactory
     * @covers ::hasQueueFactory
     * @covers ::hasDefaultQueueFactory
     * @covers ::setQueueFactory
     * @covers ::getDefaultQueueFactory
     */
    public function canObtainQueueFactory()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getQueueFactory();

        $this->assertTrue($mock->hasQueueFactory(), 'A queue-factory logger should have been set');
        $this->assertInstanceOf(Factory::class, $config);
    }
}