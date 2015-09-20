<?php

use Aedart\Laravel\Helpers\Traits\Logging\LogWriterTrait;
use Illuminate\Log\Writer;

/**
 * Class LogWriterTraitTest
 *
 * @group traits
 * @group logging
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Logging\LogWriterTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class LogWriterTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|LogWriterTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(LogWriterTrait::class);
    }

    /**
     * @test
     * @covers ::hasLogWriter
     * @covers ::hasDefaultLogWriter
     */
    public function hasNoDefaultLogWriterOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasLogWriter(), 'Should no have log writer set');
        $this->assertFalse($mock->hasDefaultLogWriter(), 'Should no have a default log writer set');
    }

    /**
     * @test
     * @covers ::getLogWriter
     * @covers ::hasLogWriter
     * @covers ::hasDefaultLogWriter
     * @covers ::setLogWriter
     * @covers ::getDefaultLogWriter
     */
    public function canObtainLogWriter()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getLogWriter();

        $this->assertTrue($mock->hasLogWriter(), 'A log writer should have been set');
        $this->assertInstanceOf(Writer::class, $config);
    }
}