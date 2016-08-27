<?php

use Aedart\Testing\GST\GetterSetterTraitTester;
use Aedart\Testing\Laravel\TestCases\unit\UnitWithLaravelTestCase;
use Illuminate\Support\Facades\Facade;
use \Mockery as m;

/**
 * Class Trait-Test Case
 *
 * Base test case class for testing the traits of this package
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package unit\testCases
 */
abstract class TraitTestCase extends UnitWithLaravelTestCase{

    use GetterSetterTraitTester;

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

    /**
     * Returns a mock
     *
     * @param string $classPath
     *
     * @return m\MockInterface
     */
    public function mock($classPath)
    {
        return m::mock($classPath);
    }

    /***********************************************************
     * Custom assertions
     **********************************************************/

    /**
     * Assert trait
     *
     * @param string $traitClassPath
     * @param string $expectedDefaultClass
     * @param string $customDefaultClass
     */
    public function assertTrait($traitClassPath, $expectedDefaultClass, $customDefaultClass)
    {
        $this->output(sprintf('Asserting "%s"', $traitClassPath));

        $this->guessPropertyNameFor($traitClassPath);

        $traitMock = $this->makeTraitMock($traitClassPath);

        $setterName =  $this->setPropertyMethodName();
        $getterName = $this->getPropertyMethodName();

        $this->assertInstanceOf($expectedDefaultClass, $traitMock->$getterName(), sprintf('Incorrect default in %s (get default method)', $traitClassPath));

        // Ensures that a value can be set and retrieved
        $this->assertCanSpecifyAndObtainValue($traitMock, $setterName, $getterName, $this->mock($expectedDefaultClass));

        // Ensure that a custom defined default value is returned by default,
        // if no other value has been set prior to invoking the `get-property`
        // method.
        $this->assertReturnsCustomDefaultValue($traitClassPath, $this->getDefaultPropertyMethodName(), $this->getPropertyMethodName(), $this->mock($customDefaultClass));
    }

    /***********************************************************
     * Abstract methods
     **********************************************************/

    /**
     * @deprecated
     *
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|object
     */
    public function getTraitMock(){}
}