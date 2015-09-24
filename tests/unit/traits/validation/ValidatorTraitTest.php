<?php

use Aedart\Laravel\Helpers\Traits\Validation\ValidatorTrait;
use Illuminate\Contracts\Validation\Factory;

/**
 * Class ValidatorTraitTest
 *
 * @group traits
 * @group validation
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Validation\ValidatorTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ValidatorTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|ValidatorTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(ValidatorTrait::class);
    }

    /**
     * @test
     * @covers ::hasValidator
     * @covers ::hasDefaultValidator
     */
    public function hasNoDefaultValidationFactoryOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasValidator(), 'Should no have validation factory set');
        $this->assertFalse($mock->hasDefaultValidator(), 'Should no have a default validation factory set');
    }

    /**
     * @test
     * @covers ::getValidator
     * @covers ::hasValidator
     * @covers ::hasDefaultValidator
     * @covers ::setValidator
     * @covers ::getDefaultValidator
     */
    public function canObtainValidationFactory()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getValidator();

        $this->assertTrue($mock->hasValidator(), 'A validation factory should have been set');
        $this->assertInstanceOf(Factory::class, $config);
    }
}