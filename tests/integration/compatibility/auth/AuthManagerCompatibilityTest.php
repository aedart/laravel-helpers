<?php

use Aedart\Laravel\Helpers\Contracts\Auth\AuthManagerAware;
use Aedart\Laravel\Helpers\Traits\Auth\AuthManagerTrait;

/**
 * Class AuthManagerCompatibilityTest
 *
 * @group compatibility
 * @group auth
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class AuthManagerCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyAuthManagerContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return AuthManagerAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return AuthManagerTrait::class;
    }
}

class DummyAuthManagerContainer implements AuthManagerAware {
    use AuthManagerTrait;
}