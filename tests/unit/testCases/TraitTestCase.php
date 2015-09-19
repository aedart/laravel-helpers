<?php

use Aedart\Testing\Laravel\Traits\TestHelperTrait;
use Codeception\TestCase\Test;
use Faker\Factory;
use Illuminate\Support\Facades\Facade;

/**
 * Class Trait-Test Case
 *
 * Base test case class for testing the traits of this package
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package unit\testCases
 */
abstract class TraitTestCase extends Test{

    use TestHelperTrait;

    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var Faker\Generator
     */
    protected $faker = null;

    protected function _before()
    {
        $this->faker = Factory::create();

        $this->startApplication();
    }

    protected function _after()
    {
        $this->stopLaravel();
    }

    /***********************************************************
     * Helpers and utilities
     **********************************************************/

    /**
     * Stop the laravel application, clear any resolved instances
     * from the Facades and reset the Facades' application
     * instance
     */
    protected function stopLaravel(){
        $this->stopApplication();

        Facade::clearResolvedInstances();
        Facade::setFacadeApplication(null);
    }

    /***********************************************************
     * Abstract methods
     **********************************************************/

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|object
     */
    abstract public function getTraitMock();
}