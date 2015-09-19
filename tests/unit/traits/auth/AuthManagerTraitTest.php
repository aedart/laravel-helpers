<?php

use Aedart\Laravel\Helpers\Traits\Auth\AuthManagerTrait;
use Illuminate\Auth\AuthManager;

/**
 * Class AuthManagerTraitTest
 *
 * @group traits
 * @group auth
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Auth\AuthManagerTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class AuthManagerTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|AuthManagerTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(AuthManagerTrait::class);
    }

    /**
     * @test
     * @covers ::hasAuthManager
     * @covers ::hasDefaultAuthManager
     */
    public function hasNoDefaultAuthenticationManagerOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasAuthManager(), 'Should no have the authentication manager set');
        $this->assertFalse($mock->hasDefaultAuthManager(), 'Should no have the default authentication manager set');
    }

    /**
     * @test
     * @covers ::getAuthManager
     * @covers ::hasAuthManager
     * @covers ::hasDefaultAuthManager
     * @covers ::setAuthManager
     * @covers ::getDefaultAuthManager
     */
    public function canObtainAuthenticationManager()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getAuthManager();

        $this->assertTrue($mock->hasAuthManager(), 'The authentication manager should have been set');
        $this->assertInstanceOf(AuthManager::class, $config);
    }
}