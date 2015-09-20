<?php

use Aedart\Laravel\Helpers\Traits\Routing\ResponseTrait;
use Illuminate\Contracts\Routing\ResponseFactory;

/**
 * Class ResponseTraitTest
 *
 * @group traits
 * @group routing
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Routing\ResponseTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ResponseTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|ResponseTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(ResponseTrait::class);
    }

    /**
     * @test
     * @covers ::hasResponse
     * @covers ::hasDefaultResponse
     */
    public function hasNoDefaultResponseFactoryOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasResponse(), 'Should no have response factory set');
        $this->assertFalse($mock->hasDefaultResponse(), 'Should no have a default response factory set');
    }

    /**
     * @test
     * @covers ::getResponse
     * @covers ::hasResponse
     * @covers ::hasDefaultResponse
     * @covers ::setResponse
     * @covers ::getDefaultResponse
     */
    public function canObtainResponseFactory()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getResponse();

        $this->assertTrue($mock->hasResponse(), 'A response factory should have been set');
        $this->assertInstanceOf(ResponseFactory::class, $config);
    }
}