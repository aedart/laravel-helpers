<?php

use Aedart\Laravel\Helpers\Contracts\Cache\CacheAware;
use Aedart\Laravel\Helpers\Traits\Cache\CacheTrait;

/**
 * Class CacheCompatibilityTest
 *
 * @group compatibility
 * @group cache
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class CacheCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyCacheContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return CacheAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return CacheTrait::class;
    }
}

class DummyCacheContainer implements CacheAware {
    use CacheTrait;
}