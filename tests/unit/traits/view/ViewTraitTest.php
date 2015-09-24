<?php

use Aedart\Laravel\Helpers\Traits\View\ViewTrait;
use Illuminate\Contracts\View\Factory;

/**
 * Class ViewTraitTest
 *
 * @group traits
 * @group view
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\View\ViewTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ViewTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|ViewTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(ViewTrait::class);
    }

    /**
     * @test
     * @covers ::hasView
     * @covers ::hasDefaultView
     */
    public function hasNoDefaultViewFactoryOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasView(), 'Should no have view factory set');
        $this->assertFalse($mock->hasDefaultView(), 'Should no have a default view factory set');
    }

    /**
     * @test
     * @covers ::getView
     * @covers ::hasView
     * @covers ::hasDefaultView
     * @covers ::setView
     * @covers ::getDefaultView
     */
    public function canObtainViewFactory()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getView();

        $this->assertTrue($mock->hasView(), 'A view factory should have been set');
        $this->assertInstanceOf(Factory::class, $config);
    }
}