<?php

use Illuminate\Contracts\Config\Repository;
use Aedart\Facade\Helpers\Traits\ConfigTrait;

/**
 * Class ConfigTraitTest
 *
 * @coversDefaultClass Aedart\Facade\Helpers\Traits\ConfigTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ConfigTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|ConfigTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(ConfigTrait::class);
    }

    /**
     * @test
     * @covers ::hasConfig
     * @covers ::hasDefaultConfig
     */
    public function hasNoDefaultConfigurationRepositoryOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasConfig(), 'Should no have a configuration repository set');
        $this->assertFalse($mock->hasDefaultConfig(), 'Should no have a default configuration repository set');
    }

    /**
     * @test
     * @covers ::getConfig
     * @covers ::hasConfig
     * @covers ::hasDefaultConfig
     * @covers ::setConfig
     * @covers ::getDefaultConfig
     */
    public function canObtainConfigurationRepository()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getConfig();

        $this->assertTrue($mock->hasConfig(), 'A configuration repository should have been set');
        $this->assertInstanceOf(Repository::class, $config);
    }
}