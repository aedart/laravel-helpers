<?php

use Aedart\Laravel\Helpers\Traits\Session\SessionManagerTrait;
use Illuminate\Session\SessionManager;

/**
 * Class SessionManagerTraitTest
 *
 * @group traits
 * @group session
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Session\SessionManagerTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class SessionManagerTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|SessionManagerTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(SessionManagerTrait::class);
    }

    /**
     * @test
     * @covers ::hasSessionManager
     * @covers ::hasDefaultSessionManager
     */
    public function hasNoDefaultLaravelSessionManagerOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasSessionManager(), 'Should no have laravel session manager set');
        $this->assertFalse($mock->hasDefaultSessionManager(), 'Should no have a default laravel session manager set');
    }

    /**
     * @test
     * @covers ::getSessionManager
     * @covers ::hasSessionManager
     * @covers ::hasDefaultSessionManager
     * @covers ::setSessionManager
     * @covers ::getDefaultSessionManager
     */
    public function canObtainLaravelSessionManager()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getSessionManager();

        $this->assertTrue($mock->hasSessionManager(), 'A laravel session manager should have been set');
        $this->assertInstanceOf(SessionManager::class, $config);
    }

}