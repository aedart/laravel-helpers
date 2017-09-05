<?php
declare(strict_types=1);

use Aedart\Testing\GST\GetterSetterTraitTester;
use Aedart\Testing\Laravel\TestCases\unit\UnitWithLaravelTestCase;
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
     * @param string $traitClassPath The trait to test
     * @param string $interfaceClassPath The interface to adhere
     * @param string $expectedDefaultClass The expected default to return
     * @param string|null $customDefaultClass [optional] Defaults to the $expectedDefaultClass if none provided
     */
    public function assertTrait(
        string $traitClassPath,
        string $interfaceClassPath,
        string $expectedDefaultClass,
        ?string $customDefaultClass = null
    ) {
        // Output
        $this->output(sprintf('Asserting "%s"', $traitClassPath));

        // Assert trait interface compatibility
        $this->assertTraitCompatibility($traitClassPath, $interfaceClassPath);

        // Default to expected default class
        $customDefaultClass = $customDefaultClass ?? $expectedDefaultClass;

        // Guess the property name
        $this->guessPropertyNameFor($traitClassPath);

        // Make the mock
        $traitMock = $this->makeTraitMock($traitClassPath);

        // Get get getter and setter names
        $setterName =  $this->setPropertyMethodName();
        $getterName = $this->getPropertyMethodName();

        // Assert default
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