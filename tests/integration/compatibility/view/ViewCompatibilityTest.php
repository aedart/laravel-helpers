<?php
use Aedart\Laravel\Helpers\Contracts\View\ViewAware;
use Aedart\Laravel\Helpers\Traits\View\ViewTrait;

/**
 * Class ViewCompatibilityTest
 *
 * @group compatibility
 * @group view
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ViewCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyViewContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return ViewAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return ViewTrait::class;
    }
}

class DummyViewContainer implements ViewAware{
    use ViewTrait;
}