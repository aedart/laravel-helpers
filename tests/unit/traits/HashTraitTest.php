<?php

use Aedart\Laravel\Helpers\Traits\HashTrait;
use Illuminate\Contracts\Hashing\Hasher;

/**
 * Class HashTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\HashTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package unit\traits
 */
class HashTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|HashTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(HashTrait::class);
    }

    /**
     * @test
     * @covers ::hasHash
     * @covers ::hasDefaultHash
     */
    public function hasNoDefaultLaravelHasherOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasHash(), 'Should no have hasher set');
        $this->assertFalse($mock->hasDefaultHash(), 'Should no have a default hasher set');
    }

    /**
     * @test
     * @covers ::getHash
     * @covers ::hasHash
     * @covers ::hasDefaultHash
     * @covers ::setHash
     * @covers ::getDefaultHash
     */
    public function canObtainLaravelHasher()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getHash();

        $this->assertTrue($mock->hasHash(), 'A hasher should have been set');
        $this->assertInstanceOf(Hasher::class, $config);
    }

}