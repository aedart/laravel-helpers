<?php

use Aedart\Testing\Laravel\TestCases\unit\UnitWithLaravelTestCase;
use Illuminate\Support\Facades\Facade;

/**
 * Class Trait-Test Case
 *
 * Base test case class for testing the traits of this package
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package unit\testCases
 */
abstract class TraitTestCase extends UnitWithLaravelTestCase{

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