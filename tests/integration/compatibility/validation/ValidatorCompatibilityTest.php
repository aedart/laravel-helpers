<?php

use Aedart\Laravel\Helpers\Contracts\Validation\ValidatorAware;
use Aedart\Laravel\Helpers\Traits\Validation\ValidatorTrait;

/**
 * Class ValidatorCompatibilityTest
 *
 * @group compatibility
 * @group validation
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ValidatorCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyValidatorContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return ValidatorAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return ValidatorTrait::class;
    }
}

class DummyValidatorContainer implements ValidatorAware{
    use ValidatorTrait;
}