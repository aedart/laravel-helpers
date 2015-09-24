<?php
use Aedart\Laravel\Helpers\Contracts\Routing\URLAware;
use Aedart\Laravel\Helpers\Traits\Routing\URLTrait;

/**
 * Class URLCompatibilityTest
 *
 * @group compatibility
 * @group routing
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class URLCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyURLContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return URLAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return URLTrait::class;
    }
}

class DummyURLContainer implements URLAware{
    use URLTrait;
}