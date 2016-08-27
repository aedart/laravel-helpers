<?php

use Aedart\Laravel\Helpers\Traits\Database\SchemaTrait;
use Illuminate\Database\Schema\Builder;

/**
 * Class SchemaTraitTest
 *
 * @group traits
 * @group database
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Database\SchemaTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class SchemaTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|SchemaTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(SchemaTrait::class);
    }

    /**
     * @test
     * @covers ::connection
     */
    public function returnsNullConnectionAvailable() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertNull($mock->connection('mysql'), 'No default instance should be available');
    }

    /**
     * @test
     * @covers ::connection
     */
    public function returnsSchemaBuilderWhenConnectionIsAvailable() {
        $mock = $this->getTraitMock();

        $result = $mock->connection('mysql');

        $this->assertNotNull($result, 'Should not be null, when connection is available');
        $this->assertInstanceOf(Builder::class, $result);
    }
}