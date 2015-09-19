<?php

use Aedart\Laravel\Helpers\Traits\Queue\QueueTrait;
use Illuminate\Contracts\Queue\Queue;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

/**
 * Class QueueTraitTest
 *
 * @group traits
 * @group queue
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Queue\QueueTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class QueueTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|QueueTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(QueueTrait::class);
    }

    /**
     * @test
     * @covers ::hasQueue
     * @covers ::hasDefaultQueue
     */
    public function hasNoDefaultQueueOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasQueue(), 'Should no have a queue set');
        $this->assertFalse($mock->hasDefaultQueue(), 'Should no have a default queue set');
    }

    /**
     * @test
     * @covers ::getDefaultQueue
     */
    public function returnsNullWhenNoDefaultAvailable() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertNull($mock->getDefaultQueue(), 'No default instance should be available');
    }

    /**
     * @test
     * @covers ::getQueue
     * @covers ::hasQueue
     * @covers ::hasDefaultQueue
     * @covers ::setQueue
     * @covers ::getDefaultQueue
     */
    public function canObtainQueue()
    {
        // Before we obtain it - we need to make a small configuration
        // because the test-fixtures in Orchestra doesn't contain it.
        // We are generating it here, more or less just like Laravel
        Config::set('app.key', Str::random(32));

        $mock = $this->getTraitMock();

        $config = $mock->getQueue();

        $this->assertTrue($mock->hasQueue(), 'A queue should have been set');
        $this->assertInstanceOf(Queue::class, $config);
    }
}