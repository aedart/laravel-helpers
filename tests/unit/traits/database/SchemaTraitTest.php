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
     * @covers ::hasSchema
     * @covers ::hasDefaultSchema
     */
    public function hasNoDefaultLaravelDatabaseSchemaBuilderOutsideLaravel() {
        $this->stopLaravel();

        // Needed some serious debugging - container complained about no exception-handler set,
        // which should even be initialised...
//        $container = \Illuminate\Container\Container::getInstance();
//        $container->bind(\Illuminate\Contracts\Debug\ExceptionHandler::class, function($app, $arg){
//            return new \Illuminate\Foundation\Exceptions\Handler(new \Illuminate\Log\Writer(
//                new \Monolog\Logger('bla')
//            ));
//        });

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasSchema(), 'Should no have an laravel database schema builder set');
        $this->assertFalse($mock->hasDefaultSchema(), 'Should no have a default laravel database schema builder set');
    }

    /**
     * @test
     * @covers ::getDefaultSchema
     */
    public function returnsNullWhenNoDefaultAvailable() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertNull($mock->getDefaultSchema(), 'No default instance should be available');
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
     * @covers ::getSchema
     * @covers ::hasSchema
     * @covers ::hasDefaultSchema
     * @covers ::setSchema
     * @covers ::getDefaultSchema
     */
    public function canObtainLaravelDatabaseSchemaBuilder()
    {
        $mock = $this->getTraitMock();

        $result = $mock->getSchema();

        $this->assertTrue($mock->hasSchema(), 'An laravel database schema builder should have been set');
        $this->assertInstanceOf(Builder::class, $result);
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