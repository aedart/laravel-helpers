<?php

use Aedart\Laravel\Helpers\Traits\Auth\AuthTrait;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class AuthTraitTest
 *
 * @group traits
 * @group auth
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Auth\AuthTrait
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
     * @covers ::getDefaultAuth
     */
    public function returnsNullWhenNoDefaultAvailable() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertNull($mock->getDefaultAuth(), 'No default instance should be available');
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

        $guard = $mock->getAuth();

        $this->assertTrue($mock->hasAuth(), 'An authentication guard should have been set');
        $this->assertInstanceOf(Guard::class, $guard);
    }

}