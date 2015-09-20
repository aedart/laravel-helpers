<?php

use Aedart\Laravel\Helpers\Traits\Mail\MailMailerTrait;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

/**
 * Class MailMailerTraitTest
 *
 * @group traits
 * @group mail
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Mail\MailMailerTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class MailMailerTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|MailMailerTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(MailMailerTrait::class);
    }

    /**
     * @test
     * @covers ::hasMailMailer
     * @covers ::hasDefaultMailMailer
     */
    public function hasNoDefaultMailMailerOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasMailMailer(), 'Should no have laravel mailer set');
        $this->assertFalse($mock->hasDefaultMailMailer(), 'Should no have a default laravel mailer set');
    }

    /**
     * @test
     * @covers ::getMailMailer
     * @covers ::hasMailMailer
     * @covers ::hasDefaultMailMailer
     * @covers ::setMailMailer
     * @covers ::getDefaultMailMailer
     */
    public function canObtainMailMailer()
    {
        // Before we obtain it - we need to make a small configuration
        // because the test-fixtures in Orchestra doesn't contain it.
        // We are generating it here, more or less just like Laravel
        Config::set('app.key', Str::random(32));

        $mock = $this->getTraitMock();

        $config = $mock->getMailMailer();

        $this->assertTrue($mock->hasMailMailer(), 'A laravel mailer should have been set');
        $this->assertInstanceOf(Mailer::class, $config);
    }
}