<?php

use Aedart\Laravel\Helpers\Traits\DBTrait;
use Illuminate\Database\ConnectionInterface;

/**
 * Class DBTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\DBTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class DBTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|DBTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(DBTrait::class);
    }

    /**
     * @test
     * @covers ::hasDb
     * @covers ::hasDefaultDb
     */
    public function hasNoDefaultDatabaseConnectionOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasDb(), 'Should no have a database connection set');
        $this->assertFalse($mock->hasDefaultDb(), 'Should no have a default database connection set');
    }

    /**
     * @test
     * @covers ::getDefaultDb
     */
    public function returnsNullWhenNoDefaultAvailable() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertNull($mock->getDefaultDb(), 'No default instance should be available');
    }

    /**
     * @test
     * @covers ::getDb
     * @covers ::hasDb
     * @covers ::hasDefaultDb
     * @covers ::setDb
     * @covers ::getDefaultDb
     */
    public function canObtainDatabaseConnection()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getDb();

        $this->assertTrue($mock->hasDb(), 'A database connection should have been set');
        $this->assertInstanceOf(ConnectionInterface::class, $config);
    }
}