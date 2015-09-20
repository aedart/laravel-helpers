<?php

use Codeception\TestCase\Test;

/**
 * Class Interface-Compatibility TestCase
 *
 * <br />
 *
 * Base class for a special kind of integration tests, in which we
 * wish to make sure that all the traits that have been developed,
 * actually do implement the interface-required methods!
 *
 * <br />
 *
 * The reason why such "extreme" tests are required is;
 * a) Traits cannot "implement" interfaces
 * b) I sadly made a few mistakes a long the way, loosing sight if a given
 *      trait lives 100% up to its corresponding interface, and I needed
 *      a way to find eventual mistakes. E.g. A `set`-method expects a specific
 *      object, yet the trait implementation doesn't live up to it. Thus,
 *      the only way to ensure compatibility between the traits and the
 *      interfaces, was to create dummy classes and make sure that they use
 *      the desired trait and implemented the correct interface.
 *
 * <br />
 *
 * Normally, this kind of testing is really not needed... Yet, in my case,
 * I rather be safe and ensure a high quality.
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
abstract class InterfaceCompatibilityTestCase extends Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /***********************************************************
     * Helpers and utilities
     **********************************************************/

    /***********************************************************
     * Abstract methods
     **********************************************************/

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    abstract public function getDummyClassPath();

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    abstract public function mustImplementInterface();

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    abstract public function mustUseTrait();

    /***********************************************************
     * Actual tests
     **********************************************************/

    /**
     * This test is very simple - if we can create a new instance
     * of a class, that implements a given interface, and uses
     * the given trait, then it passes.
     *
     * @test
     */
    public function isTraitImplementationCompatibleWithInterface(){
        // Get the class path to some dummy class
        $class = $this->getDummyClassPath();

        // A) Here, we simply rely on PHP's engine to handle incompatibility
        // checks - if the trait implements the methods exactly as the
        // interface requires it, then an instance will be created. If
        // not, then PHP will throw a FATAL ERROR - which in this current
        // version of PHP we cannot catch.
        $instance = new $class();

        // While part (A) is sufficient, we will perform an additional set
        // of tests - we wish to make sure that a specific interface was
        // implemented by that given class, and that it uses a specific
        // trait. This is done so, only to ensure 100% that the correct
        // set of interfaces and traits have been used for this given
        // test.

        // Does it implement the correct / specified interface
        $this->assertInstanceOf($this->mustImplementInterface(), $instance, sprintf('Incorrect interface implemented by %s', $this->getDummyClassPath()));

        // Does it use the correct / specified trait
        $traits = class_uses($instance);
        $this->assertContains($this->mustUseTrait(), $traits, sprintf('Incorrect trait used by %s', $this->getDummyClassPath()));
    }
}