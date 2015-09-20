<?php
use Aedart\Laravel\Helpers\Contracts\Routing\RedirectAware;
use Aedart\Laravel\Helpers\Traits\Routing\RedirectTrait;

/**
 * Class RedirectCompatibilityTest
 *
 * @group compatibility
 * @group routing
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class RedirectCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyRedirectContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return RedirectAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return RedirectTrait::class;
    }
}

class DummyRedirectContainer implements RedirectAware{
    use RedirectTrait;
}