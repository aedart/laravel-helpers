<?php

use Aedart\Laravel\Helpers\Contracts\Cache\CacheFactoryAware;
use Aedart\Laravel\Helpers\Traits\Cache\CacheFactoryTrait;

/**
 * Class CacheFactoryCompatibilityTest
 *
 * @group compatibility
 * @group cache
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class CacheFactoryCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyCacheFactoryContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return CacheFactoryAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return CacheFactoryTrait::class;
    }
}

class DummyCacheFactoryContainer implements CacheFactoryAware {
    use CacheFactoryTrait;
}