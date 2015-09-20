<?php
use Aedart\Laravel\Helpers\Contracts\View\BladeAware;
use Aedart\Laravel\Helpers\Traits\View\BladeTrait;

/**
 * Class BladeCompatibilityTest
 *
 * @group compatibility
 * @group view
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class BladeCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyBladeContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return BladeAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return BladeTrait::class;
    }
}

class DummyBladeContainer implements BladeAware{
    use BladeTrait;
}