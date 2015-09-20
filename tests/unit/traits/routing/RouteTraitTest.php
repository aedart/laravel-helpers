<?php

use Aedart\Laravel\Helpers\Traits\Routing\RouteTrait;
use Illuminate\Contracts\Routing\Registrar;

/**
 * Class RouteTraitTest
 *
 * @group traits
 * @group routing
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Routing\RouteTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class RouteTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|RouteTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(RouteTrait::class);
    }

    /**
     * @test
     * @covers ::hasRoute
     * @covers ::hasDefaultRoute
     */
    public function hasNoDefaultRouteRegistrarOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasRoute(), 'Should no have route registrar set');
        $this->assertFalse($mock->hasDefaultRoute(), 'Should no have a default route registrar set');
    }

    /**
     * @test
     * @covers ::getRoute
     * @covers ::hasRoute
     * @covers ::hasDefaultRoute
     * @covers ::setRoute
     * @covers ::getDefaultRoute
     */
    public function canObtainRouteRegistrar()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getRoute();

        $this->assertTrue($mock->hasRoute(), 'A route registrar should have been set');
        $this->assertInstanceOf(Registrar::class, $config);
    }
}