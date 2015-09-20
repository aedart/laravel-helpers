<?php

use Aedart\Laravel\Helpers\Traits\Mail\MailQueueTrait;
use Illuminate\Contracts\Mail\MailQueue;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

/**
 * Class MailQueueTraitTest
 *
 * @group traits
 * @group mail
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Mail\MailQueueTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class MailQueueTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|MailQueueTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(MailQueueTrait::class);
    }

    /**
     * @test
     * @covers ::hasMailQueue
     * @covers ::hasDefaultMailQueue
     */
    public function hasNoDefaultMailQueueOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasMailQueue(), 'Should no have mail queue set');
        $this->assertFalse($mock->hasDefaultMailQueue(), 'Should no have a default mail queue set');
    }

    /**
     * @test
     * @covers ::getMailQueue
     * @covers ::hasMailQueue
     * @covers ::hasDefaultMailQueue
     * @covers ::setMailQueue
     * @covers ::getDefaultMailQueue
     */
    public function canObtainMailQueue()
    {
        // Before we obtain it - we need to make a small configuration
        // because the test-fixtures in Orchestra doesn't contain it.
        // We are generating it here, more or less just like Laravel
        Config::set('app.key', Str::random(32));

        $mock = $this->getTraitMock();

        $config = $mock->getMailQueue();

        $this->assertTrue($mock->hasMailQueue(), 'A mail queue should have been set');
        $this->assertInstanceOf(MailQueue::class, $config);
    }
}