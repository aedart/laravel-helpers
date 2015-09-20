<?php

use Aedart\Laravel\Helpers\Contracts\Auth\Access\GateAware;
use Aedart\Laravel\Helpers\Traits\Auth\Access\GateTrait;

/**
 * Class GateCompatibilityTest
 *
 * @group compatibility
 * @group auth
 * @group auth-access
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class GateCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyGateContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return GateAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return GateTrait::class;
    }
}

class DummyGateContainer implements GateAware {
    use GateTrait;
}