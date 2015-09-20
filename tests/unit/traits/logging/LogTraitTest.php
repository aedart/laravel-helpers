<?php

use Aedart\Laravel\Helpers\Traits\Logging\LogTrait;
use Illuminate\Contracts\Logging\Log;

/**
 * Class LogTraitTest
 *
 * @group traits
 * @group logging
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Logging\LogTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class LogTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|LogTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(LogTrait::class);
    }

    /**
     * @test
     * @covers ::hasLog
     * @covers ::hasDefaultLog
     */
    public function hasNoDefaultLaravelLoggerOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasLog(), 'Should no have logger set');
        $this->assertFalse($mock->hasDefaultLog(), 'Should no have a default logger set');
    }

    /**
     * @test
     * @covers ::getLog
     * @covers ::hasLog
     * @covers ::hasDefaultLog
     * @covers ::setLog
     * @covers ::getDefaultLog
     */
    public function canObtainLaravelLogger()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getLog();

        $this->assertTrue($mock->hasLog(), 'A logger should have been set');
        $this->assertInstanceOf(Log::class, $config);
    }
}