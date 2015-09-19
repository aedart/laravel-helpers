<?php

use Aedart\Laravel\Helpers\Traits\InputTrait;
use Illuminate\Http\Request;
use \Mockery as m;
use Faker\Factory;

/**
 * Class InputTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\InputTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class InputTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|InputTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(InputTrait::class);
    }

    /**
     * @test
     * @covers ::hasInput
     * @covers ::hasDefaultInput
     */
    public function hasNoDefaultLaravelRequestInputOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasInput(), 'Should no have request set');
        $this->assertFalse($mock->hasDefaultInput(), 'Should no have a default request (input) set');
    }

    /**
     * @test
     * @covers ::getInput
     * @covers ::hasInput
     * @covers ::hasDefaultInput
     * @covers ::setInput
     * @covers ::getDefaultInput
     */
    public function canObtainLaravelRequestInput()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getInput();

        $this->assertTrue($mock->hasInput(), 'A request (input) should have been set');
        $this->assertInstanceOf(Request::class, $config);
    }

    /**
     * @test
     * @covers ::get
     */
    public function canObtainValueFromInput() {
        $key = $this->faker->word;

        $value = $this->faker->sentence;

        $input = m::mock(Request::class);

        $input->shouldReceive('input')
            ->with($key, null)
            ->andReturn($value);

        $mock = $this->getTraitMock();
        $mock->setInput($input);

        $this->assertSame($value, $mock->get($key), 'Incorrect value returned');
    }
}