<?php

use Aedart\Laravel\Helpers\Traits\PasswordTrait;
use Illuminate\Contracts\Auth\PasswordBroker;

/**
 * Class PasswordTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\PasswordTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class PasswordTraitTest extends TraitTestCase{

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
        $mock = $this->getTraitMock();

        $config = $mock->getPassword();

        $this->assertTrue($mock->hasPassword(), 'A password broker should have been set');
        $this->assertInstanceOf(PasswordBroker::class, $config);
    }
}