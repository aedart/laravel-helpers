<?php

use Aedart\Laravel\Helpers\Contracts\Bus\BusAware;
use Aedart\Laravel\Helpers\Traits\Bus\BusTrait;

/**
 * Class BusCompatibilityTest
 *
 * @group compatibility
 * @group bus
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class BusCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyBusContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return BusAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return BusTrait::class;
    }
}

class DummyBusContainer implements BusAware {
    use BusTrait;
}