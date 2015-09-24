<?php

use Aedart\Laravel\Helpers\Traits\Routing\URLTrait;
use Illuminate\Contracts\Routing\UrlGenerator;

/**
 * Class URLTraitTest
 *
 * @group traits
 * @group routing
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Routing\URLTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class URLTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|URLTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(URLTrait::class);
    }

    /**
     * @test
     * @covers ::hasURL
     * @covers ::hasDefaultURL
     */
    public function hasNoDefaultUrlGeneratorOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasURL(), 'Should no have url generator set');
        $this->assertFalse($mock->hasDefaultURL(), 'Should no have a default url generator set');
    }

    /**
     * @test
     * @covers ::getURL
     * @covers ::hasURL
     * @covers ::hasDefaultURL
     * @covers ::setURL
     * @covers ::getDefaultURL
     */
    public function canObtainUrlGenerator()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getURL();

        $this->assertTrue($mock->hasURL(), 'A url generator should have been set');
        $this->assertInstanceOf(UrlGenerator::class, $config);
    }
}