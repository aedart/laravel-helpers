<?php

use Aedart\Laravel\Helpers\Contracts\Auth\AuthAware;
use Aedart\Laravel\Helpers\Traits\Auth\AuthTrait;

/**
 * Class AuthAndTraitCompatibilityTest
 *
 * @group auth
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class AuthAndTraitCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyAuthContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return AuthAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return AuthTrait::class;
    }
}

class DummyAuthContainer implements AuthAware{
    use AuthTrait;
}