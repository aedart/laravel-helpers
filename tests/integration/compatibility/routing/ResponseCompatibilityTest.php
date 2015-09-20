<?php
use Aedart\Laravel\Helpers\Contracts\Routing\ResponseAware;
use Aedart\Laravel\Helpers\Traits\Routing\ResponseTrait;

/**
 * Class ResponseCompatibilityTest
 *
 * @group compatibility
 * @group routing
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ResponseCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyResponseContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return ResponseAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return ResponseTrait::class;
    }
}

class DummyResponseContainer implements ResponseAware{
    use ResponseTrait;
}