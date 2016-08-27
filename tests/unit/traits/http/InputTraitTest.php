<?php

use Aedart\Laravel\Helpers\Traits\Http\InputTrait;
use Illuminate\Http\Request;
use \Mockery as m;

/**
 * Class InputTraitTest
 *
 * @group traits
 * @group http
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Http\InputTrait
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