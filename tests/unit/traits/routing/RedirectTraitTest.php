<?php

use Aedart\Laravel\Helpers\Traits\Routing\RedirectTrait;
use Illuminate\Routing\Redirector;

/**
 * Class RedirectTraitTest
 *
 * @group traits
 * @group routing
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Routing\RedirectTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class RedirectTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|RedirectTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(RedirectTrait::class);
    }

    /**
     * @test
     * @covers ::hasRedirect
     * @covers ::hasDefaultRedirect
     */
    public function hasNoDefaultLaravelRedirectorOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasRedirect(), 'Should no have laravel redirector set');
        $this->assertFalse($mock->hasDefaultRedirect(), 'Should no have a default laravel redirector set');
    }

    /**
     * @test
     * @covers ::getRedirect
     * @covers ::hasRedirect
     * @covers ::hasDefaultRedirect
     * @covers ::setRedirect
     * @covers ::getDefaultRedirect
     */
    public function canObtainLaravelRedirector()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getRedirect();

        $this->assertTrue($mock->hasRedirect(), 'A laravel redirector should have been set');
        $this->assertInstanceOf(Redirector::class, $config);
    }
}