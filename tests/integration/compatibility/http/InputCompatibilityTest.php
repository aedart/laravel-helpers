<?php
use Aedart\Laravel\Helpers\Contracts\Http\InputAware;
use Aedart\Laravel\Helpers\Traits\Http\InputTrait;

/**
 * Class InputCompatibilityTest
 *
 * @group compatibility
 * @group http
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class InputCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyInputContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return InputAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return InputTrait::class;
    }
}

class DummyInputContainer implements InputAware{
    use InputTrait;
}