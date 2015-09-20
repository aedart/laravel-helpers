<?php

use Aedart\Laravel\Helpers\Contracts\Auth\PasswordAware;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordTrait;

/**
 * Class PasswordCompatibilityTest
 *
 * @group compatibility
 * @group auth
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class PasswordCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyPasswordContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return PasswordAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return PasswordTrait::class;
    }
}

class DummyPasswordContainer implements PasswordAware {
    use PasswordTrait;
}