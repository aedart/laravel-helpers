<?php

use Aedart\Laravel\Helpers\Traits\Cache\CacheTrait;
use Codeception\Util\Debug;

/**
 * GetAndGetDefaultTest
 *
 * Very simple test of the get and has-default method.
 *
 * The purpose isn't to test all traits, but rather just to gain a quick
 * overview of how the default implementation performs.
 *
 * @group performance
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class GetAndHasDefaultTest extends PerformanceTestCase
{

    /**
     * Amount of iterations each
     *
     * The amount should / must be rather
     * high in order for the test to make sense!
     *
     * @var int
     */
    protected $iterations = 1000000;

    /******************************************************
     * Helpers
     *****************************************************/

    /**
     * @return AwareOfDummy
     */
    public function makeAwareOfComponent()
    {
        return new AwareOfDummy();
    }

    /**
     * @return AwareOfDummyB
     */
    public function makeAwareOfComponentB()
    {
        return new AwareOfDummyB();
    }

    /******************************************************
     * Actual Tests
     *****************************************************/

    /**
     * @test
     *
     * NOTE: This doesn't do anything other than to "warm up" the
     * test-case execution... Found that (for unknown reasons) that
     * the first test always is slow!?
     */
    public function singleRun()
    {
        $component = $this->makeAwareOfComponent();
        $component->getCache();
    }

    /**
     * @test
     *
     * For a component where a "factory" is returned and
     * a connection, profile, store... etc, needs to be returned
     */
    public function hasDefaultCheckForFactoryComponent()
    {
        $i = $this->iterations;
        while($i--){
            $component = $this->makeAwareOfComponent();
            $hasDefault = $component->hasDefaultCache();

            // Just to ensure return is correct
            $this->assertTrue($hasDefault);
        }
    }

    /**
     * @test
     *
     * For a component where a "factory" is returned and
     * a connection, profile, store... etc, needs to be returned
     */
    public function getPropertyFirstTimeCheckForFactoryComponent()
    {
        $i = $this->iterations;
        while($i--){
            $component = $this->makeAwareOfComponent();
            $property = $component->getCache();

            // Just to ensure return is correct
            $this->assertTrue(isset($property));
        }
    }

    /**
     * @test
     *
     * For a component where the "facade root" is just returned
     */
    public function hasDefaultCheckForFacadeRoot()
    {
        $i = $this->iterations;
        while($i--){
            $component = $this->makeAwareOfComponentB();
            $hasDefault = $component->hasDefaultCacheFactory();

            // Just to ensure return is correct
            $this->assertTrue($hasDefault);
        }
    }

    /**
     * @test
     *
     * For a component where the "facade root" is just returned
     */
    public function getPropertyFirstTimeCheckForFacadeRoot()
    {
        $i = $this->iterations;
        while($i--){
            $component = $this->makeAwareOfComponentB();
            $property = $component->getCacheFactory();

            // Just to ensure return is correct
            $this->assertTrue(isset($property));
        }
    }
}