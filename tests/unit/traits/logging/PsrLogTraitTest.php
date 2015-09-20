<?php

use Aedart\Laravel\Helpers\Traits\Logging\PsrLogTrait;
use Psr\Log\LoggerInterface;

/**
 * Class PsrLogTraitTest
 *
 * @group traits
 * @group logging
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Logging\PsrLogTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class PsrLogTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|PsrLogTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(PsrLogTrait::class);
    }

    /**
     * @test
     * @covers ::hasPsrLog
     * @covers ::hasDefaultPsrLog
     */
    public function hasNoDefaultPsrLoggerOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasPsrLog(), 'Should no have (psr) logger set');
        $this->assertFalse($mock->hasDefaultPsrLog(), 'Should no have a default (psr) logger set');
    }

    /**
     * @test
     * @covers ::getPsrLog
     * @covers ::hasPsrLog
     * @covers ::hasDefaultPsrLog
     * @covers ::setPsrLog
     * @covers ::getDefaultPsrLog
     */
    public function canObtainPsrLogger()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getPsrLog();

        $this->assertTrue($mock->hasPsrLog(), 'A (psr) logger should have been set');
        $this->assertInstanceOf(LoggerInterface::class, $config);
    }
}