<?php

use Aedart\Facade\Helpers\Traits\AppTrait;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class AppTraitTest
 *
 * @coversDefaultClass Aedart\Facade\Helpers\Traits\AppTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class AppTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|AppTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(AppTrait::class);
    }

    /**
     * @test
     * @covers ::hasApp
     * @covers ::hasDefaultApp
     */
    public function hasNoDefaultApplicationOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasApp(), 'Should no have an application set');
        $this->assertFalse($mock->hasDefaultApp(), 'Should no have a default application set');
    }

    /**
     * @test
     * @covers ::getApp
     * @covers ::hasApp
     * @covers ::hasDefaultApp
     * @covers ::setApp
     * @covers ::getDefaultApp
     */
    public function canObtainApplication()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getApp();

        $this->assertTrue($mock->hasApp(), 'An application should have been set');
        $this->assertInstanceOf(Application::class, $config);
    }
}