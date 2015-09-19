<?php

use Aedart\Laravel\Helpers\Traits\MailTrait;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

/**
 * Class MailTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\MailTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class MailTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|MailTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(MailTrait::class);
    }

    /**
     * @test
     * @covers ::hasMail
     * @covers ::hasDefaultMail
     */
    public function hasNoDefaultMailSenderOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasMail(), 'Should no have mail-sender set');
        $this->assertFalse($mock->hasDefaultMail(), 'Should no have a default mail-sender set');
    }

    /**
     * @test
     * @covers ::getMail
     * @covers ::hasMail
     * @covers ::hasDefaultMail
     * @covers ::setMail
     * @covers ::getDefaultMail
     */
    public function canObtainMailSender()
    {
        // Before we obtain it - we need to make a small configuration
        // because the test-fixtures in Orchestra doesn't contain it.
        // We are generating it here, more or less just like Laravel
        Config::set('app.key', Str::random(32));

        $mock = $this->getTraitMock();

        $config = $mock->getMail();

        $this->assertTrue($mock->hasMail(), 'A mail-sender writer should have been set');
        $this->assertInstanceOf(Mailer::class, $config);
    }
}