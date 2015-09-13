<?php

use Aedart\Laravel\Helpers\Traits\DBManagerTrait;
use Illuminate\Database\DatabaseManager;

/**
 * Class DBManagerTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\DBManagerTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class DBManagerTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|DBManagerTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(DBManagerTrait::class);
    }

    /**
     * @test
     * @covers ::hasDbManager
     * @covers ::hasDefaultDbManager
     */
    public function hasNoDefaultDatabaseManagerOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasDbManager(), 'Should no have a database manager set');
        $this->assertFalse($mock->hasDefaultDbManager(), 'Should no have a default database manager set');
    }

    /**
     * @test
     * @covers ::getDbManager
     * @covers ::hasDbManager
     * @covers ::hasDefaultDbManager
     * @covers ::setDbManager
     * @covers ::getDefaultDbManager
     */
    public function canObtainDatabaseManager()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getDbManager();

        $this->assertTrue($mock->hasDbManager(), 'A database manager should have been set');
        $this->assertInstanceOf(DatabaseManager::class, $config);
    }
}