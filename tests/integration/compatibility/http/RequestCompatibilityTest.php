<?php
use Aedart\Laravel\Helpers\Contracts\Http\RequestAware;
use Aedart\Laravel\Helpers\Traits\Http\RequestTrait;

/**
 * Class RequestCompatibilityTest
 *
 * @group compatibility
 * @group http
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class RequestCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyRequestContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return RequestAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return RequestTrait::class;
    }
}

class DummyRequestContainer implements RequestAware{
    use RequestTrait;
}