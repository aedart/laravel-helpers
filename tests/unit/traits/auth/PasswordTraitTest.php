<?php

use Aedart\Laravel\Helpers\Traits\Auth\PasswordTrait;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

/**
 * Class PasswordTraitTest
 *
 * @group traits
 * @group auth
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Auth\PasswordTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class PasswordTraitTest extends TraitTestCase {

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|PasswordTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(PasswordTrait::class);
    }

    /**
     * @test
     * @covers ::hasPassword
     * @covers ::hasDefaultPassword
     */
    public function hasNoDefaultPasswordBrokerOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasPassword(), 'Should no have password broker set');
        $this->assertFalse($mock->hasDefaultPassword(), 'Should no have a default password broker set');
    }

    /**
     * @test
     * @covers ::getPassword
     * @covers ::hasPassword
     * @covers ::hasDefaultPassword
     * @covers ::setPassword
     * @covers ::getDefaultPassword
     */
    public function canObtainPasswordBroker()
    {
        // Before we obtain it - we need to make a small configuration
        // because the test-fixtures in Orchestra doesn't contain it.
        // We are generating it here, more or less just like Laravel
        Config::set('app.key', Str::random(32));

        $mock = $this->getTraitMock();

        $config = $mock->getPassword();

        $this->assertTrue($mock->hasPassword(), 'A password broker should have been set');
        $this->assertInstanceOf(PasswordBroker::class, $config);
    }
}