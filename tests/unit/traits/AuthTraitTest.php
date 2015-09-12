<?php

use Aedart\Facade\Helpers\Traits\AuthTrait;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class AuthTraitTest
 *
 * @coversDefaultClass Aedart\Facade\Helpers\Traits\AuthTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class AuthTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|AuthTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(AuthTrait::class);
    }

    /**
     * @test
     * @covers ::hasAuth
     * @covers ::hasDefaultAuth
     */
    public function hasNoDefaultAuthenticationGuardOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasAuth(), 'Should no have an authentication guard set');
        $this->assertFalse($mock->hasDefaultAuth(), 'Should no have a default authentication guard set');
    }

    /**
     * @test
     * @covers ::getAuth
     * @covers ::hasAuth
     * @covers ::hasDefaultAuth
     * @covers ::setAuth
     * @covers ::getDefaultAuth
     */
    public function canObtainAuthenticationGuard()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getAuth();

        $this->assertTrue($mock->hasAuth(), 'An authentication guard should have been set');
        $this->assertInstanceOf(Guard::class, $config);
    }

}