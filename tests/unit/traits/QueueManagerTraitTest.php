<?php

use Aedart\Laravel\Helpers\Traits\QueueManagerTrait;
use Illuminate\Queue\QueueManager;

/**
 * Class QueueManagerTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\QueueManagerTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class QueueManagerTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|QueueManagerTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(QueueManagerTrait::class);
    }

    /**
     * @test
     * @covers ::hasQueueManager
     * @covers ::hasDefaultQueueManager
     */
    public function hasNoDefaultQueueManagerOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasQueueManager(), 'Should no have laravel queue-manager set');
        $this->assertFalse($mock->hasDefaultQueueManager(), 'Should no have a default laravel queue-manager set');
    }

    /**
     * @test
     * @covers ::getQueueManager
     * @covers ::hasQueueManager
     * @covers ::hasDefaultQueueManager
     * @covers ::setQueueManager
     * @covers ::getDefaultQueueManager
     */
    public function canObtainQueueManager()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getQueueManager();

        $this->assertTrue($mock->hasQueueManager(), 'A laravel queue-manager logger should have been set');
        $this->assertInstanceOf(QueueManager::class, $config);
    }
}