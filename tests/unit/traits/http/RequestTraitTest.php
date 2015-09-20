<?php

use Aedart\Laravel\Helpers\Traits\Http\RequestTrait;
use Illuminate\Http\Request;

/**
 * Class RequestTraitTest
 *
 * @group traits
 * @group http
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Http\RequestTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class RequestTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|RequestTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(RequestTrait::class);
    }

    /**
     * @test
     * @covers ::hasRequest
     * @covers ::hasDefaultRequest
     */
    public function hasNoDefaultLaravelRequestOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasRequest(), 'Should no have laravel request set');
        $this->assertFalse($mock->hasDefaultRequest(), 'Should no have a default laravel request set');
    }

    /**
     * @test
     * @covers ::getRequest
     * @covers ::hasRequest
     * @covers ::hasDefaultRequest
     * @covers ::setRequest
     * @covers ::getDefaultRequest
     */
    public function canObtainLaravelRequest()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getRequest();

        $this->assertTrue($mock->hasRequest(), 'A laravel request should have been set');
        $this->assertInstanceOf(Request::class, $config);
    }
}