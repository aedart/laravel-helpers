<?php

use Aedart\Laravel\Helpers\Traits\Session\SessionTrait;
use Illuminate\Session\SessionInterface;

/**
 * Class SessionTraitTest
 *
 * @group traits
 * @group session
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Session\SessionTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class SessionTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|SessionTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(SessionTrait::class);
    }

    /**
     * @test
     * @covers ::hasSession
     * @covers ::hasDefaultSession
     */
    public function hasNoDefaultSessionOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasSession(), 'Should no have session set');
        $this->assertFalse($mock->hasDefaultSession(), 'Should no have a default session set');
    }

    /**
     * @test
     * @covers ::getDefaultSession
     */
    public function returnsNullWhenNoDefaultAvailable() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertNull($mock->getDefaultSession(), 'No default instance should be available');
    }

    /**
     * @test
     * @covers ::getSession
     * @covers ::hasSession
     * @covers ::hasDefaultSession
     * @covers ::setSession
     * @covers ::getDefaultSession
     */
    public function canObtainSession()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getSession();

        $this->assertTrue($mock->hasSession(), 'A session should have been set');
        $this->assertInstanceOf(SessionInterface::class, $config);
    }
}