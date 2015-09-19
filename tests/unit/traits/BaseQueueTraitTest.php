<?php

use Aedart\Laravel\Helpers\Traits\BaseQueueTrait;
use Illuminate\Queue\Queue;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

/**
 * Class BaseQueueTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\BaseQueueTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class BaseQueueTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|BaseQueueTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(BaseQueueTrait::class);
    }

    /**
     * @test
     * @covers ::hasBaseQueue
     * @covers ::hasDefaultBaseQueue
     */
    public function hasNoDefaultBaseQueueOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasBaseQueue(), 'Should no have a base-queue set');
        $this->assertFalse($mock->hasDefaultBaseQueue(), 'Should no have a default base-queue set');
    }

    /**
     * @test
     * @covers ::getDefaultBaseQueue
     */
    public function returnsNullWhenNoDefaultAvailable() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertNull($mock->getDefaultBaseQueue(), 'No default instance should be available');
    }

    /**
     * @test
     * @covers ::getBaseQueue
     * @covers ::hasBaseQueue
     * @covers ::hasDefaultBaseQueue
     * @covers ::setBaseQueue
     * @covers ::getDefaultBaseQueue
     */
    public function canObtainBaseQueue()
    {
        // Before we obtain it - we need to make a small configuration
        // because the test-fixtures in Orchestra doesn't contain it.
        // We are generating it here, more or less just like Laravel
        Config::set('app.key', Str::random(32));

        $mock = $this->getTraitMock();

        $config = $mock->getBaseQueue();

        $this->assertTrue($mock->hasBaseQueue(), 'A base-queue should have been set');
        $this->assertInstanceOf(Queue::class, $config);
    }
}